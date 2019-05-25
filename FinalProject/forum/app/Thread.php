<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function replies()
    {
        return $this->hasMany('App\Reply', 'thread_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'creator_id');
    }
}
