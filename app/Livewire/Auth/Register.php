<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;
    public function register()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // You can add additional logic here, such as sending a confirmation email

        session()->flash('success', 'Registration successful! Please login.');

        // Redirect to the login page after successful registration
        return $this->redirect(route('dashboard'), true);
    }
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
