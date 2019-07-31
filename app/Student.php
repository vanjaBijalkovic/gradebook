<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diary;

class Student extends Model
{
    protected $fillable = [
        'firstName','lastName', 'diary_id'
    ];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }
}
