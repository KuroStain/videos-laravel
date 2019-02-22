<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        /*$validated = $this->validated($request, [
            'body' => 'required'
        ]);*/

        Validator::make($request->all(),[
            'body' => 'required|max:255|min:1'])->validate();

        $comment = new Comment();
        $user = \Auth::user();

        $comment->user_id = $user->id;
        $comment->video_id = $request->input('video_id');
        $comment->body = $request->input('body');

        $comment->save();

        return redirect()->route('videoDetail', ['video_id' => $comment->video_id])->with(array(
            'message' => 'Comentario añadido'
        ));
    }

    public function delete($comment_id)
    {
        $user = \Auth::user();
        $comment = Comment::find($comment_id);

        if ($user && ($comment->user_id == $user->id || $comment->video->user_id == $user->id)) {
            $comment->delete();
        }

        return redirect()->route('videoDetail', ['video_id' => $comment->video_id])->with(array(
            'message' => 'Comentario eliminado'
        ));
    }
}
