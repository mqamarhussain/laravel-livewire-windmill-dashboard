<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.windmill')]
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
