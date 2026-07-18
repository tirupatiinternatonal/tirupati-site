<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\Integration;
use File;
use Image;
use Session;
    
class IntegrationController extends Controller
{

    public function index(Request $request){
        
        $data = Integration::all();
        
         return view('admin.integration.index',compact('data'));
			
    }
    public function create(Request $request){
	    
        return view('admin.integration.create');
        
    }
    
      public function store(Request $request){
    
    
    
     $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'integration';
                $image->move($destinationPath, $photo);
             }

    
    $input = $request->only([
        'title','description'
    ]);
     $input['photo'] = $photo; 
     

             
           $careerJd = Integration::create($input);
    
                 return redirect()->route('admin.integration.index')->with('success',' Integration successfully');
    }
    
    public function edit(Request $request, $id) {    
                    	    $data = Integration::find($id);
                    	  
             return view('admin.integration.edit',compact('data'));
                            
             }
             
              public function update(Request $request, $id) {
        
        $product = Integration::find($id);
       
       
        $photo = "";
        if($request->file('photo')){
        
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'integration';
            $image->move($destinationPath, $photo);
            
        } else {
            $photo = $request->scrimage;
        }
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['photo'] = $photo;
        $product->update($input);
         return redirect()->route('admin.integration.index')->with('success','Integration Updated successfully');
        }
    
     public function destroy(Request $request)
                {
                    // Find the record by user_id
                    $product = Integration::find($request->user_id);
                    $product->delete();
                    return redirect()->route('admin.integration.index')->withSuccess(__('Deleted successfully.'));
                  
                }
    
}