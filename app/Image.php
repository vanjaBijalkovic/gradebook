<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;

class Image extends Model
{	
	protected $fillable = [
	
        'url','user_id'
    ];
    public function imageBelongsToProfessor()
    {
    	return $this->belongsTo(Professor::class);
    } 
}
