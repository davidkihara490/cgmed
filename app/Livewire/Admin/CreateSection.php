<?php

namespace App\Livewire\Admin;

use App\Models\Section;
use Livewire\Component;

class CreateSection extends Component
{
    public $name;
    public $status = true;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required|boolean',
        ]);

        try {
            $section = Section::create([
                'name' => $this->name,
                'status' => $this->status,
            ]);

            return redirect()->route('sections.index')->with('success', 'Section created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function render()
    {
        return view('livewire.admin.create-section');
    }
}
