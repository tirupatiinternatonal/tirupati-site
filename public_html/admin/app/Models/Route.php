<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Route extends Model
{
	use HasFactory;
	protected $table = "routes"; //table name
	
	protected $fillable = [
	    'id',
        'page_name',
        'route',
        
    ];
	
}