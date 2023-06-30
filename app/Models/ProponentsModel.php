<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProponentsModel extends Model
{
    public $table = 'proponents';

    public $primaryKey = 'id';

    public $fillable = ['title', 'status', 'content'];
}
