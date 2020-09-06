<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Event as EV;

class Event extends Component
{
    public $event_month;

    public function render()
    {
        return view('livewire.home.event');
    }
}

// SELECT *
// FROM events JOIN employee_events ON events.id = employee_events.event_id JOIN employees ON employee_events.employee_id = employees.id
// WHERE MONTH(events.event_start) = MONTH(CURDATE())
