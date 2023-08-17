<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ReviewDecisionModel extends Model
{
    public $table = 'review_decisions';
    public $primaryKey = 'id';
    public $fillable = ['review_id','decision'];


    public function projectReview()
    {
        return $this->belongsTo(ReviewModel::class, 'review_id');
    }

    public function user()
    {
        return $this->belongsTo(UsersModel::class);
    }
}
