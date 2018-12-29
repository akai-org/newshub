<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $fillable = ['title', 'description', 'url', 'image', 'is_adult', 'is_visable'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            //Generate unique slug
            $slug = str_slug($post->title);
            if (strlen($slug)>60) {
                $slug = substr(str_slug($post->title),0,60);
                if (substr($slug, -1)=='-') $slug = substr($slug,0,-1);
            }
            while (Post::select('slug')->where('slug', $slug)->get()->first()!=null) {
                if (strlen(str_slug($post->title))>60) {
                    $slug = substr(str_slug($post->title),0,60) . "-" . rand();
                } else {
                    $slug = str_slug($post->title) . "-" . rand();
                }
                $slug = str_replace('--', '-', $slug);
            }
            $post->slug = $slug;

            //Download image to local storage
            $image_url = $post->image;
            if (curl_init($image_url)) {
                $lastword = substr($image_url, strrpos($image_url, '/') + 1);
                $orig = pathinfo($image_url, PATHINFO_EXTENSION);
                $type = substr($orig, 0, strpos($orig, '?'));
                $filename = (!empty($type)) ? uniqid() . '.' . $type : uniqid();
                $path = 'storage/posts/';
                File::isDirectory($path) or File::makeDirectory($path, 0775, true, true);
                //if (Storage::disk('local')->put('public/'.$filename, file_get_contents($image_url))) {
                if ($image = Image::make(file_get_contents($image_url))->fit(300, 250)->save($path.$filename)) {
                    $image_url = $path.$filename;
                }
            }
            $post->image = $image_url;
        });

        // static::destroy(function ($post) {
        //     if (!filter_var($post->image, FILTER_VALIDATE_URL)) {
        //         Storage::delete($post->image);
        //     }
        // });
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
        $comment['user_id'] = Auth::user()->user_id;
        return $this->comments()->create($comment);
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
    
    public function imageUrl() {
        if (!filter_var($this->image, FILTER_VALIDATE_URL)) {
            return asset($this->image);
        }
        return $this->image;
    }
}