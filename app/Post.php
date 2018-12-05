<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'url', 'image', 'is_adult', 'is_visable'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            $slug = str_slug($post->title);
            if (strlen($slug)>60) {
                $slug = substr(str_slug($post->title),0,60);
                if (substr($slug, -1)=='-') $slug = substr($slug,0,-1);
            }
            while (Post::select('slug')->where(['slug' => $slug])->get()->first()!=null) {
                if (strlen(str_slug($post->title))>60) {
                    $slug = substr(str_slug($post->title),0,60) . "-" . rand();
                } else {
                    $slug = str_slug($post->title) . "-" . rand();
                }
                $slug = str_replace('--', '-', $slug);
            }
            $post->slug = $slug;
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'post_id');
    }

    public function votes() {
        return $this->hasMany('App\VotePost', 'post_id', 'post_id');
    }

    public function addComment($comment) {
        return $this->comments()->create([
            'user_id' => Auth::user()->user_id,
            'content' => $comment['content'],
            'is_adult' => $comment['is_adult'],
            'is_visable' => $comment['is_visable'],
        ]);
    }

    public function addVote($type) {
        return $this->votes()->create([
            'user_id' => Auth::user()->user_id,
            'type' => $type,
        ]);
    }

    public function getUrl() {
        //return action("PostController@show", ['slug' => $this->slug]);
        return route('post', ['slug' => $this->slug]);
    }
}