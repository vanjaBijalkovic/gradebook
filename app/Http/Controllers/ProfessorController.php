<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Diary;
use App\Image;
use App\User;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        return Professor::with('user.professor','diary','professorHasManyImages')->get();
        
    }
    public function show($id)
    {
        return Professor::with(['user','diary.students','professorHasManyImages'])->find($id);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->save();
        $professor = new Professor();
        $professor->user_id = $user->id;
        
        $professor->save();
        $imagesArray = [];
        
        foreach ($request->url as $imageLink) {
            array_push($imagesArray, new Image(['url' => $imageLink]));
        }
        
        $professor->professorHasManyImages()->saveMany($imagesArray);
        
        
        return response()->json(['success'=> true, 'message'=> 'Images Saved!!']);

    }
}
