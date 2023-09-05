<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsersModel extends Model
{
    use Notifiable;
    public $table = 'users';

    public $primaryKey = 'id';

    public $fillable = ['name','email','role'];


    public function isDirector()
    {
        return $this->role === 1;
    }

    public function isResearcher()
    {
        return $this->role === 3;
    }
    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_reviewers', 'reviewer_id', 'project_id');
    }
    public function aprojects()
    {
        return $this->hasMany(ProjectsModel::class);
    }

    public function reviewedProjects()
    {
        return $this->belongsToMany(ProjectsModel::class, 'project_reviewer', 'user_id', 'project_id')
                    ->wherePivot('role', 4)
                    ->withPivot('role');
    }

    public function reviewDecisions()
    {
        return $this->hasMany(ReviewDecisionModel::class);
    }
    public function reviews()
    {
    
        return $this->hasMany(ReviewModel::class);
    }





}
