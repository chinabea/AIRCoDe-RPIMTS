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
                        'references',
                        'total_budget'
                    ];

    public function projectTeams()
    {
        return $this->hasMany(ProjectTeamModel::class, 'project_id');
    }

    public function lineItems()
    {
        return $this->hasMany(LineItemBudgetModel::class, 'project_id');
    }

    public function reviewers()
    {
        // return $this->belongsToMany(User::class, 'project_reviewer', 'project_id', 'user_id')
        //             ->wherePivot('role', 4)
        //             ->withPivot('role');


            return $this->belongsToMany(User::class, 'project_reviewers', 'project_id', 'user_id');

    }

    public function callForProposal()
    {
        return $this->hasMany(ProposalsModel::class, 'project_id');
    }

    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }

    // public function status()
    // {
    //     return $this->belongsTo(StatusModel::class, 'status');
    // }

    public function reviews()
    {
        return $this->hasMany(ReviewModel::class);
    }







}
