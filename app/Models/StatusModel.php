<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    public $table = 'statuses';

    public $primaryKey = 'id';

    public $fillable = ['project_id', 'status',

                    ];
    // public function projects()
    // {
    //     return $this->hasMany(Project::class, 'status');
    // }

}
