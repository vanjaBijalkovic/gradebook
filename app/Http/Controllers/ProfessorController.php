<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        return Professor::with('user')->get();
        
    }
}
