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
        'contribution_to_knowledge', 
        'technical_soundness', 
        'comprehensive_subject_matter', 
        'applicable_and_sufficient_references', 
        'inappropriate_references', 
        'comprehensive_application', 
        'grammar_and_presentation', 
        'assumption_of_reader_knowledge', 
        'clear_figures_and_tables', 
        'adequate_explanations', 
        'technical_or_methodological_errors', 
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
