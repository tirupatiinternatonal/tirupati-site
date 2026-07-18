<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Testimonila_state extends Model
{
	use HasFactory;
	protected $table = "states"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'state_id',
    ];
	
}