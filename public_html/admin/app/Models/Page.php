<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Page extends Model
{
	use HasFactory;
    protected $table = "page"; //table name
	protected $fillable = [
            	   'id',
                 'page',
                 'title',
                 'subtitle',
    ];
}