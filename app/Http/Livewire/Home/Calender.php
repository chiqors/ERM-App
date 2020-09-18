<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\Event;
use App\Models\EmployeeEvent;
use App\Models\Employee;

class Calender extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------

    // Initialize model of event with variables
    public $calendar;
    public $employees, $employee_count, $event_id, $event_name, $event_type, $event_start, $event_end, $event_details;
    public $employee_ids, $employee_names, $relation;
    // ----------------------------------------

    // Initialize listener
    protected $listeners = [
        'calenderRefresh' => 'calenderRefreshListener'
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 5;
        $this->sortField = 'event_name';
        $this->sortAsc = true;
        $this->search = '';

        @$calendar_render = forCalendar(Event::all()->toArray());
        $this->employees = Employee::all();
        $this->calendar = $calendar_render;

        $this->perPage = 5;
        $this->sortField = 'event_name';
        $this->sortAsc = true;
        $this->search = '';

        $this->employee_ids = [];
        $this->employee_names = [];
        $this->relation = [];
        $this->employee_count = 0;
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        return view('livewire.home.calender', [
            'events' => Event::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }

    private function resetInputFields()
    {
        $this->event_id = '';
        $this->event_name = '';
        $this->event_type = '';
        $this->event_start = '';
        $this->event_end = '';
        $this->event_details = '';

        $this->employee_ids = [];
        $this->employee_names = [];
        $this->relation = [];
        $this->employee_count = 0;
    }

    // ------------------
    // DATATABLE FUNCTION
    // ------------------

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    // ------------------
    // LISTENER FUNCTIONS
    // ------------------

    public function calenderRefreshListener()
    {
        $this->calendar = forCalendar(Event::all()->toArray());
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
            'event_end' => 'required'
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

        $this->emitTo('home.event-current', 'eventRefresh');
        $this->emit('calenderRefresh');
        $this->emit('eventStore'); // Close model to using to jquery
        session()->flash('success-event-control', 'New Event has been added to calendar.');
        $this->resetInputFields();
    }

    public function edit($ev_id)
    {
        $eve = Event::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
        $this->event_type = $eve->event_type;
        $this->event_start = $eve->event_start;
        $this->event_end = $eve->event_end;
        $this->event_details = $eve->event_details;
        $this->employee_count = $eve->employee->count();
        foreach ($eve->employee as $evp) {
            array_push($this->employee_ids, $evp->id);
        }
    }

    public function update()
    {
        $this->validate([
            'event_name' => 'required',
            'event_type' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
        ]);

        $post = Event::find($this->event_id);
        $post->event_name = $this->event_name;
        $post->event_type = $this->event_type;
        $post->event_start = date('Y-m-d H:i:s', strtotime($this->event_start));
        $post->event_end = date('Y-m-d H:i:s', strtotime($this->event_end));
        $post->event_details = $this->event_details;
        $post->save();
        $post->employee_event()->delete();
        $post_last_id = $post->id;

        for ($i = 0; $i < $this->employee_count; $i++) {
            $relates = new EmployeeEvent;
            $relates->event_id = $post_last_id;
            $relates->employee_id = $this->employee_ids[$i];
            array_push($this->relation, $relates);
        }
        $post->employee_event()->saveMany($this->relation);

        $this->emitTo('home.event-current', 'eventRefresh');
        $this->emit('calenderRefresh');
        $this->emit('eventUpdate'); // Close model to using to jquery
        session()->flash('success-event-control', 'Event <span class="font-weight-bold">'.$this->event_name.'</span> has been updated.');
        $this->resetInputFields();
    }

    public function show($ev_id)
    {
        $eve = Event::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
        $this->event_type = $eve->event_type;
        $this->event_start = $eve->event_start;
        $this->event_end = $eve->event_end;
        $this->event_details = $eve->event_details;
        $this->employee_names = $eve->employee;
    }

    public function confirm_delete($ev_id)
    {
        $eve = Event::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
    }

    public function delete()
    {
        $post = Event::find($this->event_id);
        $post->employee_event()->delete();
        $post->delete();

        $this->emitTo('home.event-current', 'eventRefresh');
        $this->emit('calenderRefresh');
        $this->emit('eventDelete'); // Close model to using to jquery
        session()->flash('success-event-control', 'Event <span class="font-weight-bold">'.$this->event_name.'</span> has been deleted.');
        $this->resetInputFields();
    }

}
