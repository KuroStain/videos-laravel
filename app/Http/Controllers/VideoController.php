<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use Validator;

use App\Video;
use App\Comment;

class VideoController extends Controller
{

#
    public function createVideo()
    {
    	return view('video.createVideo');
    }

# Validar formulario
    public function saveVideo(Request $request)
    {
    	
    	Validator::make($request->all(),[
    		'title'			=>'required|string|max:255|min:1',
    		'description'	=>'required|max:2048|min:1',
    		'image' 		=> 'mimes:jpeg,bmp,png',
    		'video'			=> 'mimes:mp4,avi'])->validate();

    	$video = new Video();
    	$user = \Auth::user();

    	$video->user_id = $user->id;
    	$video->title = $request->input('title');
    	$video->description = $request->input('description');

    	// Subida de imagen
    	$image = $request->input('image');
    	if($image){
    		$image_path = time().$image->getClientOrinalName();
    		\Storage::disk('image')->put($image_path, \File::get($image));

    		$video->image = $image_path;
    	}

    	// Subida de video
    	$video_file = $request->input('video');
    	if($video_file){
    		$video_path = time().$video_file->getClientOrinalName();
    		\Storage::disk('videos')->put($video_path, \File::get($video_file));

    		$video->video_path = $video_path;
    	}

    	$video->save();

    	return redirect()->route('home')->with(array(

    		'message' => 'El video se guardo correctamente'

		));

    }
	
}
