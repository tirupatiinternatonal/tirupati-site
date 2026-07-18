<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Testimonila_city extends Model
{
	use HasFactory;
	protected $table = "city"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'city_id',
    ];
	
}