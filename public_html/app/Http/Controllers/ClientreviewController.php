<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class ClientreviewController extends Controller
{

    public function clientreview(){

        return view('clientreview');
    }


}