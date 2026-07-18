<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class Privacy_policyController extends Controller
{

    public function privacy_policy(){

        return view('privacy_policy');
    }


}