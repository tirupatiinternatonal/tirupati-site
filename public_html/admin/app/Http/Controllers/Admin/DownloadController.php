<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Download_center;
use App\Models\Download_center_category;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function index(Request $request)
    {
         $data = Download_center::orderBy('id', 'DESC')->get();
          //dd($data);   
		 return view('admin.download_center.index',compact('data'));
    }
    
    
    public function create(Request $request)
    {
        $routes = Download_center_category::orderBy('id')->get();
		 return view('admin.download_center.create',compact('routes'));
    }
    
    
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
          
            'category' => 'required',
            
            'title' => 'required',
            
                            'file_type' => 'required|in:png,jpeg,gif,svg,doc,html,xls,txt,ppt,pdf',
        ]);
         $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'download_center';
                $image->move($destinationPath, $photo);
             }

    
        $input = $request->all();
     
      
        $input['photo'] = $photo; 
      
        $input['category'] = $request->category;
        $download_center = Download_center::create($input);
   
        return redirect()->route('admin.download_center.index')
                        ->with('success',' created successfully');
    }
    
   
  
    
    public function edit(Request $request, $id){    
        
	    $data = Download_center::find($id);
	    $routes = Download_center_category::orderBy('id')->get();
        return view('admin.download_center.edit',compact('data','routes'));
        
    }
    
    public function update(Request $request, $id)
    {
                        // dd($request);
                        $this->validate($request, [
                            'category' => 'required',
                            'title' => 'required',
                        ]);
                       
                        $download_center = Download_center::find($id);
                        $input = $request->all();
                        $status = isset($request->status) ? 1 : 0;
                        $input['status'] = $status; 
                        
                        if($request->file('photo')){
                            if ($download_center->photo) {
                        $imagePath = env('IMAGE_UPLOAD_PATH').'download_center/' . $download_center->photo;
                        if (file_exists($imagePath) && !is_dir($imagePath)) {
                            unlink($imagePath);
                        } else {
                            \Log::error('File not found or is a directory: ' . $imagePath);
                        }
                  } 
                $image = $request->file('photo');
                
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'download_center/';
                
                $image->move($destinationPath, $photo);
                
                $input['photo'] = $photo;
              }
              
       
             
        $download_center->update($input);
        
        
         return redirect()->route('admin.download_center.index')
                        ->with('success',' updated successfully');
    }
    
//      public function destroy(Request $request)
// {
//   $delete = Download_center::where('id', $request->user_id)->delete();
//     return redirect()->route('admin.download_center.index')
//          ->withSuccess(__('deleted successfully.'));
// }
    
    
public function destroy(Request $request)
{
    // Find the record by user_id
    $downloadCenter = Download_center::find($request->user_id);

    if ($downloadCenter->photo) {
        $imagePath = env('IMAGE_UPLOAD_PATH').'download_center/' . $downloadCenter->photo;
        if (file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        } else {
            \Log::error('File not found or is a directory: ' . $imagePath);
        }
  } 
        $downloadCenter->delete();
        
        // Redirect with success message
        return redirect()->route('admin.download_center.index')
            ->withSuccess(__('Deleted successfully.'));
  
}


  
    
    public function show($id)
{
    return redirect()->route('admin.download_center.index');
}

}