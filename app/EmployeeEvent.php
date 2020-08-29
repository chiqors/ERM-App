<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEvent extends Model
{
    // Table Name
    protected $table = 'employee_events';
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
        return $this->belongsTo('App\Employee','employee_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }
}
