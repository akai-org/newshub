<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteComment extends Model
{
    protected $table = 'votes_comments';

    protected $primaryKey = 'vote_id';

    protected $fillable = ['type', 'comment_id', 'user_id'];

    public function comment() {
        return $this->belongsTo('\App\Comment', 'comment_id', 'comment_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
