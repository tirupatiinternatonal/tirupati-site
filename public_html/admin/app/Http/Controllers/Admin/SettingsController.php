<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Setting;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		 
         $setting = Setting::first();		 
		 return view('admin.settings.edit',compact('setting'));
    }
    
    
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
	$this->validate($request, [
            'name' => 'required',
        ]);
        $user = Setting::find($id);
        $input = $request->all();
        $photo = "";
         if($request->file('logo')){
            
                $image = $request->file('logo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'Logo';
                $image->move($destinationPath, $photo);
             }
    
        $footer = "";
         if($request->file('footer_logo')){
            
                $image = $request->file('footer_logo');
                $path = $image->getRealPath();      
                $footer =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAlogoGE_UPLOAD_PATH').'Footer_Logo';
                $image->move($destinationPath, $footer);
             }
    
   
        
        
        $user->update($input);
        $user->update(['logo' => $photo]);
        $user->update(['footer_logo' => $footer]);
      
	
		
        return redirect()->route('admin.settings.index')->with('success','Setting updated successfully');
    }
    
   
}