<?php

namespace App\Livewire\Admin;

use App\Models\SubSection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SubSections extends Component
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
        $subSection = SubSection::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $subSection->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Sub Section deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('sub-sections.index')->with(['error', 'Error deleting sub section :' . $th->getMessage()]);
        }
    }
    public function render()
    {
        $subSections = SubSection::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.admin.sub-sections', [
            'subSections' => $subSections
        ]);
    }
}
