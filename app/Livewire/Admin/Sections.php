<?php

namespace App\Livewire\Admin;

use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Sections extends Component
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
        $section = Section::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $section->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Section deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('sections.index')->with(['error', 'Error deleting category :' . $th->getMessage()]);
        }
    }

    public function render()
    {
        $sections = Section::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('name', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.admin.sections', [
            'sections' => $sections
        ]);
    }
}
