<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['project_id','member_name','role'];
 
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

}
