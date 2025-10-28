<?php

namespace App\Livewire\Admin\Partners;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Partners extends Component
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
        $partner = Partner::findOrFail($this->deleteId);
        try {
            DB::beginTransaction();
            $partner->delete();
            DB::commit();
            $this->showDeleteModal = false;
            session()->flash('success', 'Partner deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('partners.index')->with(['error', 'Error deleting partner :' . $th->getMessage()]);
        }
    }
    public function render()
    {
        $partners = Partner::query()
            ->orderByDesc('id')
            ->when(
                ! empty($this->search),
                fn(Builder $q) => $q->where('first_name', 'like', "%{$this->search}%")
            )
            ->get();
        return view('livewire.admin.partners.partners', [
            'partners' => $partners
        ]);
    }
}
