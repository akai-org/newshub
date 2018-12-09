<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'firstname', 'lastname', 'is_admin', 'is_locked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function posts() {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'user_id', 'user_id');
    }

    public function votes_posts() {
        return $this->hasMany('App\VotePost', 'user_id', 'user_id');
    }

    public function votes_comments() {
        return $this->hasMany('App\VoteComment', 'user_id', 'user_id');
    }

    public function addPost($attributes) {
        return $this->posts()->create($attributes);
    }

    public function jquery_comments() {
        $array = [
            'id' => $this->username,
            'fullname' => $this->username,
            //'email' => $this->email,
            'profile_picture_url' => $this->image,
        ];
        if ($this->firstname && $this->lastname) {
            $array['email'] = $this->firstname . " " . $this->lastname;
        }
        return $array;
    }
}
