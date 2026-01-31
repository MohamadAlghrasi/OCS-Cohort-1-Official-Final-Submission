<?php

namespace App\Livewire\Coloringroll;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ShopProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $category = '';
    public int $perPage = 12;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::with(['images', 'category', 'variants'])
            ->when($this->category, fn ($q) =>
                $q->where('category_id', $this->category)
            )
            ->when($this->search, fn ($q) =>
                $q->where('name', 'like', "%{$this->search}%")
            )
            ->paginate($this->perPage);

        return view('livewire.coloringroll.shop-products', [
            'products' => $products,
            'categories' => Category::doesntHave('children')->get(),
        ]);
    }
}

