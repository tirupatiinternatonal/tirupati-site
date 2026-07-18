<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Testimonila extends Model
{
	use HasFactory;
    protected $table = "testimonila"; //table name
	protected $fillable = [
	    'id',
        'photo',
        'dr_name',
        'hospital_name',
        'mobile',
        'email',
        'address',
        'city',
        'state',
        'country',
        'remark',
        'ratting',
    ];
}