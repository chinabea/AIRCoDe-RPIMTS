<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineItemBudget extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['project_id','name','quantity','unit_price', 'total_price'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
