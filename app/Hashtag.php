<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $table = 'hashtags';
    protected $fillable = ['name', 'image'];

    public function user() {
        return $this->hasOne('App\User');
    }
}
