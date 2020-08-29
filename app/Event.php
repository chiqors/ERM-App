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
        'date',
        'detail_event',
        'event_duration',
        'event_type'
    ];

    public function employee_event()
    {
        return $this->hasMany('App\EmployeeEvent','event_id');
    }
}
