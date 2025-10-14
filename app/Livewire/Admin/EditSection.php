<?php

namespace App\Livewire\Admin;

use App\Models\Section;
use Livewire\Component;

class EditSection extends Component
{
    public $section;
    public $name;
    public $status;

    public function mount($id)
    {
        $this->section = Section::findOrFail($id);
        $this->name = $this->section->name;
        $this->status = $this->section->status;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $this->section->update([
                'name' => $this->name,
                'status' => $this->status,
            ]);

            return redirect()->route('sections.index')->with('success', 'Section updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-section');
    }
}
