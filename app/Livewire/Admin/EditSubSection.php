<?php

namespace App\Livewire\Admin;

use App\Models\Section;
use App\Models\SubSection;
use Livewire\Component;

class EditSubSection extends Component
{
    public $name;
    public $status = false;
    public $description;
    public $section_id;
    public $sections;
    public $subSection;

    public function mount($id)
    {
        $this->sections = Section::all();
        $this->subSection = SubSection::findOrFail($id);
        $this->section_id = $this->subSection->section_id;
        $this->description = $this->subSection->description;
        $this->status = $this->subSection->status;
        $this->name = $this->subSection->name;
    }

    public function save()
    {
        // $this->validate([
        //     'section_id' => 'required|exists:sections,id' ,
        //     'name' => 'required',
        //     'description' => 'required',
        //     'status' => 'required|boolean',
        // ]);

        try {
            $this->subSection->update([
                'section_id' => $this->section_id,
                'name' => $this->name,
                'status' => $this->status,
                'description' => $this->description
            ]);

            return redirect()->route('sub-sections.index')->with('success', 'Sub Section updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-sub-section');
    }
}
