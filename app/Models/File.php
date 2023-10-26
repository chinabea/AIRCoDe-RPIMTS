<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['project_id', 'file_name', 'file_path'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
