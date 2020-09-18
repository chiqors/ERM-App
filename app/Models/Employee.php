<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    // Table Name
    protected $table = 'employees';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = false;
    // Guard
    protected $guard = 'employee';
    // Hidden
    protected $hidden = array('password', 'remember_token');

    protected $fillable = [
        'full_name',
        'email',
        'addition_information',
        'position',
        'status',
        'join_date',
        'end_date',
        'contract_duration'
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function event()
    {
        return $this->belongsToMany('App\Models\Event');
    }

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
            : static::where('full_name', 'like', '%'.$query.'%')
                    ->OrWhere('position', 'like', '%'.$query.'%');
    }
}
