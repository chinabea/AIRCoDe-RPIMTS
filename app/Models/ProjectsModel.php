<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    public $table = 'projects';

    public $primaryKey = 'id';

    public $fillable = ['projname',
                        'status',
                        'researchgroup',
                        'authors',
                        'introduction',
                        'aims_and_objectives',
                        'background',
                        'expected_research_contribution',
                        'proposed_methodology',
                        'start_date',
                        'end_date',
                        'workplan',
                        'resources',
                        'references'
                    ];

    // public function reviewers()
    // {
    //     return $this->belongsToMany(User::class, 'project_reviewers', 'project_id', 'user_id')
    //                 ->where('users.role', '4')
    //                 ->limit(3);
    // }

    // public function reviewers()
    // {
    // return $this->belongsToMany(User::class, 'project_reviewers', 'project_id', 'reviewer_id');
    // }

    public function projectTeam()
    {
        return $this->hasOne(ProjectTeam::class);
    }

    public function reviewers()
    {
        return $this->belongsToMany(User::class, 'project_reviewer', 'project_id', 'user_id')
                    ->wherePivot('role', 4)
                    ->withPivot('role');
    }




}
