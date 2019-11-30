<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Diary;
use App\Comment;
use App\Student;
use App\Image;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        return Diary::with(['professor.user', 'students'])->paginate(10);
    }
    public function show($id)
    {
        return Diary::with(['professor.user', 'students', 'comments.user'])->find($id);
    }

    public function myDiary($id)
    {
        \Log::info('tesafdsafdsa fdsafdsa');
        return Diary::with(['professor.user', 'students', 'comments.user'])->where('professor_id', $id)->first();
    }


    public function store(Request $request)
    {
        $this->validate($request, Diary::STORE_RULES);
        $diary = new Diary();
        $diary->title = $request->input('title');
        $diary->professor_id = $request->input('professor_id');
        $diary->save();
        return $diary;
    }

    public function commentStore(Request $request, $id)
    {
        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->user_id = Auth::user()->id;;
        $comment->diary_id = $id;
        $comment->save();
        return $comment;
    }
    public function commentDestroy($id)
    {
        $comment = Comment::find($id);

        if (!isset($comment)) {
            abort(404, "Comment not found");
        }

        $comment->delete();
    }
    public function studentStore(Request $request, $id)
    {
        $student = new Student();
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->diary_id = $id;

        $student->save();
        $imagesArray = [];

        foreach ($request->url as $imageLink) {
            array_push($imagesArray, new Image(['url' => $imageLink], ['student_id' => $student->id]));
        }

        $student->studentHasManyImages()->saveMany($imagesArray);

        return response()->json(['success' => true, 'message' => 'Gallery Saved!!']);
    }

    public function update(Request $request, $id)
    {
        $diary = Diary::find($id);
        $diary->title = $request->input('title');
        $diary->professor_id = $request->input('professor_id');

        $diary->save();
        return $diary;
    }
    public function destroy($id)
    {
        $diary = Diary::find($id);
        $diary->delete();
        return $diary;
    }
}
