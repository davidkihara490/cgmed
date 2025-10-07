<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category;
    public $name;
    public $status;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
        $this->name = $this->category->name;
        $this->status = $this->category->status;
    }

        public function save(){
        $this->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $this->category->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.categories.edit-category');
    }
}
