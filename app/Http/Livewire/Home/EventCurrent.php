<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Traits\Livewire\WithPaginationExtended;
use Carbon\Carbon;

use App\Models\ActivityLogs;
use App\Models\Event;

class EventCurrent extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc;
    // --------------------

    // Initialize listener
    protected $listeners = [
        'eventRefresh' => 'render',
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
        $query = Event::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->whereDate('event_start', '<=', today()->toDateString())
                    ->where('event_status', 'Progress')
                    ->paginate($this->perPage);
        return view('livewire.home.event-current', [
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

    public function complete($ev_id, $status)
    {
        $update = Event::find($ev_id);
        if ($update->event_type == 'Recurring Monthly') {
            $update->event_start = Carbon::parse($update->event_start)->addMonth();
            $update->event_end = Carbon::parse($update->event_end)->addMonth();
            $update->save();
        }
        if ($update->event_type == 'Recurring Yearly') {
            $update->event_start = Carbon::parse($update->event_start)->addYear();
            $update->event_end = Carbon::parse($update->event_end)->addYear();
            $update->save();
        }
        if ($update->event_type == 'One Time') {
            $update->event_status = "Done";
            $update->save();
        }
        if ($status) {
            $post = new ActivityLogs();
            $post->event_id = $update->id;
            $post->status = 'Accepted';
            $post->time = date('Y-m-d');
            $post->save();
            session()->flash('success-event-current', 'Event <span class="font-weight-bold">'.$update->event_name.'</span> has been completed. Added to logs.');
        } else {
            $post = new ActivityLogs();
            $post->event_id = $update->id;
            $post->status = 'Rejected';
            $post->time = date('Y-m-d');
            $post->save();
            session()->flash('success-event-current', 'Event <span class="font-weight-bold">'.$update->event_name.'</span> has been cancelled. Added to logs.');
        }
    }
}

// SELECT *
// FROM events JOIN employee_events ON events.id = employee_events.event_id JOIN employees ON employee_events.employee_id = employees.id
// WHERE CURDATE() + INTERVAL 1 DAY
