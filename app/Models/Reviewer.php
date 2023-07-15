<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_reviewer', 'reviewer_id', 'project_id');
    }
}
