<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;



class EnquiryDetail extends Model
{
	use HasFactory;
	use SoftDeletes;	
	use Sortable;	
	protected $dates = ["deleted_at"];
	public $timestamps = true;	 

	protected $table = 'enquiry_details';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
	'enquiry_id','status','message'
    ];
	public $sortable = ['enquiry_id','status','message','created_at'];

    
    
    
}


 
