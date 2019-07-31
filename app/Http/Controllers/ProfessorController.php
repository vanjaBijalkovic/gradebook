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
}
