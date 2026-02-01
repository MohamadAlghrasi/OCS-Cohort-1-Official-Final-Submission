<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Categories extends Component
{
    public $categories;

    // form fields
    public $categoryId;
    public $name;
    public $parent_id = null;
    public $type = 'simple';

    public $isEdit = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'type' => 'required|in:rolls,simple',
        ];
    }

    public function mount()
    {
        $this->loadCategories();
    }

    // public function loadCategories()
    // {
    //     $this->categories = Category::with('parent')
    //         ->orderBy('parent_id')
    //         ->orderBy('name')
    //         ->get();
    // }
    public function loadCategories()
    {
        $categories = Category::with('parent') ->withCount('products') ->get();

        $this->categories = $this->buildTree($categories);
    }

    private function buildTree($categories, $parentId = null, $level = 0)
    {
        $branch = collect();

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $category->depth = $level;
                $branch->push($category);

                $children = $this->buildTree($categories, $category->id, $level + 1);
                $branch = $branch->merge($children);
            }
        }

        return $branch;
    }

    public function resetForm()
    {
        $this->reset(['categoryId', 'name', 'parent_id', 'type', 'isEdit']);
        $this->type = 'simple';
    }

    /* ================= CRUD ================= */

    public function create()
    {
        $this->resetForm();
        $this->dispatch('open-modal');
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => $this->parent_id,
            'type' => $this->parent_id
                ? Category::find($this->parent_id)->type
                : $this->type,
        ]);

        $this->dispatch('close-modal');
        $this->dispatch('success', message: 'Category created successfully');

        $this->resetForm();
        $this->loadCategories();
    }
    public function addSub($parentId)
    {
        $parent = Category::withCount('products')->findOrFail($parentId);

        if ($parent->products_count > 0) {
            $this->dispatch('error', message: 'You cannot add sub categories to a category that has products.');
            return;
        }
        $this->resetForm();

        $this->parent_id = $parentId;

        $this->type = Category::find($parentId)->type;

        $this->dispatch('open-modal');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
        $this->type = $category->type;
        $this->isEdit = true;

        $this->dispatch('open-modal');
    }

    public function update()
    {
        $this->validate();

        $category = Category::findOrFail($this->categoryId);

        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => $this->parent_id,
        ]);

        $this->dispatch('close-modal');
        $this->dispatch('success', message: 'Category updated successfully');

        $this->resetForm();
        $this->loadCategories();
    }

    public function deleteConfirm($id)
    {
        $this->categoryId = $id;
        $this->dispatch('confirm-delete');
    }

    #[On('delete-category')]
    public function delete()
    {
        $category = Category::findOrFail($this->categoryId);

        if ($category->children()->exists()) {
            $this->dispatch('error', message: 'Cannot delete category with sub categories');
            return;
        }

        $category->delete();

        $this->dispatch('success', message: 'Category deleted successfully');
        $this->loadCategories();
    }

    public function render()
    {
        return view('livewire.admin.categories');
    }
}
