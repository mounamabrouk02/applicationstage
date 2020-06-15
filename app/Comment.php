<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id','parent_id','content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project()
    {
        return $this->belongsTo('App\Project','parent_id');
    }
}
