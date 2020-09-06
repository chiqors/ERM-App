<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;
use App\Employee;

class EmployeeView extends Component
{
    public $employee_view, $employee_id;

    public function mount($id)
    {
        $this->employee_id = Employee::find($id);
    }

    public function render()
    {
        $this->employee_view = Employee::find($this->employee_id);
        return view('livewire.home.modals.employee_view');
    }
}
