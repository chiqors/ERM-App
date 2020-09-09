<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFiles extends Model
{
    // Table Name
    protected $table = 'employee_files';
    // Primary Key
    public $primary_key = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'cv',
        'ktp',
        'certificate'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee_id');
    }
}
