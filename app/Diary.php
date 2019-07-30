<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;
use App\User;

class Diary extends Model 
{
    protected $fillable = [
	
        'title','professor_id',
    ];
    public function professor()
    {
    	return $this->belongsTo(Professor::class, 'professor_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
