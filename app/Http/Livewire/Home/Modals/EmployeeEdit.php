<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee_view, $employee_id;

    public function mount($id)
    {
        $this->employee_id = Employee::find($id);
    }

    public function render()
    {
        $this->employee_view = Employee::find($this->employee_id);
        return view('livewire.home.modals.employee_edit');
    }

    private function resetInputFields(){
        $this->employee_view = '';
        $this->employee_id = '';
    }

    public function update()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'join_date' => 'required',
        ]);

        $post = Employee::find($this->employee_id);
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = $this->join_date;
        $post->end_date = $this->end_date;
        $post->contract_duration = $this->contract_duration;
        $post->save();

        session()->flash('success', 'Employee #'.$this->employee_id.' has been updated.');
        $this->resetInputFields();
    }
}
