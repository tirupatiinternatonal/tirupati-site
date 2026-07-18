<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HeaderController extends Controller
{

    public function header_one(){

        return view('header.header_one');
    }

    public function header_two(){

        return view('header.header_two');
    }

    public function header_three(){

        return view('header.header_three');
    }

    public function header_four(){

        return view('header.header_four');
    }

}