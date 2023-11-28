<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['tracking_code',
                        'call_for_proposal_id',
                        'project_name',
                        'status',
                        'research_group',
                        'introduction',
                        'aims_and_objectives',
                        'background',
                        'expected_research_contribution',
                        'proposed_methodology',
                        'workplan',
                        'resources',
                        'references',
                        'total_budget',
                        'approval_date',
                    ];


    public function versions()
    {
        return $this->hasMany(Version::class, 'call_for_proposal_id');
    }

    public function callForProposal()
    {
        return $this->belongsTo(CallForProposal::class, 'project_id');
    }

    // public function projectTeams()
    // {
    //     return $this->hasMany(ProjectTeamModel::class, 'project_id');
    // }

    public function members()
    {
        return $this->hasMany(Member::class, 'project_id');
    }

    public function lineItems()
    {
        return $this->hasMany(LineItemBudget::class, 'project_id');
    }

    public function reviewers()
    {
        return $this->belongsToMany(User::class, 'project_reviewers', 'project_id', 'reviewer_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function callForProposal()
    // {
    //     return $this->belongsTo(CallForProposal::class);
    // }
}
