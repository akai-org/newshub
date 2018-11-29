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
        'username', 'email', 'password', 'firstname', 'lastname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
        return $this->posts()->create(compact("attributes"));
    }
}
