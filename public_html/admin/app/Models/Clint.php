<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Clint extends Model
{
	use HasFactory;
	protected $table = "clints"; //table name
	
	protected $fillable = [
	    'id',
	    'name',
	   'photo',
        'status',
        
        
    ];
	
}