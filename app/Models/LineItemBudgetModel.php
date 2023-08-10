<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineItemBudgetModel extends Model
{

    public $table = 'line_items';

    public $primaryKey = 'id';

    public $fillable = ['project_id','name','quantity','unit_price'];

    public function project()
    {
        return $this->belongsTo(ProjectsModel::class, 'project_id');
    }
}
