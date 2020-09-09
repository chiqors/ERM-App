<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Employee as Emp;

class Employee extends Component
{
    // Initialize Datatable
    use WithPagination;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------

    // Initialize model of employee with variables
    public $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    // -------------------------------------------

    // Initialize listener
    protected $listeners = [
        'contractCalc' => 'contractCalculate',
        'employeeRefresh' => 'employeeRefreshListener'
    ];
    // -------------------

    // Constructor On Load Server-side (Initialization)
    public function mount()
    {
        $this->perPage = 10;
        $this->sortField = 'full_name';
        $this->sortAsc = true;
        $this->search = '';
    }

    // Rendering on each function fired Client-side
    public function render()
    {
        return view('livewire.home.employee', [
            'employees' => Emp::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }

    private function resetInputFields(){
        $this->employee_id = '';
        $this->full_name = '';
        $this->addition_information = '';
        $this->position = '';
        $this->status = '';
        $this->join_date = '';
        $this->end_date = '';
        $this->contract_duration = '';
    }

    // ------------------
    // LISTENER FUNCTIONS
    // ------------------

    public function contractCalculate()
    {
        $this->contract_duration = daysDifference($this->join_date, $this->end_date);
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

    // --------------
    // CRUD FUNCTIONS
    // --------------

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'join_date' => 'required',
        ]);

        $post = new Emp();
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = 'Active';
        $post->join_date = date('Y-m-d', strtotime($this->join_date));
        $post->end_date = date('Y-m-d', strtotime($this->end_date));
        $post->contract_duration = $this->contract_duration;
        $post->save();

        $this->emit('employeeStore'); // Close model to using to jquery
        session()->flash('message', 'New Employee has been added.');
        $this->resetInputFields();
    }

    public function edit($emp_id)
    {
        $this->updateMode = true;
        $emp = Emp::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
        $this->addition_information = $emp->addition_information;
        $this->position = $emp->position;
        $this->status = $emp->status;
        $this->join_date = $emp->join_date;
        $this->end_date = $emp->end_date;
        $this->contract_duration = $emp->contract_duration;
    }

    public function update()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'status' => 'required',
            'join_date' => 'required',
        ]);

        $post = Emp::find($this->employee_id);
        $post->full_name = $this->full_name;
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = $this->join_date;
        $post->end_date = $this->end_date;
        $post->contract_duration = $this->contract_duration;
        $post->save();

        $this->emit('employeeUpdate'); // Close model to using to jquery
        session()->flash('message', 'Employee <span class="font-weight-bold">'.$this->full_name.'</span> has been updated.');
        $this->resetInputFields();

        $this->emit('employeeRefresh'); // Refresh data from DB
        $this->emit('employeeUpdate'); // Close model to using to jquery
        session()->flash('message', 'Employee #'.$this->employee_id.' has been updated.');
        $this->resetInputFields();

    }

    public function show($emp_id)
    {
        $emp = Emp::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
        $this->addition_information = $emp->addition_information;
        $this->position = $emp->position;
        $this->status = $emp->status;
        $this->join_date = $emp->join_date;
        $this->end_date = $emp->end_date;
        $this->contract_duration = $emp->contract_duration;
    }

    public function show($emp_id)
    {
        $emp = Emp::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
        $this->addition_information = $emp->addition_information;
        $this->position = $emp->position;
        $this->status = $emp->status;
        $this->join_date = $emp->join_date;
        $this->end_date = $emp->end_date;
        $this->contract_duration = $emp->contract_duration;
    }

    public function confirm_delete($emp_id)
    {
        $emp = Emp::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
    }

    public function delete()
    {
        // if (Emp::find($emp_id)->employee_files) {
        //     Emp::find($emp_id)->employee_files->delete();
        // }
        Emp::find($this->employee_id)->delete();
        $this->emit('employeeDelete'); // Close model to using to jquery
        session()->flash('success', 'Employee <span class="font-weight-bold">'.$this->full_name.'</span> has been deleted.');
        $this->resetInputFields();
    }

}
