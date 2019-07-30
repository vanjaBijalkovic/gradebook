<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diary;


class Professor extends Model 
{
    protected $fillable = [
        'firstName', 'lastName'
    ];

    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
}
