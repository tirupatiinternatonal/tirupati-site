<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Expense extends Model
{
	use HasFactory;
	protected $table = "expenses"; //table name
	
	protected $fillable = [
	    'id',
        'expense_name',
        'quantity',
        'rate',
        'date',
        'amount',
        'attachment',
        'description',
        'total_amt',
        'status',
        'user_id',
      
    ];
	
}