<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    public $table = 'users';

    public $primaryKey = 'id';

    public $fillable = ['name','email','role'];
}
