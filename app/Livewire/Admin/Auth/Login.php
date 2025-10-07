<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email = 'test@example.com';
    public $password = 'password';

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ];
    }

    public function submit()
    {
        $fields = $this->validate();

        if (!Auth::attempt($fields)) {
            $this->addError('email', 'Invalid email or password');
            return;
        }
        session()->regenerate();
        $user = Auth::user();

        return redirect()->route('settings');
    }
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
