<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class WebsiteHistory extends Model
{
    use HasFactory;
	use SoftDeletes;	
    use Sortable;

	protected $dates = ["deleted_at"];
    public $timestamps = true;
	protected $table = 'website_amc_history';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = ['id','amount', 'user_name', 'pass_word','amc_id', 'website_type', 'plan_details', 'name', 'mobile', 'website_link','website_name','registration_date','amc_amount','emc_date', 'email','created_at', 'updated_at', 'deleted_at'];

    public static function countWebsiteAmc(){
        $data  = WebsiteAmc::count();
        return $data;
    }

}

