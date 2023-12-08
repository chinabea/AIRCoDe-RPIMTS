<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallForProposal extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['title','description','start_date','end_date','status','remarks'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function isOpen()
    {
        // Assuming 'start_date' and 'end_date' are columns in your database table
        $now = now();
        return $this->start_date <= $now && $this->end_date >= $now && $this->status === 'open';
    }
}
