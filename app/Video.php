<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    // Relacion Uno a muchos
    public function comments()
    {
    	return $this->hasMany('App\Comment')->orderby('id', 'desc');
    }

    // Relacion Muchos a Uno
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
