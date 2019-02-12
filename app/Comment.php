<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';

    // Relacion Muchos a Uno
    public function user()
    {
    	return $this->belongTo('App\User.php', 'user_id');
    }
}
