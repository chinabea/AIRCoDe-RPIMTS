<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = [
        'version_number',
        'tracking_code',
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
        // 'total_budget',
    ];

    public function callForProposal()
    {
        return $this->belongsTo(CallForProposal::class, 'call_for_proposal_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'call_for_proposal_id');
    }
}
