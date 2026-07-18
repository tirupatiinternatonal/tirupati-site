<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class CultureController extends Controller
{

    public function culture(){

        return view('culture');
    }


}