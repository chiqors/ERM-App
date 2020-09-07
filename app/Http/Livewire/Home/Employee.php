<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Employee as Emp;

class Employee extends Component
{
    public $employees;

    protected $listeners = ['employeeAdded' => 'employeeAddedListener'];

    public function mount()
    {
        $this->employees = Emp::all();
    }

    // Tiap kali render untuk listener
    public function render()
    {
        return view('livewire.home.employee');
    }

    public function employeeAddedListener()
    {
        $this->employees = Emp::all();
    }

    public function create()
    {

    }
}
