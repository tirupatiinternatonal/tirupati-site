<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Quotation extends Model
{
	use HasFactory;
    protected $table = "quotation"; //table name
	protected $fillable = [
            	   'id',
                 'plan_type',
                'discount_label',
                  'plan_name',
                  'popular',
                'amount',
                 'features',
    ];
}