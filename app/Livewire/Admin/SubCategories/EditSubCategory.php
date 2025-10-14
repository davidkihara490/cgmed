<?php

namespace App\Livewire\Admin\SubCategories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class EditSubCategory extends Component
{
    public $name;
    public $category_id;
    public $description;
    public $status;
    public $categories;
    public $subCategory;

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->subCategory = SubCategory::findOrFail($id);
        $this->name = $this->subCategory->name;
        $this->category_id = $this->subCategory->category_id;
        $this->status = $this->subCategory->status;
        $this->description = $this->subCategory->description;
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
            $this->subCategory->update([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'status' => $this->status,
                'description' => $this->description,

            ]);

            return redirect()->route('sub-categories.index')->with('success', 'Sub Category updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.sub-categories.edit-sub-category');
    }
}
