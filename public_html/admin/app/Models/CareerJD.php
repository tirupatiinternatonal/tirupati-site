<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CareerJD extends Model
{
	use HasFactory;
	protected $table = "career_jd"; //table name
	protected $fillable = [
	    'id',
        'post',
        'minimum_requirement',
        'addon_requirement',
        'offers',
        'job_description',
        'photo'
    ];
}