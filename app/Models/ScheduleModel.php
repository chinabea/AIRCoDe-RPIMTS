<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{

    // Define the table name if it differs from "schedules"
    protected $table = 'schedules';

    // Define the fillable attributes
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'assigned_to',
    ];

    // Define the "assignedTo" relationship
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
