<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diary;
use App\User;


class Professor extends Model 
{
    protected $fillable = [
        'url', 'user_id'
    ];

    public function diary()
    {
        return $this->hasMany(Diary::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
