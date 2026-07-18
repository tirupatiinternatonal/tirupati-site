<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\News;
use App\Models\SoftwareUpdate;
use Redirect;
class NewsController  extends Controller
{
     public function news(){

        $news = News::all();
    
        return view('news.view', compact('news'));
     }
    public function show(Request $request)
    {
        
        $id = $request->input('id');
        
        $news = News::find($id);
        
        return view('news.show', compact('news'));
    }
}