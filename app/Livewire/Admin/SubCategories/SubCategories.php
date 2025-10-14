<?php

namespace App\Livewire\Admin\SubCategories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategories extends Component
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
        $subCategory = SubCategory::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $subCategory->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Sub Category deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('sub-categories.index')->with(['error', 'Error deleting sub-category :' . $th->getMessage()]);
        }
    }
    public function render()
    {
        $subCategories = SubCategory::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->get();

        return view('livewire.admin.sub-categories.sub-categories', [
            'subCategories' => $subCategories
        ]);
    }
}
