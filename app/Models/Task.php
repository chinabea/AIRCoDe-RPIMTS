<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    // Define the table name if it differs from "tasks"
    protected $table = 'tasks';

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

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }


}
