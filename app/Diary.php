<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;

class Diary extends Model 
{
    protected $fillable = [
	
        'title','professor_id'
    ];
    public function professor()
    {
    	return $this->belongsTo(Professor::class, 'professor_id');
    }
}
