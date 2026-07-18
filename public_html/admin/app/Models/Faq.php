<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
	use HasFactory;
    protected $table = "faqs"; //table name
	
	protected $fillable = [
	    'id',
        //'question',
        // 'answer',
        'page_name',
        'title',
        'photo',
        'descreption',
        'url',
        'descreptionimage',
        'modul_descreption',
    ];
}