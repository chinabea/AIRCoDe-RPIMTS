<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{
    public $table = 'reviews';

    public $primaryKey = 'id';

    public $fillable = ['reviewdate','reviewcomments'];
}
