<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Diary;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        return Professor::with('user.professor','diary')->get();
        
    }
    public function store(Request $request)
    {
    //    $fetchedProfessorObject = $request->only('url');
    //    $rulesForGallery = [
    //         'url' => 'required',
    //         'url.*' => ['required', 'url', ]
    //     ]; 
        
        $professor = new Professor();
        $professor->user_id = 3;
        
        $professor->save();
        $imagesArray = [];
        
        foreach ($request->url as $imageLink) {
            array_push($imagesArray, new Image(['url' => "$imageLink"]));
        }
        
        $professor->professorHasManyImages()->saveMany($imagesArray);
        
        
        return response()->json(['success'=> true, 'message'=> 'Images Saved!!']);

    }
}
