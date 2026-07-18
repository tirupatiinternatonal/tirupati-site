<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HmsController extends Controller
{

    public function hms(){

        return view('hms');
    }


}