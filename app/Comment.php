<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = ['content', 'post_id', 'user_id', 'parent_id', 'is_visable', 'is_adult'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function votes() {
        return $this->hasMany('App\VoteComment', 'comment_id', 'comment_id');
    }

    public function replies() {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function parent() {
        return $this->hasOne('App\Comment', 'comment_id', 'parent_id');
    }

    public function jquery_comment() {
        $array = [
            'id' => $this->comment_id,
            'created' => $this->created_at->format('Y-m-d'), //Inne formaty nie działają przy ładowaniu odpowiedzi
            'modified' => $this->updated_at->format('Y-m-d'),    
            'content' => $this->content,                 // Either content or fileURL must be present
            //'file_url' =>                 // Either content or fileURL must be present
            //file                    // Required when uploading an attachment
            //file_mime_type            // Optional
            //pings                   // Required if pinging is enabled
            //creator                 // Required if pinging is enabled
            'fullname' => $this->user->username,                // Required
            'profile_url' => url('user/'.$this->user->username),
            'profile_picture_url' => $this->user->image,       // Optional
            'upvote_count' => $this->votes()->where('type', 'plus')->count(),
            'parent' => ($this->parent) ? $this->parent->comment_id : null,
        ];
        return $array;
    }
}
