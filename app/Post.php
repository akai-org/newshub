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
            while (Post::select('slug')->where(['slug' => $slug])->get()->first()!=null) {
                $slug = str_slug($post->title) . "-" . rand();
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

    public function getUrl() {
        return action("HomeController@post", ['slug' => $this->slug]);
    }
}