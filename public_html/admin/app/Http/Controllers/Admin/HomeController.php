<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Map;	
use App\Models\Coupon;	
use App\Models\Package;	
use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Audio;
use App\Models\Course;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use Auth;	

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
	
        $this->middleware('auth:admin-web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
       $data = User::find(Auth::user()->id);
	if($data->role_id  == 1){
	    
        return view('admin.dashboard.admin');        
    }elseif($data->role_id   == 2){
          return view('admin.dashboard.admin');
    }else{
         return view('admin.dashboard.other');  
    }
   }
   
    public function countryData(Request $request,$id){
        if(!empty($id)){
            $getState = array();      
         
            $getState = State::where('country_id',$id)->get();
            
            $stateData ='<option value="">Select</option>';
            foreach($getState as $state)
            {
               $stateData.='
               <option value="'.$state->id.'">'.$state->name.'</option>';
            }
           echo $stateData;
        } 
    }
       
    
    public function stateData(Request $request,$id){
        if(!empty($id)){
            $getState = array();      
         
            $getState = City::where('state_id',$id)->get();
            
            $cityData ='<option value="">Select</option>';
            foreach($getState as $city){
                $cityData.='<option value="'.$city->id.'">'.$city->name.'</option>';
            }    
            echo $cityData;
        } 
    }   
   
}
