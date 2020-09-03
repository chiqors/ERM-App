<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\WithPagination;
use App\Employee;
use App\Event;
use App\ActivityLogs;

class Beranda extends Component
{
    // use WithPagination;

    public $employees, $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    public $events, $event_id, $event_name, $event_start, $event_end, $event_details, $event_type;

    public $updateMode = false;

    /**
     * mount or construct function
     */
    // public function mount($id)
    // {
    //     $post = Post::find($id);

    //     if($post) {
    //         $this->postId   = $post->id;
    //         $this->title    = $post->title;
    //         $this->content  = $post->content;
    //     }
    // }

    public function render()
    {
        $this->employees = Employee::all();
        $this->events = forCalendar(Event::all()->toArray());
        return view('livewire.beranda');
    }

    // ------------------------
    // | Activity Logs Action |
    // ------------------------

    public function store_activity_logs($id,$bool_status)
    {
        $post = new ActivityLogs();
        $post->event_id = $id;
        if ($bool_status) {
            $post->status = 'Accepted';
        } else {
            $post->status = 'Rejeted';
        }
        $post->time = date("Y-m-d H:i:s");
        $post->save();

        session()->flash('message', 'Activity Logs has been stored.');
    }

    // -----------------
    // | Employee CRUD |
    // -----------------

    private function resetInputFields_employee(){
        $this->full_name = '';
        $this->addition_information = '';
        $this->position = '';
        $this->status = '';
        $this->join_date = '';
        $this->end_date = '';
        $this->contract_duration = '';
    }

    public function store_employee()
    {
        $this->validate([
            'full_name' => 'required',
            'status' => 'required',
            'join_date' => 'required',
            'contract_duration' => 'required',
        ]);

        $post = new Employee();
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = $this->join_date;
        $post->end_date = $this->end_date;
        $post->contract_duration = $this->contract_duration;
        $post->save();

        session()->flash('message', 'New Employee has been added.');
        $this->resetInputFields_employee();
    }

    public function edit_employee($id)
    {
        $post = Employee::findOrFail($id);
        $this->employee_id = $id;
        $this->full_name = $post->full_name;
        $this->addition_information = $post->addition_information;
        $this->position = $post->position;
        $this->status = $post->status;
        $this->join_date = $post->join_date;
        $this->end_date = $post->end_date;
        $this->contract_duration = $post->contract_duration;

        $this->updateMode = true;
    }

    public function cancel_employee()
    {
        $this->updateMode = false;
        $this->resetInputFields_employee();
    }

    public function update_employee()
    {
        $this->validate([
            'full_name' => 'required',
            'status' => 'required',
            'join_date' => 'required',
            'contract_duration' => 'required',
        ]);

        $post = Employee::find($this->employee_id);
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = $this->join_date;
        $post->end_date = $this->end_date;
        $post->contract_duration = $this->contract_duration;
        $post->save();

        $this->updateMode = false;

        session()->flash('message', 'Employee #'.$this->employee_id.' has been updated.');
        $this->resetInputFields_employee();
    }

    public function destroy_employee($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee #'.$this->employee_id.' has been deleted.');
    }

    // --------------
    // | Event CRUD |
    // --------------

    private function resetInputFields_event(){
        $this->event_name = '';
        $this->event_start = '';
        $this->event_end = '';
        $this->event_details = '';
        $this->event_type = '';
    }

    public function store_event()
    {
        $this->validate([
            'event_name' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
            'event_details' => 'required',
            'event_type' => 'required',
        ]);

        $post = new Event();
        $post->event_name = $request->event_name;
        $post->event_start = $request->event_start;
        $post->event_end = $request->event_end;
        $post->event_details = $request->event_details;
        $post->event_type = $request->event_type;
        $post->save();

        session()->flash('message', 'New Event has been added.');
        $this->resetInputFields_event();
    }

    public function edit_event($id)
    {
        $post = Event::findOrFail($id);
        $this->event_name = $post->event_name;
        $this->event_start = $post->event_start;
        $this->event_end = $post->event_end;
        $this->event_details = $post->event_details;
        $this->event_type = $post->event_type;

        $this->updateMode = true;
    }

    public function cancel_event()
    {
        $this->updateMode = false;
        $this->resetInputFields_event();
    }

    public function update_event()
    {
        $this->validate([
            'event_name' => 'required',
            'event_start' => 'required',
            'event_end' => 'required',
            'event_details' => 'required',
            'event_type' => 'required',
        ]);

        $post = Event::find($this->event_id);
        $post->event_name = $this->event_name;
        $post->event_start = $this->event_start;
        $post->event_end = $this->event_end;
        $post->event_details = $this->event_details;
        $post->event_type = $this->event_type;
        $post->save();

        $this->updateMode = false;

        session()->flash('message', 'Event #'.$this->event_id.' has been updated.');
        $this->resetInputFields_event();
    }

    public function destroy_event($id)
    {
        Event::find($id)->delete();
        session()->flash('message', 'Event #'.$this->event_id.' has been deleted.');
    }

}
