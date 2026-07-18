<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Download_center_category extends Model
{
	use HasFactory;
	protected $table = "download_center_category"; //table name
	
	protected $fillable = [
	    'id',
        'category_name',
        'route',
    ];
	
}