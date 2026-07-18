<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Download_center extends Model
{
	use HasFactory;
    protected $table = "download_center"; //table name
	protected $fillable = [
	    'id',
        'category',
        'title',
        'file_type',
        'photo',
       
    ];
}