<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class CertificateController extends Controller
{

    public function certificate(){

        return view('certificate');
    }


}