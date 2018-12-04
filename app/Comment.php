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

    public function jquery_comment() {
        $array = [
            'id' => $this->comment_id,
            //'parent' =>                   // Required if replying is enabled
            'created' => $this->created_at->format('Y-m-d H:i:s'),
            'modified' => $this->updated_at->format('Y-m-d H:i:s'),    
            'content' => $this->content,                 // Either content or fileURL must be present
            //'file_url' =>                 // Either content or fileURL must be present
            //file                    // Required when uploading an attachment
            //file_mime_type            // Optional
            //pings                   // Required if pinging is enabled
            //creator                 // Required if pinging is enabled
            'fullname' => $this->user->username,                // Required
            'profile_url' => url('user/'.$this->user->username),
            'profile_picture_url' => $this->user->image,       // Optional
            //isNew                   // Optional
            //created_by_admin          // Optional
            //created_by_current_user    // Required if editing is enabled
            //upvote_count             // Required if upvoting is enabled
            //user_has_upvoted          // Required if upvoting is enabled
        ];
        return json_encode($array, JSON_UNESCAPED_SLASHES);
    }
}
