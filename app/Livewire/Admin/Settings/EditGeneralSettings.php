<?php

namespace App\Livewire\Admin\Settings;

use App\Models\CompanyProfile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditGeneralSettings extends Component
{
    use WithFileUploads;

    public $company_name;
    public $logo;                // For new upload
    public $existing_logo;       // Existing image path from DB
    public $hero_image;          // For new upload
    public $existing_hero_image; // Existing image path from DB
    public $hero_title;
    public $hero_sub_title;
    public $about;
    public $phone;
    public $email;
    public $address;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $youtube;
    public $pinterest;
    public $tiktok;
    public $copyright;

    public function mount()
    {
        // ✅ Load the first (and only) settings row
        $settings = CompanyProfile::first();

        if ($settings) {
            $this->company_name = $settings->company_name;
            $this->existing_logo = $settings->logo;
            $this->existing_hero_image = $settings->hero_image;
            $this->hero_title = $settings->hero_title;
            $this->hero_sub_title = $settings->hero_sub_title;
            $this->about = $settings->about;
            $this->phone = $settings->phone;
            $this->email = $settings->email;
            $this->address = $settings->address;
            $this->facebook = $settings->facebook;
            $this->twitter = $settings->twitter;
            $this->instagram = $settings->instagram;
            $this->linkedin = $settings->linkedin;
            $this->youtube = $settings->youtube;
            $this->pinterest = $settings->pinterest;
            $this->tiktok = $settings->tiktok;
            $this->copyright = $settings->copyright;
        }
    }

    public function save()
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:2048',
            'hero_image' => 'nullable|image|max:4096',
        ]);

        $settings = CompanyProfile::first() ?? new CompanyProfile();

        // ✅ Handle logo upload (replace if new uploaded)
        if ($this->logo && !is_string($this->logo)) {
            // Delete old file if it exists
            if ($this->existing_logo && Storage::disk('public')->exists($this->existing_logo)) {
                Storage::disk('public')->delete($this->existing_logo);
            }

            $settings->logo = $this->logo->store('settings', 'public');
            $this->existing_logo = $settings->logo; // ✅ Keep UI updated instantly
        }

        // ✅ Handle hero image upload
        if ($this->hero_image && !is_string($this->hero_image)) {
            if ($this->existing_hero_image && Storage::disk('public')->exists($this->existing_hero_image)) {
                Storage::disk('public')->delete($this->existing_hero_image);
            }

            $settings->hero_image = $this->hero_image->store('settings', 'public');
            $this->existing_hero_image = $settings->hero_image;
        }

        // ✅ Update remaining fields
        $settings->company_name = $this->company_name;
        $settings->hero_title = $this->hero_title;
        $settings->hero_sub_title = $this->hero_sub_title;
        $settings->about = $this->about;
        $settings->phone = $this->phone;
        $settings->email = $this->email;
        $settings->address = $this->address;
        $settings->facebook = $this->facebook;
        $settings->twitter = $this->twitter;
        $settings->instagram = $this->instagram;
        $settings->linkedin = $this->linkedin;
        $settings->youtube = $this->youtube;
        $settings->pinterest = $this->pinterest;
        $settings->tiktok = $this->tiktok;
        $settings->copyright = $this->copyright;

        $settings->save();

        // ✅ Refresh previews immediately
        $this->reset('logo', 'hero_image');

        session()->flash('success', 'Settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.settings.edit-general-settings');
    }
}
