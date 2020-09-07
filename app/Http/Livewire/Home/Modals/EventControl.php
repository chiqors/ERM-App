<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;
use App\EmployeeEvent as Evn;

class EventControl extends Component
{
    public $eventcontrol;

    public function render()
    {
        // $this->eventcontrol = Evn::where("employee_events.event_id", "events.id")->where("employee_events.employee_id", "employees.id")->select("employees.full_name, events.event_name, events.event_type, events.event_start, events.event_end, events.event_details");
        $this->eventcontrol = Evn::all();
        return view('livewire.home.modals.event-control');
    }
}
