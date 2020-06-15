<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagerie extends Model
{
    protected $fillable = ['from','to','message','is_read'];
}
