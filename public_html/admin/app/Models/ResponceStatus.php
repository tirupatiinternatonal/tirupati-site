<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Kyslik\ColumnSortable\Sortable;



class ResponceStatus extends Model

{

    use HasFactory;

	use SoftDeletes;	

	 use Sortable;

	

	 protected $dates = ["deleted_at"];

	 public $timestamps = true;

	 

	protected $table = 'responce_status';

    /**

     * The attributes that are mass assignable.

     *	

     * @var array

     */

    protected $fillable = [
	'name','id','color','status'
    ];
	public $sortable = ['name','id','color','status'];
}
   



