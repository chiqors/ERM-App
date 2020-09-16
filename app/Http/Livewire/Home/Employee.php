<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\Livewire\WithPaginationExtended;

use App\Models\Employee as Emp;
use App\Models\EmployeeFiles;

class Employee extends Component
{
    // Initialize UploadFiles
    use WithFileUploads;
    // ----------------------

    // Initialize Datatable
    use WithPaginationExtended;
    protected $paginationQueryStringEnabled = false;
    public $perPage, $sortField, $sortAsc, $search;
    // --------------------

    // Initialize model of employee with variables
    public $employee_id, $full_name, $addition_information, $position, $status, $join_date, $end_date, $contract_duration;
    public $dir_name, $ktp, $cv, $certificate;
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

    // -----------------
    // UPDATED LIFECYCLE
    // -----------------

    public function updatedKtp($value)
    {
        $this->validate([
            'ktp' => 'mimes:pdf|max:2048',
        ]);
    }

    public function updatedCv($value)
    {
        $this->validate([
            'cv' => 'mimes:pdf|max:2048'
        ]);
    }

    public function updatedCertificate($value)
    {
        $this->validate([
            'certificate' => 'mimes:pdf|max:2048'
        ]);
    }

    // ---------------
    // RESET FUNCTIONS
    // ---------------

    private function resetInputFields()
    {
        $this->employee_id = '';
        $this->full_name = '';
        $this->addition_information = '';
        $this->position = '';
        $this->status = '';
        $this->join_date = '';
        $this->end_date = '';
        $this->contract_duration = '';
        $this->ktp = '';
        $this->cv = '';
        $this->certificate = '';
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
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'join_date' => 'required'
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

        // Upload File

        $post_last_id = $post->id;
        $dirName = $post_last_id.'-'.$post->full_name;
        $driveDirName = createGetDriveFolder($dirName);

        $post_files = new EmployeeFiles;
        $post_files->employee_id = $post->id;
        $post_files->dir_name = $driveDirName;
        if (!empty($this->ktp)) {
            $this->ktp->storeAs($driveDirName, 'ktp.pdf', 'google');
            $post_files->ktp = 'ktp.pdf';
        }
        if (!empty($this->cv)) {
            $this->ktp->storeAs($driveDirName, 'cv.pdf', 'google');
            $post_files->cv = 'cv.pdf';
        }
        if (!empty($this->certificate)) {
            $this->ktp->storeAs($driveDirName, 'certificate.pdf', 'google');
            $post_files->certificate = 'certificate.pdf';
        }
        $post->employee_files()->save($post_files);

        $this->emit('employeeStore'); // Close model to using to jquery
        session()->flash('success-employee', 'New Employee has been added.');
        $this->resetInputFields();
    }

    public function edit($emp_id)
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

    public function update()
    {
        $this->validate([
            'full_name' => 'required',
            'position' => 'required',
            'status' => 'required',
            'join_date' => 'required',
        ]);

        $post = Emp::find($this->employee_id);
        if ($post->full_name != $this->full_name) {
            updateDriveFolder($post->id, $post->full_name, $this->full_name);
            $post->full_name = $this->full_name;
        }
        $post->addition_information = $this->addition_information;
        $post->position = $this->position;
        $post->status = $this->status;
        $post->join_date = $this->join_date;
        $post->end_date = $this->end_date;
        $post->contract_duration = $this->contract_duration;
        $post->save();

        $this->emit('employeeUpdate'); // Close model to using to jquery
        session()->flash('success-employee', 'Employee <span class="font-weight-bold">'.$this->full_name.'</span> has been updated.');
        $this->resetInputFields();
    }

    public function upload()
    {
        $post_files = EmployeeFiles::where('employee_id', $this->employee_id)->first();
        if (!empty($this->ktp)) {
            deleteDriveFileInFolder($post_files->dir_name, $post_files->ktp);
            $this->ktp->storeAs($post_files->dir_name, 'ktp.pdf', 'google');
            $post_files->ktp = 'ktp.pdf';
        }
        if (!empty($this->cv)) {
            deleteDriveFileInFolder($post_files->dir_name, $post_files->cv);
            $this->cv->storeAs($post_files->dir_name, 'cv.pdf', 'google');
            $post_files->cv = 'cv.pdf';
        }
        if (!empty($this->certificate)) {
            deleteDriveFileInFolder($post_files->dir_name, $post_files->certificate);
            $this->certificate->storeAs($post_files->dir_name, 'certificate.pdf', 'google');
            $post_files->certificate = 'certificate.pdf';
        }
        $post_files->save();

        $this->emit('employeeUploadFiles'); // Close model to using to jquery
        session()->flash('success-employee', 'Employee <span class="font-weight-bold">'.$this->full_name.'\'s</span> files have been updated.');
        $this->resetInputFields();
    }

    public function download($folder, $file)
    {
        $this->emitSelf('download', $folder, $file);
        if ($file == 'ktp.pdf') {
            $nameFile = 'KTP';
        } else if ($file == 'cv.pdf') {
            $nameFile = 'CV';
        } else {
            $nameFile = 'certificate';
        }
        session()->flash('success-employee', '<span class="font-weight-bold">'.$this->full_name.'\'s</span> '.$nameFile.' has been started downloading!');
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
        $this->dir_name = $emp->employee_files->dir_name;
        $this->ktp = $emp->employee_files->ktp;
        $this->cv = $emp->employee_files->cv;
        $this->certificate = $emp->employee_files->certificate;
    }

    public function confirm_delete($emp_id)
    {
        $emp = Emp::find($emp_id);
        $this->employee_id = $emp->id;
        $this->full_name = $emp->full_name;
    }

    public function delete()
    {
        $post = Emp::find($this->employee_id);
        if (!empty($post->employee_files())) {
            deleteDriveFolder($post->employee_files->dir_name);
            $post->employee_files->delete();
        }
        $post->delete();

        $this->emit('employeeDelete'); // Close model to using to jquery
        session()->flash('success-employee', 'Employee <span class="font-weight-bold">'.$this->full_name.'</span> has been deleted.');
        $this->resetInputFields();
    }

}
