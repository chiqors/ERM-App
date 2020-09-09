<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\ActivityLogs;
use App\Models\Event as EV;

class Event extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc;
    // --------------------

    // Initialize listener
    protected $listeners = [
        'eventRefresh' => 'eventRefreshListener'
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 3;
        $this->sortField = 'event_name';
        $this->sortAsc = true;
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        $event_id_log = ActivityLogs::pluck('event_id')->all();
        $query = EV::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
        return view('livewire.home.event', [
            'events' => $query
        ]);
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

    public function eventRefreshListener()
    {

    }

    // -----------------
    // COMPLETE FUNCTION
    // -----------------

    public function complete($ev_id, $name, $status)
    {
        if ($status) {
            $post = new ActivityLogs();
            $post->event_id = $ev_id;
            $post->status = 'Accepted';
            $post->time = date('Y-m-d');
            $post->save();
            session()->flash('message', 'Event <span class="font-weight-bold">'.$name.'</span> has been completed. Added to logs.');
        } else {
            $post = new ActivityLogs();
            $post->event_id = $ev_id;
            $post->status = 'Rejected';
            $post->time = date('Y-m-d');
            $post->save();
            session()->flash('message', 'Event <span class="font-weight-bold">'.$name.'</span> has been cancelled. Added to logs.');
        }
    }
}

// SELECT *
// FROM events JOIN employee_events ON events.id = employee_events.event_id JOIN employees ON employee_events.employee_id = employees.id
// WHERE CURDATE() + INTERVAL 1 DAY
