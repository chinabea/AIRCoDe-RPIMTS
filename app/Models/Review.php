<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = [
        'user_id',
        'project_id', 
        'deadline',
        'contribution_to_knowledge_decision', 
        'technical_soundness_decision', 
        'comprehensive_subject_matter_decision', 
        'applicable_and_sufficient_references_decision', 
        'inappropriate_references_decision', 
        'comprehensive_application_decision', 
        'grammar_and_presentation_decision', 
        'assumption_of_reader_knowledge_decision', 
        'clear_figures_and_tables_decision', 
        'adequate_explanations_decision', 
        'technical_or_methodological_errors_decision', 

        'contribution_to_knowledge_comments', 
        'technical_soundness_comments', 
        'comprehensive_subject_matter_comments', 
        'applicable_and_sufficient_references_comments', 
        'inappropriate_references_comments', 
        'comprehensive_application_comments', 
        'grammar_and_presentation_comments', 
        'assumption_of_reader_knowledge_comments', 
        'clear_figures_and_tables_comments', 
        'adequate_explanations_comments', 
        'technical_or_methodological_errors_comments', 
        
        'reseach_project_name',
        'reseach_project_group',
        'project_introduction',
        'project_aims_and_objectives',
        'project_background',
        'project_expected_research_contribution',
        'project_proposed_methodology',
        'project_workplan',
        'project_resources',
        'project_references',
        'project_total_budget',

        'other_comments', 
        'review_decision',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id'); 
    }

    // public function reviewDecision()
    // {
    //     return $this->hasOne(ReviewDecision::class, 'review_id');
    // }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeReviewers($query)
    {
        return $query->whereHas('reviewer', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('id', 4); // Assuming role ID 4
            });
        });
    }
  
    public function deadlineExceeded()
    {
        $currentDate = now();
        return $this->deadline < $currentDate;
    }

}
