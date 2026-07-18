<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class RefundController extends Controller
{

    public function refund(){

        return view('refund');
    }
    
    public function shipping(){

        return view('shipping');
    }


}