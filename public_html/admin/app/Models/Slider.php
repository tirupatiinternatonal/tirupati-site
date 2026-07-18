<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Slider extends Model
{
	use HasFactory;
	protected $table = "sliders"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'status',
        'photo',
        
    ];
	
}