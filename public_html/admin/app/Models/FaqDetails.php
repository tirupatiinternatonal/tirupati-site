<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FaqDetails extends Model
{
	use HasFactory;
    protected $table = "faq_details"; //table name
	
	protected $fillable = [
	    'id',
        'faq_id',
        // 'answer',
        'page_name',
        'title',
        'photo',
        'descreption',
        'url',
        'descriptionimage',
    ];
}