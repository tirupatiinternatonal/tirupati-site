<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class UltimatehmsController extends Controller
{

    public function ultimatehms(){

        return view('ultimatehms');
    }


}