<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Inventery extends Model
{
	use HasFactory;
	protected $table = "inventery"; //table name
	
	protected $fillable = [
	   'id',
        'company',
        'item_name',
        'name',
        'quantity_stock',
        'amount',
        'total_amount',
        'available_stock',
        'date',
    ];
	
}