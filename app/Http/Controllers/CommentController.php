<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function destroy($id)
    {
        $comment = Comment::find($id);

       if(!isset($comment)) {
            abort(404, "Comment not found");
        }

       $comment->delete();
    }
}
