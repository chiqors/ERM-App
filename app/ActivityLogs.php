<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    // Table Name
    protected $table = 'activity_logs';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'status',
        'time'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }
}
