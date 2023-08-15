<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFileModel extends Model
{

    public $table = 'project_files';

    public $primaryKey = 'id';

    public $fillable = ['project_id', 'file_name', 'file_path'];

    public function project()
    {
        return $this->belongsTo(ProjectsModel::class, 'project_id');
    }
}