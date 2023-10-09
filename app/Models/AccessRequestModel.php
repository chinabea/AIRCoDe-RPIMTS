<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequestModel extends Model
{
    public $table = 'accessrequest';

    public $primaryKey = 'id';

    public $fillable = ['role','dateofaccess','timeofaccess','purposeofaccess','dateapproved'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
