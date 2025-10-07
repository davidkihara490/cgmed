<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\CategoryProduct;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $status;
    public $description;
    public $category_id;
    public $categories = [];
    protected $rules = [
        'name' => 'required|string|max:255',
        'image' => 'required|image|max:4096',
        'status' => 'required|boolean',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
    ];
    
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        try {
            CategoryProduct::create([
                'name' => $this->name,
                'image' => $imagePath,
                'status' => $this->status,
                'description' => $this->description,
                'category_id' => $this->category_id,

            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
