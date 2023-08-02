<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class ProjectReviewerModel extends Model
{
    public $table = 'project_reviewer';

    public $primaryKey = 'id';

    public $fillable = ['project_id','user_id'];
}

class ProjectReviewer extends Pivot
{
    protected $table = 'project_reviewer';
}
