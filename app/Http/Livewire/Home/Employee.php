<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Employee as Emp;

class Employee extends Component
{
    public $employees;

    public function render()
    {
        $this->employees = Emp::all();
        return view('livewire.home.employee');
    }
}
