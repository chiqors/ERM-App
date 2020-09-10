<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\Event AS EV;
use App\Models\Employee;
use App\Models\EmployeeEvent;

class Event extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------

    // Initialize model of event with variables
    public $employees, $employee_count = 0, $event_id, $event_name, $event_type, $event_start, $event_end, $event_details;
    public $employee_ids = [], $relation = [];
    // ----------------------------------------

    // Initialize listener
    protected $listeners = [
        'eventRefresh' => 'render'
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 5;
        $this->sortField = 'event_name';
        $this->sortAsc = true;
        $this->search = '';
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        return view('livewire.home.modals.event-control-body', [
            'events' => EV::search($this->search)
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
        $this->employee_ids = [];
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

    // -----------------
    // LISTENER FUNCTION
    // -----------------

    public function eventRefreshListener()
    {

    }

    // --------------
    // CAUD FUNCTIONS
    // --------------

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function edit($ev_id)
    {
        $eve = EV::find($ev_id);
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

        $post = EV::find($emp_id);
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

        $this->emit('eventUpdate'); // Close model to using to jquery
        session()->flash('success', 'Event <span class="font-weight-bold">'.$this->event_name.'</span> has been updated.');
        $this->resetInputFields();
    }

    public function show($ev_id)
    {
        $eve = EV::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
        $this->event_type = $eve->event_type;
        $this->event_start = $eve->event_start;
        $this->event_end = $eve->event_end;
        $this->event_details = $eve->event_details;
    }

    public function confirm_delete($ev_id)
    {
        $eve = EV::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
    }

    public function delete()
    {
        $post = EV::find($this->event_id)->delete();
        $post->employee_event()->delete();
        $post->delete();
        $this->emit('eventDelete'); // Close model to using to jquery
        session()->flash('success', 'Event <span class="font-weight-bold">'.$this->event_name.'</span> has been deleted.');
        $this->resetInputFields();
    }
}
