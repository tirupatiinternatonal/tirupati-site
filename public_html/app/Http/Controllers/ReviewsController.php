<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class ReviewsController extends Controller
{

    public function reviews(){

        return view('Reviews.reviews');
    }

}