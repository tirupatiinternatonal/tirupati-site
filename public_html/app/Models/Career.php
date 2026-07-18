<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Career extends Model
{
       use SoftDeletes;
	protected $table = "career"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'phone',
        'email',
        'gender',
        'age',
        'apply_for',
        'education',
        'address',
        'city',
        'pin',
        'photo',

	    ];
	
}