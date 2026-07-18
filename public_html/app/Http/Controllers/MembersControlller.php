<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Student;
use Redirect;
use Helper;

class MembersController extends Controller
{

    public function show(){
        $data=Student::pagination(10);
        return view('viewclient',['students'=>$data]);   
    }
}