<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Event;

class Calender extends Component
{
    public $calendar;

    public function render()
    {
        @$calendar_render = forCalendar(Event::all()->toArray());
        $this->calendar = $calendar_render;
        return view('livewire.home.calender');
    }
}
