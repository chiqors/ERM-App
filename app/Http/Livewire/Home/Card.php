<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\Employee;

class Card extends Component
{
    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------
    
    // Initialize model of cards with variables
    public $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    public $workleaves_count, $internship_status, $active_employees, $inactive_employees, $this_month;
    // -------------------------------------------

    // Initialize listener
    protected $listeners = [
        'contractCalc' => 'contractCalculate',
    ];
    // -------------------
    
    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 10;
        $this->sortField = 'full_name';
        $this->sortAsc = true;
        $this->search = '';
        $this->iteration = 0;

        $this->this_month = date('m');
        $this->workleaves_count = Employee::count();
        $this->internship_status = Employee::whereMonth('end_date', '=', $this->this_month)->count();
        $this->active_employees = Employee::where('status', 'Active')->count();
        $this->inactive_employees = Employee::where('status', 'Inactive')->count();
    }

    public function render()
    {
        return view('livewire.home.card', [
            'workleavesreport' => Employee::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
            'internshipstatus' => Employee::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->whereMonth('end_date', '=', $this->this_month)
                ->paginate($this->perPage)
        ]);
    }
}
