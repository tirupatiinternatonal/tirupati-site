<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Team extends Model
{
	use HasFactory;
	protected $table = "team"; //table name
	
	protected $fillable = [
	    'id',
        'employee_name',
        'position',
        'mobile',
        'email',
        'facebook_profile',
        'linkedin_profile',
        'twitter_profile',
        'instagram_profile',
        'leadership_id',
        'status',
        'photo',
     
        
    ];
	
}