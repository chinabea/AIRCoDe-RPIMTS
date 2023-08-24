<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    public $table = 'reviews';

    public $primaryKey = 'id';

    public $fillable = ['user_id','project_id', 'highlighted_text', 'comment'];

    public function reviewer()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }
    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }

    public function project()
    {
        return $this->belongsTo(ProjectsModel::class);
    }

    public function reviewDecision()
    {
        return $this->hasOne(ReviewDecisionModel::class, 'review_id');
    }

}
