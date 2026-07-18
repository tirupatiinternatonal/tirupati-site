<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class student extends Model
{
	use HasFactory;
	protected $table = "students"; //table name
	
	protected $fillable = [
	    'id',
        'name',
        'f_mobile',
        'email',
        'gender',
        'age',
        'education',
        'address',
        'city',
        'state',
        'country',
        'date',
        'pin',
        'photo',
        'status',
        
    ];
	
}