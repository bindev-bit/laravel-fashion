<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        if (auth()->user()->role_id === 2) {
            return redirect()->to('/');
        }
    }
    public function render()
    {
        return view('dashboard');
    }
}
