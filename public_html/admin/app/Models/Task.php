<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;



class Task extends Model
{
	use HasFactory;
	use SoftDeletes;	
	use Sortable;	
	protected $dates = ["deleted_at"];
	public $timestamps = true;	 

	protected $table = 'tasks';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
	'title','task_details','roles_id','status','task_date','task_end_date','attach_docs'
    ];
	public $sortable = ['title','roles_id','task_details','status','task_date','task_end_date','created_at'];
}
