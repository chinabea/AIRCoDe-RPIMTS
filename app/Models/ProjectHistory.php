<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectHistory extends Model
{
    protected $fillable = ['project_id', 'date', 'history_text'];

    // Assuming that the table name is 'project_histories'
    protected $table = 'project_histories';

    // Relationship with the Project model (assuming 'projects' table for projects)
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
