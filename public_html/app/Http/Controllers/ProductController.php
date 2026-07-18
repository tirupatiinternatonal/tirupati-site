<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class ProductController extends Controller
{

    public function product(){

        return view('product');
    }


}