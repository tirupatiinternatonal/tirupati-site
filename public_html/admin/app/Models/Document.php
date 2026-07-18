<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Document extends Model
{
	use HasFactory;
	protected $table = "document"; //table name
	
	protected $fillable = ['id','label_name','photo','status',];
	
}