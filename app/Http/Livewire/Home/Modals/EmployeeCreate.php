<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;
use App\Employee;

class EmployeeCreate extends Component
{
    public $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;

    public function render()
    {
        return view('livewire.home.modals.employee-create');
    }

    private function resetInputFields(){
        $this->full_name = '';
        $this->addition_information = '';
        $this->position = '';
        $this->status = '';
        $this->join_date = '';
        $this->end_date = '';
        $this->contract_duration = '';
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'join_date' => 'required',
        ]);

        $post = new Employee();
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = 'Aktif';
        $post->join_date = date('Y-m-d', strtotime($this->join_date));
        $post->end_date = date('Y-m-d', strtotime($this->end_date));
        $post->contract_duration = $this->contract_duration;
        $post->save();

        session()->flash('success', 'New Employee has been added.');
        $this->resetInputFields();

        $this->emitTo('home.employee', 'employeeAdded');
        $this->emit('employeeStore'); // Close model to using to jquery
    }
}
