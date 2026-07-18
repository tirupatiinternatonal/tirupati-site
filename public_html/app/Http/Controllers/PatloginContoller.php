<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class PatloginContoller extends Controller
{

    public function patlogin(){

        return view('patlogin');
    }


}