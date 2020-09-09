<?php

namespace App\Models;

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
        return $this->hasMany('App\Models\EmployeeEvent','employee_id');
    }

    public function employee_files()
    {
        return $this->hasOne('App\Models\EmployeeFiles','employee_id');
    }

    // DataTable
    public static function search($query)
    {
        return empty($query)
            ? static::query()
            : static::where('full_name', 'like', '%'.$query.'%');
    }
}
