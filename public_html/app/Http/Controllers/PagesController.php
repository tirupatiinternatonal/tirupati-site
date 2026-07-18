<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Newsletter;
use Redirect;
class PagesController extends Controller
{

    public function about(){

        return view('pages.about');
    }
   
    
     public function email_form(Request $request){
    
         if($request->isMethod('post')){
    
    
    $contact= new Newsletter;//modal name
    $contact->email =$request->email;
    $contact->save();


    return redirect::to('/')->with('success','form submit successfully.');

         }
        return view('layout.footer');
    }

}