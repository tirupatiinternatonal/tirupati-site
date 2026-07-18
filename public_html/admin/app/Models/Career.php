<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Career extends Model
{
	use HasFactory;
	protected $table = "career"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'phone',
        'email',
        'gender',
        'age',
        'education',
        'address',
        'city',
        'pin',
        'image',
     
        
    ];
	
}