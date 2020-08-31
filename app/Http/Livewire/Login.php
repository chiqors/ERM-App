<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
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
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            session()->flash('message', "You are Login successful.");
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }

}
