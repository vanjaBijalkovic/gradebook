<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;
use App\Student;

class Image extends Model
{	
	protected $fillable = [
	
        'url','user_id'
    ];
    public function imageBelongsToProfessor()
    {
    	return $this->belongsTo(Professor::class);
    }
    public function imageBelongsToStudent()
    {
    	return $this->belongsTo(Student::class);
    }  
}
