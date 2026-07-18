<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PageImg extends Model
{
	use HasFactory;
    protected $table = "page_img"; //table name
	
	protected $fillable = [
          'id',
          'page_id',
          'bgimg'
    ];
}