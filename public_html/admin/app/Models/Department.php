<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Department extends Model
{
    use HasFactory;
	use SoftDeletes;	
    use Sortable;
	
    protected $dates = ["deleted_at"];
    public $timestamps = true;

	protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = ['id','name','created_at','updated_at'];
	//public $sortable = ['course_id','title','video','video_desc','video_package','status','is_downloadable'];


}

