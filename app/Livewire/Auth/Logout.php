<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->flash('success', 'You have been logged out.');

        return $this->redirect(route('login'), true);
    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
