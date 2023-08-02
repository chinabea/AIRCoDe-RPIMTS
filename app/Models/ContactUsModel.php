<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    public $table = 'contact_messages';

    public $primaryKey = 'id';

    public $fillable = ['name','email','subject','message'];
}
