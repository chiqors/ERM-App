<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEvent extends Model
{
    // Table Name
    protected $table = 'employee_event';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'event_id'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event','event_id');
    }
}
