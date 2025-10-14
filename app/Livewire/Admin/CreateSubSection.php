<?php

namespace App\Livewire\Admin;

use App\Models\Section;
use App\Models\SubSection;
use Livewire\Component;

class CreateSubSection extends Component
{
    public $name;
    public $status = false;
    public $description;
    public $section_id;
    public $sections;

    public function mount()
    {
        $this->sections = Section::all();
    }

    public function save()
    {
        $this->validate([
            'section_id' => 'required|exists:sections,id',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $subSection = SubSection::create([
                'section_id' => $this->section_id,
                'name' => $this->name,
                'status' => $this->status,
                'description' => $this->description
            ]);

            return redirect()->route('sub-sections.index')->with('success', 'Sub Section created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.create-sub-section');
    }
}
