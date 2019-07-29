<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;

class DiariesController extends Controller
{
    public function index(Request $request)
    {
        return Diary::with('professor');
        
    }
}
