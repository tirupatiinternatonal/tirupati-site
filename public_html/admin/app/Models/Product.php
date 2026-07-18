<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	use HasFactory;
    protected $table = "product"; //table name
	protected $fillable = [
            	   'id',
                'heading',
                'photo',
                'photo2',
                'url',
                 'description',
    ];
}