<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function motherThread(){
        return $this.belongsTo('App\Thread', 'thread_id');
    }

    public function creator(){
        return $this.belongsTo('App\User', 'creator_id');
    }
}
