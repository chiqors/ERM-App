<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

use App\Models\Employee;

class NavMenu extends Component
{
    public $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    public $dir_name, $ktp, $cv, $certificate;

    public function mount()
    {
        $this->employee_id = Auth::user()->id;
        $this->full_name = Auth::user()->full_name;
        $this->addition_information = Auth::user()->addition_information;
        $this->position = Auth::user()->position;
        $this->status = Auth::user()->status;
        $this->join_date = Auth::user()->join_date;
        $this->end_date = Auth::user()->end_date;
        $this->contract_duration = Auth::user()->contract_duration;
    }

    public function logout()
    {
        Auth::logout();
        redirect()->intended(route('login'));
    }
    
    public function render()
    {
        return view('includes.header');
    }
}
