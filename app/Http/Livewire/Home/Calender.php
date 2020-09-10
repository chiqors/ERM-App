<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

use App\Models\Event;
use App\Models\EmployeeEvent;
use App\Models\Employee;

class Calender extends Component
{
    // Initialize model of event with variables
    public $calendar;
    public $employees, $employee_count = 0, $event_id, $event_name, $event_type, $event_start, $event_end, $event_details;
    public $employee_ids = [], $relation = [];
    // ----------------------------------------

    // Initialize listener
    protected $listeners = [
        'calenderRefresh' => 'calenderRefreshListener'
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->emit('calendarRefresh');
        @$calendar_render = forCalendar(Event::all()->toArray());
        $this->employees = Employee::all();
        $this->calendar = $calendar_render;
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        return view('livewire.home.calender');
    }

    private function resetInputFields()
    {
        $this->event_id = '';
        $this->event_name = '';
        $this->event_type = '';
        $this->event_start = '';
        $this->event_end = '';
        $this->event_details = '';
        $this->employee_id = '';
    }

    // ------------------
    // LISTENER FUNCTIONS
    // ------------------

    public function calendarRefreshListener()
    {
        $this->employees = Employee::all();
    }

    // --------------
    // CASTO FUNCTION
    // --------------

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'event_name' => 'required',
            'event_type' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
        ]);

        $post = new Event();
        $post->event_name = $this->event_name;
        $post->event_type = $this->event_type;
        $post->event_start = date('Y-m-d H:i:s', strtotime($this->event_start));
        $post->event_end = date('Y-m-d H:i:s', strtotime($this->event_end));
        $post->event_details = $this->event_details;
        $post->save();
        $post_last_id = $post->id;

        for ($i = 0; $i < $this->employee_count; $i++) {
            $relates = new EmployeeEvent;
            $relates->event_id = $post_last_id;
            $relates->employee_id = $this->employee_ids[$i];
            array_push($this->relation, $relates);
        }
        $post->employee_event()->saveMany($this->relation);

        $this->emit('eventStore'); // Close model to using to jquery
        session()->flash('success', 'New Event has been added to calendar.');
        $this->resetInputFields();
    }
}
