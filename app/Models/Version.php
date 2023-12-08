<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = [
        'user_id',
        'version_number',
        'tracking_code',
        'call_for_proposal_id',
        'project_name',
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

    public function callForProposal()
    {
        return $this->belongsTo(CallForProposal::class, 'call_for_proposal_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'call_for_proposal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
