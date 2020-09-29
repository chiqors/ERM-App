<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Main extends Component
{
    public function mount()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()
            ->intended(route('login'));
    }

    public function render()
    {
        return view('livewire.home.main');
    }
}
