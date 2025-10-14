<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name;
    public $status = false;

    public function save(){
        $this->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $category = Category::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.admin.categories.create-category');
    }
}
