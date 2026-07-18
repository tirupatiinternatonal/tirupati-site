<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class LabController extends Controller
{

    public function lab(){

        return view('lab');
    }


}