<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Employee;

class Login extends Component
{
    public $employees, $email, $password, $full_name;

    public function render()
    {
        return view('livewire.login');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->full_name = '';
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt(array('email' => $this->email, 'password' => $this->password)) ){
            //Authentication passed...
            session()->flash('success', "You have been Logged in successful!");
            return redirect()->intended(route('home'));
        } else {
            session()->flash('error', 'Email and Password are invalid!');
        }
    }

}
