<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;
use App\Employee;

class EmployeeCreate extends Component
{
    public function render()
    {
        return view('livewire.home.modals.employee_create');
    }

    private function resetInputFields(){
        $this->employee_view = '';
        $this->employee_id = '';
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'join_date' => 'required',
        ]);

        Storage::cloud()->makeDirectory($this->full_name);

        $post = new Employee();
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = date('Y-m-d', strtotime($this->join_date));
        $post->end_date = date('Y-m-d', strtotime($this->end_date));
        $post->contract_duration = $this->contract_duration;
        if($this->cv) {
            $post->employee_files->cv = $this->cv;
        }
        if($this->ktp) {
            $post->employee_files->ktp = $this->ktp;
        }
        if($this->certificate) {
            $post->employee_files->certificate = $this->certificate;
        }
        $post->employee_files->save();
        $post->save();

        session()->flash('success', 'New Employee has been added.');
        $this->resetInputFields_employee();
    }
}
