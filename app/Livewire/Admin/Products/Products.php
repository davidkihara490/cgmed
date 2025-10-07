<?php

namespace App\Livewire\Admin\Products;

use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public ?string $search;
    public $deleteId;
    public $showDeleteModal = false;

    public function confirm($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }
    public function delete()
    {
        $product = CategoryProduct::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('products.index')->with(['error', 'Error deleting product :' . $th->getMessage()]);
        }
    }
    public function render()
    {
        $products = CategoryProduct::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.admin.products.products', [
            'products' => $products
        ]);
    }
}
