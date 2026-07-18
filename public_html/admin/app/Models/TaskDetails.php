<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class TaskDetails extends Model
{
    use HasFactory;
	use SoftDeletes;	
    use Sortable;
	
    protected $dates = ["deleted_at"];
    public $timestamps = true;

	protected $table = 'task_details';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

   protected $fillable = ['id','user_id','add_task','task_id','task_name','status','to_assign_name','task_attachment','to_assign_id','assign_by_id','created_at','updated_at'];

    function AssignBy(){
       return $this->belongsTo('App\Models\User','assign_by_id');
    }
    
    function AssignTo(){
       return $this->belongsTo('App\Models\User','to_assign_id');
    }
	
}

