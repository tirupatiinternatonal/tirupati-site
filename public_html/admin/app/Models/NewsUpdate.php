<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NewsUpdate extends Model
{
	use HasFactory;
	protected $table = "news_update"; //table name
	protected $fillable = [
	    'id',
        'title',
        'description',
        'photo',
        'date',
        'reference'
    ];
}