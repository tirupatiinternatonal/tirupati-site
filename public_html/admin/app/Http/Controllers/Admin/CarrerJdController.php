<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\CareerJD;
use File;
use Image;
use Session;
    
class CarrerJdController extends Controller
{

    public function index(Request $request){
        
        $data = CareerJD::all();
        
         return view('admin.career_jd.index',compact('data'));
			
    }
    public function create(Request $request){
	    
        return view('admin.career_jd.create');
        
    }
    
      public function store(Request $request){
    
    
    
     $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'careerJD';
                $image->move($destinationPath, $photo);
             }

    
    $input = $request->only([
        'post', 'minimum_requirement','addon_requirement','offers','job_description'
    ]);
     $input['photo'] = $photo; 
     

             
           $careerJd = CareerJD::create($input);
    
                 return redirect()->route('admin.career_jd.index')->with('success',' Career JD successfully');
    }
     public function edit(Request $request, $id) {    
                    	    $data = CareerJD::find($id);
                    	  
             return view('admin.career_jd.edit',compact('data'));
                            
             }
              public function update(Request $request, $id) {
        
        $product = CareerJD::find($id);
       
       
        $photo = "";
        if($request->file('photo')){
        
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'careerJD';
            $image->move($destinationPath, $photo);
            
        } else {
            $photo = $request->scrimage;
        }
        $input['post'] = $request->post;
        $input['minimum_requirement'] = $request->minimum_requirement;
        $input['addon_requirement'] = $request->addon_requirement;
        $input['offers'] = $request->offers;
        $input['job_description'] = $request->job_description;
        $input['photo'] = $photo;
        // $input['amount'] = $request->amount;
    //   dd($request);
        $product->update($input);
         return redirect()->route('admin.career_jd.index')->with('success','Career JD Updated successfully');
        }
        
        public function destroy(Request $request)
                {
                    // Find the record by user_id
                    $product = CareerJD::find($request->user_id);
                 $product->delete();
                        return redirect()->route('admin.career_jd.index')->withSuccess(__('Deleted successfully.'));
                  
                }
}