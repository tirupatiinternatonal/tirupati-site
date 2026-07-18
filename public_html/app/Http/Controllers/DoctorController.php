<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class DoctorController extends Controller
{

    public function doctor(){

        return view('doctor');
    }


}