<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class WebMeta extends Model
{
	use HasFactory;
	protected $table = "web_meta"; //table name
	
	protected $fillable = [
	    'id',
        'page_name',
        'status',
        'photo',
        'tittle',
        'meta_kyewords',
        'meta_description',
    ];
	
}