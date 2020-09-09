<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    // Table Name
    protected $table = 'activity_logs';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'status',
        'time'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event','event_id');
    }
}
