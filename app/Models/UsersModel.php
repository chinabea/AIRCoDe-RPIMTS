<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    public $table = 'users';

    public $primaryKey = 'id';

    public $fillable = ['name','email','role'];

    // public function projects()
    // {
    //     return $this->belongsToMany(Project::class, 'project_reviewers', 'user_id', 'project_id');
    // }

    // User.php

    public function projects()
    {
        return $this->belongsToMany(ProjectsModel::class, 'project_reviewers', 'reviewer_id', 'project_id');
    }

    public function reviewedProjects()
    {
        return $this->belongsToMany(ProjectsModel::class, 'project_reviewer', 'user_id', 'project_id')
                    ->wherePivot('role', 4)
                    ->withPivot('role');
    }




}
