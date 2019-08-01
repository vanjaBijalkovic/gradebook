<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diary;
use App\Image;

class Student extends Model
{
    protected $fillable = [
        'firstName','lastName', 'diary_id'
    ];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }
    public function studentHasManyImages()
    {
        return $this->hasMany(Image::class);
    }
}
