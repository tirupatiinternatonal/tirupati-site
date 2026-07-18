<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class ViewclientController extends Controller
{

    public function viewclient(){

        return view('viewclient');
    }
    
}