<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['creator'];

    public function replies()
    {
        return $this->hasMany('App\Reply', 'thread_id');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'creator_id');
    }
}
