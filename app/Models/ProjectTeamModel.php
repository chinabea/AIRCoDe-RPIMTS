<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeamModel extends Model
{
    
    public $table = 'project_teams';

    public $primaryKey = 'id';

    public $fillable = ['member_name','role'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
