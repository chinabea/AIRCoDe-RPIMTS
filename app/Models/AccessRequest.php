<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequest extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['date_of_access','time_of_access','purpose_of_access','status','status_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
