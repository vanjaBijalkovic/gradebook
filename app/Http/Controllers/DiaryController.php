<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
use App\Comment;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        return Diary::with(['professor.user','students'])->get();
        
    }
    public function show($id)
    {
        return Diary::with(['professor.user','students','comments.user'])->find($id);
    }
    
    public function commentStore(Request $request, $id)
    {
        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->user_id = $request->input('user_id');
        $comment->diary_id = $id;
        $comment->save();
        return $comment;
    }
    public function commentDestroy($id)
    {
        $comment = Comment::find($id);

       if(!isset($comment)) {
            abort(404, "Comment not found");
        }

       $comment->delete();
    }

}
