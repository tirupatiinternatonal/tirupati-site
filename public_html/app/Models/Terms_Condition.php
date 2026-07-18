<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Terms_Condition extends Model
{
        use SoftDeletes;
	protected $table = "term_condition"; //table name
	
}