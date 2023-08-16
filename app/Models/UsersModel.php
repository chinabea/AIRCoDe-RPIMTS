<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    public $table = 'users';

    public $primaryKey = 'id';

    public $fillable = ['name','email','role'];

    public function projects()
    {
        return $this->belongsToMany(ProjectsModel::class, 'project_reviewers', 'reviewer_id', 'project_id');
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

    // public function reviewedProjects()
    // {
    //     return $this->belongsToMany(ProjectsModel::class, 'reviews')
    //         ->withPivot('comment') // Pivot columns like rating and comment
    //         ->using(ReviewModel::class); // Use the ReviewModel as the pivot model
    // }

    // public function projects(): HasMany
    // {
    //     return $this->hasMany(Project::class);
    // }



}
