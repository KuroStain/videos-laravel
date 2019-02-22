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
use App\User;

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
    	$image = $request->file('image');
    	if($image){
    		$image_path = time().$image->getClientOriginalName();
    		\Storage::disk('image')->put($image_path, \File::get($image));

    		$video->image = $image_path;
    	}

    	// Subida de video
    	$video_file = $request->file('video');
    	if($video_file){
    		$video_path = time().$video_file->getClientOriginalName();
    		\Storage::disk('videos')->put($video_path, \File::get($video_file));

    		$video->video_path = $video_path;
    	}

    	$video->save();

    	return redirect()->route('home')->with(array(

    		'message' => 'El video se guardo correctamente'

		));

	}
	
	public function getImage($filename)
	{
		$file = Storage::disk('image')->get($filename);
		return new Response($file, 200);
	}

	public function getVideoDetail($video_id)
	{
		$video = Video::find($video_id);
		return view('video.detail', array(
			'video' => $video
		));
	}

	public function getVideo($filename)
	{
		$file = Storage::disk('videos')->get($filename);
		return new Response($file, 200);
	}

	// Funcion para eliminar un video
	public function delete($video_id)
	{
		$user = \Auth::user();
		$video = Video::find($video_id);

		$comment = Comment::where('video_id', $video_id)->get();

		if($user && $video->user_id == $user->id){

			// Eliminar comentarios
			if($comments && count($comments) >= 1){
				foreach ($comments as $comment) {
					$comments->delete();
				}
			}
			// Eliminar miniatura
			Storage::disk('image')->delete($video->image);
			Storage::disk('videos')->delete($video->video_path);
			// Eliminar Video
			$video->delete();

			$message = array('message' => 'Video eliminado correctamente');
		}else {
			$message = array('message' => 'Video no fue eliminado');
		}

		return redirect()->route('home')->with(array('$message'));
	}
	
}
