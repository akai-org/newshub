<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
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
    public function UpdatePassword($attributes, $user_id){
        $psdhash = Hash::make($attributes['newpassword']);
       $oldhash = Hash::make($attributes['oldpassword']);
       if(DB::update('UPDATE users SET password = ? where password = ? AND user_id=?',[$psdhash,$oldhash, $user_id]) == true){
           return true;
       }
        return false;
    }
 


    public function updateData($attributes, $user_id){
        $name = $attributes['name'];
        $surname = $attributes['surname'];
        $email =$attributes['email'];
        $desc = $attributes['desc'];
        if(DB::update('UPDATE `users` SET `firstname`=? , `lastname`=?,`email`=?, `description`=? WHERE `user_id`=?', [$name,$surname,$email,$desc, $user_id]) == true)
        {
            return true;
        }
        return false;
       // return $this->userData()->update($attributes);
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
