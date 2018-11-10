<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function votes() {
        return $this->hasMany('App\VoteComment', 'comment_id', 'comment_id');
    }
}
