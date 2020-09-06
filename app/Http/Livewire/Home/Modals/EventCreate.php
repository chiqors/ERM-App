<?php

namespace App\Http\Livewire\Home\Modals;

use Livewire\Component;

class EventCreate extends Component
{
    public $event_name, $event_start, $event_end, $event_details, $event_type;

    public function render()
    {
        return view('livewire.home.modals.event_create');
    }

    private function resetInputFields(){
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
        $post->event_name = $this->event_name;
        $post->event_start = $this->event_start;
        $post->event_end = $this->event_end;
        $post->event_details = $this->event_details;
        $post->event_type = $this->event_type;
        $post->save();

        session()->flash('success', 'New Event has been added.');
        $this->resetInputFields();
    }
}
