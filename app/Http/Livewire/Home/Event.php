<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\EmployeeEvent as Evn;

class Event extends Component
{
    public $eventtoday;

    public function render()
    {
        // $this->eventcontrol = Evn::where("employee_events.event_id", "events.id")->where("employee_events.employee_id", "employees.id")->select("employees.full_name, events.event_name, events.event_type, events.event_start, events.event_end, events.event_details");
        $this->eventtoday = Evn::all();
        return view('livewire.home.event');
    }
}

// SELECT *
// FROM events JOIN employee_events ON events.id = employee_events.event_id JOIN employees ON employee_events.employee_id = employees.id
// WHERE CURDATE() + INTERVAL 1 DAY
