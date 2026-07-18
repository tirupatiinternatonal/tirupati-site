<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Integration;
use Redirect;
class IntegrationController extends Controller
{
     public function integration(){
         
        $integration = Integration::all();
        
        return view('integration.view', compact('integration'));
    }
    public function show(Request $request)
    {
        
        $id = $request->input('id');
        $integration = Integration::find($id);
        
        return view('integration.show', compact('integration'));
    }
}