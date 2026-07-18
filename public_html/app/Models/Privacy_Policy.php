<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Privacy_Policy extends Model
{
        use SoftDeletes;
	protected $table = "privacy_policye"; //table name
	
}