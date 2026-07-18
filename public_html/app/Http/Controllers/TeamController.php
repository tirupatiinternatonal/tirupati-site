<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class TeamController extends Controller
{

    public function team(){

        return view('team');
    }


}