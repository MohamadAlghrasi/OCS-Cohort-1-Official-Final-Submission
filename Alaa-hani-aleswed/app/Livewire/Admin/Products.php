<?php

namespace App\Livewire\Admin;

use App\Models\ProductImage;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithFileUploads;
    public $products;

    // form fields
    public $product_id;
    public $name;
    public $category_id;
    public $description;
    public $base_price;

    public $categories = [];
    public $categoryType = null;

    public $variants = [];
    public $variant_id;
    public $variant_price;
    public $selectedAttributes = [];
    public $productAttributes = [];
    public $deleteVariantId;
    public $deleteProductId;

    public $images = [];          
    public $existingImages = [];
    public bool $isEdit = false;

    public function mount()
    {
        $this->loadProducts();
        $this->categories = Category::doesntHave('children')->get();
    }

    public function loadProducts()
    {
        $this->products = Product::with([
    'category',
    'images' => function ($q) {
        $q->orderByDesc('is_main');
    }
])->get();
    }
    public function create()
    {
        $this->isEdit = false;
        $this->resetForm();
        // $this->existingImages = [];
        $this->resetVariantForm();

        $this->variants = [];
        $this->productAttributes = [];

        $this->dispatch('open-modal');
    }

    public function updatedCategoryId()
    {
        $category = Category::find($this->category_id);
        $this->categoryType = $category?->type;
    }
    public function save()
{
    // dd($this->images);
    $this->validate([
        'name' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'base_price' => 'nullable|numeric',
        'images.*' => 'image|max:2048',
    ]);

    if ($this->isEdit && $this->product_id) {
        // EDIT
        $product = Product::findOrFail($this->product_id);
    } else {
        // CREATE
        $product = new Product();
    }

    $product->name = $this->name;
    $product->slug = Str::slug($this->name);
    $product->description = $this->description;
    $product->category_id = $this->category_id;
    $product->base_price = $this->categoryType === 'simple'
        ? $this->base_price
        : null;

    $product->save();

    // 👇 الصور
    if (!empty($this->images)) {

    if ($this->isEdit) {
        // بس بالتعديل نلغي القديمة
        $product->images()->update(['is_main' => false]);
    }

    foreach ($this->images as $index => $image) {
        $path = $image->store('products', 'public');

        ProductImage::create([
            'product_id' => $product->id,
            'image_path' => $path,
            'is_main' => $index === 0, // أول صورة دائمًا main
        ]);
    }
}


    // تنظيف كامل
    $this->resetForm();
    $this->resetVariantForm();
    $this->isEdit = false;

    $this->loadProducts();

    $this->dispatch('close-modal');
    $this->dispatch('success', message: 'Product saved successfully');
}



    public function resetForm()
    {
        $this->product_id = null;
        $this->name = '';
        $this->category_id = null;
        $this->description = '';
        $this->base_price = null;
        $this->categoryType = null;
        $this->images = [];
        $this->existingImages = [];
    }
    public function edit($id)
    {
          $this->isEdit = true;
        $product = Product::with(['category', 'variants.values.attribute'])->findOrFail($id);

        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->base_price = $product->base_price;
        $this->categoryType = $product->category->type;
        $this->variants = $product->variants;
        $this->existingImages = $product->images;

        if ($this->categoryType === 'rolls') {
            $this->productAttributes = ProductAttribute::with('values')->get();
        }

        $this->dispatch('open-modal');
    }
    // public function openVariantModal()
    // {
    //     $this->resetVariantForm();
    //     $this->dispatch('open-variant-modal');
    // }

    public function saveVariant()
    {
        $values = array_filter(
            $this->selectedAttributes,
            fn($v) => !is_null($v) && $v !== ''
        );
        $this->validate([
            'variant_price' => 'required|numeric|min:0',
            'selectedAttributes' => 'required|array',
            'selectedAttributes.*' => 'required|integer|exists:product_attribute_values,id',
        ]);

        $variant = ProductVariant::create([
            'product_id' => $this->product_id,
            'price' => $this->variant_price,
        ]);

        // $values = array_filter(
        //     $this->selectedAttributes,
        //     fn ($v) => !empty($v)
        // );

        $variant->values()->sync(array_values($values));

        $this->variants = Product::find($this->product_id)
            ->variants()
            ->with('values.attribute')
            ->get();

        $this->resetVariantForm();
        $this->dispatch('close-variant-modal');
    }

    public function resetVariantForm()
    {
        $this->variant_id = null;
        $this->variant_price = null;
        $this->selectedAttributes = [];
    }
    public function openVariantModal()
    {
        if ($this->categoryType !== 'rolls') {
            return;
        }
        $this->productAttributes = ProductAttribute::with('values')->get();
        $this->selectedAttributes = [];
        foreach ($this->productAttributes as $attribute) {
            $this->selectedAttributes[$attribute->id] = null;
        }
        $this->variant_price = null;
        $this->dispatch('open-variant-modal');
    }
    public function confirmDeleteVariant($id)
    {
        $this->deleteVariantId = $id;

        $this->dispatch('confirm-delete-variant');
    }
    #[On('delete-variant')]
    public function deleteVariant()
    {
        $variant = ProductVariant::find($this->deleteVariantId);

        if (!$variant) {
            $this->dispatch('error', message: 'Variant not found');
            return;
        }

        $variant->values()->detach();
        $variant->delete();

        $this->variants = Product::find($this->product_id)
            ->variants()
            ->with('values.attribute')
            ->get();

        $this->dispatch('success', message: 'Variant deleted successfully');
    }
    public function confirmDeleteProduct($id)
    {
        $this->deleteProductId = $id;
        $this->dispatch('confirm-delete-product');
    }
    #[On('delete-product')]
public function deleteProduct()
{
    $product = Product::withCount('orderItems')
        ->find($this->deleteProductId);

    if (!$product) {
        $this->dispatch('error', message: 'Product not found');
        return;
    }

    if ($product->order_items_count > 0) {
        $this->dispatch('error', message: 'Cannot delete product with existing orders');
        return;
    }

    $product->delete();

    $this->loadProducts();

    $this->dispatch('success', message: 'Product deleted successfully');
}

public function deleteImage($id)
{
    ProductImage::find($id)?->delete();
    $this->existingImages = ProductImage::where('product_id', $this->product_id)->get();
}

    public function render()
    {
        return view('livewire.admin.products');
    }
}
