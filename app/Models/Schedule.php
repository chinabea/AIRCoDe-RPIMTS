<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
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
    

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];


    // Define the "assignedTo" relationship
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
