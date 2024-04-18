<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $openModal = false;
    public function showModal()
    {
        $this->openModal = true;
    }
    public function hideModal()
    {
        $this->openModal = false;
    }
    #[Layout('components.layouts.windmill')]
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
