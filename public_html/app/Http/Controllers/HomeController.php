<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{

    public function welcome(){

        return view('welcome');
    }


}