<?php

// namespace App\Livewire\Auth;

// use App\Models\AboutSection;
// use App\Models\Category;
// use App\Models\CompanyProfile;
// use Livewire\Component;

// class CreateAccount extends Component
// {
//     public $settings;
//     public $categories;
//     public $aboutSection;

//     public function mount()
//     {
//         $this->settings = $this->getCompanySettings();
//         $this->categories = $this->getCategories();
//         $this->aboutSection = $this->getAboutSection();
//     }
//     public function render()
//     {
//         return view('livewire.auth.create-account');
//     }
//     protected function getCompanySettings()
//     {
//         return CompanyProfile::first();
//     }

//     protected function getCategories()
//     {
//         return Category::with([
//             'subCategory' => function ($query) {
//                 $query->where('status', true)
//                     ->limit(6);
//             },
//             'subCategory.products' => function ($query) {
//                 $query->where('status', true)
//                     ->limit(9);
//             }
//         ])
//             ->where('status', true)
//             ->limit(4)
//             ->get();
//     }

//     protected function getAboutSection()
//     {
//         return AboutSection::get();
//     }
// }

namespace App\Livewire\Auth;

use App\Models\Partner;
use Livewire\Component;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\AboutSection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAccount extends Component
{
    // Form fields
    public $company_name;
    public $company_type;
    public $company_address;
    public $country;
    public $city;
    public $postal_code;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $confirm_password;
    public $job_title;
    public $user_type;
    public $terms_agreement = false;

    // Component data
    public $settings;
    public $categories;
    public $aboutSection;

    // Current step
    public $currentStep = 1;

    public function mount()
    {
        $this->settings = $this->getCompanySettings();
        $this->categories = $this->getCategories();
        $this->aboutSection = $this->getAboutSection();
    }

    public function render()
    {
        return view('livewire.auth.create-account');
    }

    // Navigation methods
    public function nextStep()
    {
        if ($this->validateCurrentStep()) {
            $this->currentStep++;
        }
    }

    public function prevStep()
    {
        $this->currentStep--;
    }

    public function goToStep($step)
    {
        if ($step >= 1 && $step <= 4) {
            $this->currentStep = $step;
        }
    }

    // Validation methods
    private function validateCurrentStep()
    {
        switch ($this->currentStep) {
            case 1:
                return $this->validateStep1();
            case 2:
                return $this->validateStep2();
            case 3:
                return $this->validateStep3();
            default:
                return true;
        }
    }

    private function validateStep1()
    {
        $this->validate([
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|string',
            'company_address' => 'required|string|max:500',
            'country' => 'required|string',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ]);

        return true;
    }

    private function validateStep2()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:password',
        ]);

        return true;
    }

    private function validateStep3()
    {
        $this->validate([
            'user_type' => 'required|in:customer,supplier',
        ]);

        return true;
    }

    // Form submission
    public function submit()
    {
        $this->validate([
            'terms_agreement' => 'required|accepted',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'phone' => $this->phone,
                'terms_agreement' => $this->terms_agreement,
            ]);

            $partner = Partner::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'company_name' => $this->company_name,
                'company_type' => $this->company_type,
                'company_address' => $this->company_address,
                'country' => $this->country,
                'city' => $this->city,
                'postal_code' => $this->postal_code,
                'phone' => $this->phone,
                'job_title' => $this->job_title,
                'user_type' => $this->user_type == "supplier" ? 'supplier' : 'client',
                'user_id' => $user->id
            ]);

            DB::commit();
            return redirect()->route('login')->with('success', 'Account created successfully. Login to continue');
        } catch (\Throwable $th) {
            session()->flash('error', 'Error occurred.' . $th->getMessage());
        }
        // Reset form
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'company_name',
            'company_type',
            'company_address',
            'country',
            'city',
            'postal_code',
            'first_name',
            'last_name',
            'email',
            'phone',
            'password',
            'confirm_password',
            'job_title',
            'user_type',
            'terms_agreement',
            'currentStep'
        ]);
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
