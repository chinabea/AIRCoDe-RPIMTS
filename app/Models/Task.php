<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'project_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'assigned_to',
    ];
 
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function assignedTo()
    {
        return $this->belongsTo(Member::class, 'assigned_to');
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
