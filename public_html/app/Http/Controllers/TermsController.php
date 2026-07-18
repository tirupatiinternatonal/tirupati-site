<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class TermsController extends Controller
{

    public function terms(){

        return view('terms');
    }


}