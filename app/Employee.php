<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Table Name
    protected $table = 'employees';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'addition_information',
        'position',
        'status',
        'join_date',
        'end_date',
        'contract_duration'
    ];

    public function employee_event()
    {
        return $this->hasMany('App\EmployeeEvent','employee_id');
    }
}
