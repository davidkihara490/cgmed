<?php

namespace App\Livewire\Admin\SubCategories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CreateSubCategory extends Component
{
    public $name;
    public $category_id;
    public $description;
    public $status = false;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        try {
            $subCategory = SubCategory::create([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'status' => $this->status,
                'description' => $this->description,

            ]);

            return redirect()->route('sub-categories.index')->with('success', 'Sub Category created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.admin.sub-categories.create-sub-category');
    }
}
