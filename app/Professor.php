<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diary;

class Professor extends Model 
{
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
}
