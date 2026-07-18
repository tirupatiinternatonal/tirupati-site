<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class OverviewController extends Controller
{

    public function overview(){

        return view('overview');
    }


}