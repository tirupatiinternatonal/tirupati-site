<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class ViewquotationController extends Controller
{

    public function viewquotation(){

        return view('viewquotation');
    }


}