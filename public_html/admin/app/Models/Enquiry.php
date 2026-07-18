<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Enquiry extends Model
{
    use HasFactory;
	use SoftDeletes;	
    use Sortable;

	protected $dates = ["deleted_at"];
    public $timestamps = true;

	protected $table = 'enquirys';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = ['id','user_id','deepartment_id','enquiry_date','name','mobile','mobile_2','email','responce_status_id','address','status','created_at','updated_at','deleted_at'];
	
    public static function countEnquiry(){
        $data = Enquiry::count();
        return $data;
    }
    
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public static function ProposalSend(){
        $data  = Enquiry::where('responce_status_id',9)->where('enquiry_date',date('Y-m-d'))->count();
        return $data;
    }
    
    public static function PendingProposal(){
        $data  = Enquiry::where('responce_status_id',2)->where('enquiry_date',date('Y-m-d'))->count();
        return $data;
    }
    
    public static function CallAfter(){
        $data  = Enquiry::where('responce_status_id',12)->where('enquiry_date',date('Y-m-d'))->count();
        return $data;
    }
    
}

