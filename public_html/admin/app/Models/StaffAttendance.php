<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class StaffAttendance extends Model
{
	use HasFactory;
	protected $table = "staff_attendances"; //table name
	
		protected $fillable = [
	    'id',
        'user_id',
        'attendance_status_id',
        
        
    ];
}