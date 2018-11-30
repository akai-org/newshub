<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = 'posts';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'post_id');
    }

    public function votes() {
        return $this->hasMany('App\VotePost', 'post_id', 'post_id');
    }

    public function addComment($content, $is_adult=False, $is_visable=True) {
        return $this->comments()->create([
            'user_id' => Auth::user()->user_id,
            'content' => $content,
            'is_adult' => $is_adult,
            'is_visable' => $is_visable,
        ]);
    }

    public function addVote($type) {
        return $this->votes()->create([
            'user_id' => Auth::user()->user_id,
            'type' => $type,
        ]);
    }
}