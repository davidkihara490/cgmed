<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
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
        $category = Category::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Category deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('categories.index')->with(['error', 'Error deleting category :' . $th->getMessage()]);
        }
    }

    public function render()
    {
        $categories = Category::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.admin.categories.categories', [
            'categories' => $categories
        ]);
    }
}
