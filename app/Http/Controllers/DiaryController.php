<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        return Diary::with(['professor.user','students'])->get();
        
    }
    public function show($id)
    {
        return Gradebook::with('professor')->find($id);
    }
}
