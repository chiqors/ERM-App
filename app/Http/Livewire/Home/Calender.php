<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Event;

class Calender extends Component
{
    // Initialize Datatable
    use WithPagination;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------

    // Initialize model of event with variables
    public $calendar;
    public $event_id, $event_name, $event_type, $event_start, $event_end, $event_details;
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
        $this->calendar = $calendar_render;
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        $this->emit('calenderRender'); // Re-render calendar function
        return view('livewire.home.calender', [
            'events' => Event::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }

    private function resetInputFields(){
        $this->event_id = '';
        $this->event_name = '';
        $this->event_type = '';
        $this->event_start = '';
        $this->event_end = '';
        $this->event_details = '';
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

    // -----------------
    // LISTENER FUNCTION
    // -----------------

    public function calenderRefreshListener()
    {

    }

    // --------------
    // CRUD FUNCTIONS
    // --------------


}
