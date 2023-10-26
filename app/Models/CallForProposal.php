<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallForProposal extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['proposaltitle','proposaldescription','startdate','enddate','status','remarks'];
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
