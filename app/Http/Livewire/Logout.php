<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Employee;

class Logout extends Component
{
    public function logout()
    {
        \Auth::logout();
        return redirect()
            ->intended(route('login'));
    }

    public function render()
    {
        return view('livewire.logout');
    }
}