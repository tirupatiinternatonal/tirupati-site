<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class BloodbankController extends Controller
{

    public function bloodbank(){

        return view('bloodbank');
    }


}