<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Validator;

use App\Video;
use App\Comment;
use App\User;

class ChannelController extends Controller
{
    public function getChannel($user_id)
    {
        $user = User::find($user_id);
        $videos = Video::where('user_id', $user_id)->paginate(8);

        if (!is_object($user)) {
            return redirect()->route('home');
        }
        
        return view('user.chanel', array(
            'user'      => $user,
            'videos'    => $videos
        )); 
        

    }
}
