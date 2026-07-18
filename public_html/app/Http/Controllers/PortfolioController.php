<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class PortfolioController extends Controller
{

    public function portfolio(){

        return view('portfolio');
    }

}