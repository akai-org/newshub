<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotePost extends Model
{
    protected $fillable = ['user_id', 'post_id', 'type'];

    protected $table = 'votes_posts';

    protected $primaryKey = 'vote_id';

    public function post() {
        return $this->belongsTo('\App\Post', 'post_id', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
