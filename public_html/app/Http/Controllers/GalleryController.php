<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Event;
class GalleryController extends Controller
{

    public function gallery(){

      
             
              
       return view('gallery');
        
    }

}