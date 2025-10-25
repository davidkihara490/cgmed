<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\AboutSection;

class Login extends Component
{
    // Form fields
    public $email;
    public $password;
    public $remember = false;
    
    // Component data
    public $settings;
    public $categories;
    public $aboutSection;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'The email address is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'The password is required.',
        'password.min' => 'The password must be at least 6 characters.',
    ];

    public function mount()
    {
        $this->settings = $this->getCompanySettings();
        $this->categories = $this->getCategories();
        $this->aboutSection = $this->getAboutSection();
    }

    public function render()
    {
         return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            // Authentication passed
            session()->regenerate();
            
            return redirect()->intended('/');
        }

        // Authentication failed
        $this->addError('email', 'The provided credentials do not match our records.');
    }

    // Helper methods for data retrieval
    protected function getCompanySettings()
    {
        return CompanyProfile::first();
    }

    protected function getCategories()
    {
        return Category::with([
            'subCategory' => function ($query) {
                $query->where('status', true)
                    ->limit(6);
            },
            'subCategory.products' => function ($query) {
                $query->where('status', true)
                    ->limit(9);
            }
        ])
            ->where('status', true)
            ->limit(4)
            ->get();
    }

    protected function getAboutSection()
    {
        return AboutSection::get();
    }
}