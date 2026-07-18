<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class PharamcyController extends Controller
{

    public function pharmacy(){

        return view('pharmacy');
    }


}