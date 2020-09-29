<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Carbon\Carbon;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\Employee;
use App\Models\Event;

class Card extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage;
    // --------------------
    
    // Initialize model of cards with variables
    public $employee_names, $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    public $event_id, $event_name, $event_type, $event_start, $event_end, $event_details, $event_status;
    public $workleaves_count, $internship_status, $active_employees, $inactive_employees, $this_month;
    // -------------------------------------------
    
    // Initialize listener
    protected $listeners = [
        'cardRefresh' => '$refresh',
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 10;
        $this->iteration = 0;

        $this->resetFields();

        $this->this_month = date('m');
        $this->workleaves_count = Event::where('event_name', 'LIKE', 'Cuti:%')
            ->where('event_start', '<=', now())
            ->where('event_end', '>=', now())
            ->count();
        $this->internship_status = Employee::whereMonth('end_date', '=', $this->this_month)->count();
        $this->active_employees = Employee::where('status', 'Active')->where('id', '!=', \Auth::user()->id)->count();
        $this->inactive_employees = Employee::where('status', 'Inactive')->where('id', '!=', \Auth::user()->id)->count();
    }

    public function render()
    {
        return view('livewire.home.card', [
            'workleavesreport' => Event::where('event_name', 'LIKE', 'Cuti:%')
                ->with(['employee' => function($q){
                    $q->where('status', 'Active');
                }])
                ->where('event_start', '<=', now())
                ->where('event_end', '>=', now())
                ->paginate($this->perPage),
            'internshipstatus' => Employee::whereMonth('end_date', '=', $this->this_month)
                ->paginate($this->perPage)
        ]);
    }

    private function resetFields()
    {
        $this->employee_id = '';
        $this->full_name = '';
        $this->addition_information = '';
        $this->position = '';
        $this->status = '';
        $this->join_date = '';
        $this->end_date = '';
        $this->contract_duration = '';

        $this->event_id = '';
        $this->event_name = '';
        $this->event_type = '';
        $this->event_start = '';
        $this->event_end = '';
        $this->event_details = '';
        $this->event_status = '';
        $this->employee_names = [];
    }

    public function refreshListener()
    {
        $this->workleaves_count = Employee::whereHas('event', function ($query) {
            $query
                ->where('event_name', 'LIKE', 'Cuti:%')
                ->where('event_start', '<=', now())
                ->where('event_end', '>=', now());
        })->count();
        $this->internship_status = Employee::whereMonth('end_date', '=', $this->this_month)->count();
        $this->active_employees = Employee::where('status', 'Active')->where('id', '!=', \Auth::user()->id)->count();
        $this->inactive_employees = Employee::where('status', 'Inactive')->where('id', '!=', \Auth::user()->id)->count();
    }

    public function cancel()
    {
        $this->resetFields();
    }

    public function show_workleavesreport($ev_id)
    {
        $eve = Event::find($ev_id);
        $this->event_id = $eve->id;
        $this->event_name = $eve->event_name;
        $this->event_type = $eve->event_type;
        $this->event_start = $eve->event_start;
        $this->event_end = $eve->event_end;
        $this->event_details = $eve->event_details;
        $this->event_status = $eve->event_status;
        $this->employee_names = $eve->employee;
    }

    public function show_internship($emp_id)
    {
        $emp = Employee::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
        $this->addition_information = $emp->addition_information;
        $this->position = $emp->position;
        $this->status = $emp->status;
        $this->join_date = $emp->join_date;
        $this->end_date = $emp->end_date;
        $this->contract_duration = $emp->contract_duration;
    }
}
