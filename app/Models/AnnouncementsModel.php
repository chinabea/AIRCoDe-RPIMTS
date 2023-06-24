<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementsModel extends Model
{
    public $table = 'announcements';

    public $primaryKey = 'id';

    public $fillable = ['title','content'];
}
