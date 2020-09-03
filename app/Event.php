<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Table Name
    protected $table = 'events';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = false;

    protected $fillable = [
        'event_name',
        'event_start',
        'event_end',
        'event_details',
        'event_type'
    ];

    public function employee_event()
    {
        return $this->hasMany('App\EmployeeEvent','event_id');
    }

    public function activity_logs()
    {
        return $this->hasMany('App\ActivityLogs','event_id');
    }
}
