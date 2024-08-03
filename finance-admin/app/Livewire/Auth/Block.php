<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Block extends Component
{
    public $dashboardLink;

    public function block()
    {
        $role = Auth::user()->role_code;

        if ($role === '101') {
            $dashboardLink = route('developer');
        } elseif ($role === '102') {
            $dashboardLink = route('admin');
        } elseif ($role === '103') {
            $dashboardLink = route('user');
        } else {
            $dashboardLink = route('dashboard');
        }

        return redirect($dashboardLink);
    }

    public function render()
    {
        return view('livewire.auth.block');
    }
}
