<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    public $table = 'reviews';

    public $primaryKey = 'id';

    public $fillable = [
        'user_id',
        'project_id', 
        'deadline',
        'project_name',
        'research_group',
        'project_authors',
        'project_introduction',
        'project_aims_and_objectives',
        'project_background',
        'research_contribution',
        'project_methodology',
        'project_start_date',
        'project_end_date',
        'project_workplan',
        'project_resources',
        'project_references',
        'project_total_budget',
        'other_rsc'
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }
    public function project()
    {
        return $this->belongsTo(ProjectsModel::class, 'project_id'); 
    }

    public function reviewDecision()
    {
        return $this->hasOne(ReviewDecisionModel::class, 'review_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }

    public function scopeReviewers($query)
    {
        return $query->whereHas('reviewer', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('id', 4); // Assuming role ID 4
            });
        });
    }

}
