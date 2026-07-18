<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\NewsUpdate;
use File;
use Image;
use Session;
    
class NewsUpdateController extends Controller
{

    public function index(Request $request){
        
        $data = NewsUpdate::all();
        
         return view('admin.newsUpdate.index',compact('data'));
			
    }
    public function create(Request $request){
	    
        return view('admin.newsUpdate.create');
        
    }
    
      public function store(Request $request){
    
    
    
     $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'newsUpdate';
                $image->move($destinationPath, $photo);
             }

    
    $input = $request->only([
        'title','description','date','reference'
    ]);
     $input['photo'] = $photo; 
     

             
           $careerJd = NewsUpdate::create($input);
    
                 return redirect()->route('admin.newsUpdate.index')->with('success',' News & Update Added successfully');
    }
    
      
            public function edit(Request $request, $id) {    
                    	    $data = NewsUpdate::find($id);
                    	  
                return view('admin.newsUpdate.edit',compact('data'));
                            
            }
    
         public function update(Request $request, $id) {
        
        $product = NewsUpdate::find($id);
       
       
        $photo = "";
        if($request->file('photo')){
        
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'newsUpdate';
            $image->move($destinationPath, $photo);
            
        } else {
            $photo = $request->scrimage;
        }
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['date'] = $request->date;
        $input['reference'] = $request->reference;
        $input['photo'] = $photo;
        $product->update($input);
         return redirect()->route('admin.newsUpdate.index')->with('success','News & Update Updated successfully');
        }
    
     public function destroy(Request $request)
                {
                    // Find the record by user_id
                    $product = NewsUpdate::find($request->user_id);
                    $product->delete();
                    return redirect()->route('admin.newsUpdate.index')->withSuccess(__('Deleted successfully.'));
                  
                }
    
    
}