<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsModel extends Model
{
    public $table = 'aboutus';

    public $primaryKey = 'id';

    public $fillable = ['title','content'];
}
