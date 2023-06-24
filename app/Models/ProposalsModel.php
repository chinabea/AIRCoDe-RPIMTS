<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalsModel extends Model
{
    public $table = 'proposals';

    public $primaryKey = 'id';

    public $fillable = ['proposaltitle','proposaldescription','startdate','enddate','status','remarks'];

}
