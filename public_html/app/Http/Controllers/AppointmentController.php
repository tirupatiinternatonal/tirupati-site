<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class AppointmentController extends Controller
{

    public function appointment(){

        return view('appointment');
   return redirect()->route('appointment')->withSuccess('Done');     
    }

public function patient_appointment(){
           return redirect()->route('appointment')->withSuccess('Done');     

    }
}