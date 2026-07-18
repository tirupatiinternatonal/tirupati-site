<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QuotationDetails extends Model
{
	use HasFactory;
    protected $table = "quotation_details"; //table name
	
	protected $fillable = [
          'id',
          'quotation_id',
                 'plan_type',
                'discount_label',
                  'plan_name',
                'amount',
                 'features',
        
    ];
}