<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    // Relacion Uno a muchos
    public function comments()
    {
    	return $this->hasMany('App\Comment.php');
    }

    // Relacion Muchos a Uno
    public function user()
    {
    	return $this->belongTo('App\User.php', 'user_id');
    }
}
