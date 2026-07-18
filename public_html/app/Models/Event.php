<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
        use SoftDeletes;
	protected $table = "event_image"; //table name
	
}