<?php

namespace App\Models;

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
        return $this->hasMany('App\Models\EmployeeEvent','event_id');
    }

    public function employee()
    {
        return $this->belongsToMany('App\Models\Employee');
    }

    public function activity_logs()
    {
        return $this->hasMany('App\Models\ActivityLogs','event_id');
    }

    // DataTable
    public static function search($query)
    {
        return empty($query)
            ? static::query()
            : static::where('event_name', 'like', '%'.$query.'%');
    }
}
