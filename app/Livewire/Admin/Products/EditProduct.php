<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $image; // new uploaded image
    public $existingImage; // existing DB image path
    public $status;
    public $description;
    public $category_id;

    public $categories = [];
    public $product;

    protected $rules = [
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|max:4096', // not required when editing
        'status' => 'required|boolean',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
    ];

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->product = CategoryProduct::findOrFail($id);

        // Load existing product details
        $this->name = $this->product->name;
        $this->existingImage = $this->product->image;
        $this->status = $this->product->status;
        $this->description = $this->product->description;
        $this->category_id = $this->product->category_id;
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->existingImage;

        // ✅ If a new image was uploaded
        if ($this->image && !is_string($this->image)) {
            // Delete old one if exists
            if ($this->existingImage && Storage::disk('public')->exists($this->existingImage)) {
                Storage::disk('public')->delete($this->existingImage);
            }

            $imagePath = $this->image->store('products', 'public');
        }

        // ✅ Update existing product
        $this->product->update([
            'name' => $this->name,
            'image' => $imagePath,
            'status' => $this->status,
            'description' => $this->description,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Product updated successfully!');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
