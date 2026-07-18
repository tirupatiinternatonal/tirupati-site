<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Testimonila;
use App\Models\Testimonila_state;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class TestimonilaController extends Controller
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
        
        $data = Testimonila::select('testimonila.*','citys.name as city_name','states.name as states_name','countries.name as countries_name')
                               ->leftjoin('citys','citys.id','testimonila.city')
                               ->leftjoin('states','states.id','testimonila.state')
                               ->leftjoin('countries','countries.id','testimonila.country')
                               ->orderBy('id', 'DESC')->get();
        
        //  $data = Testimonila::orderBy('id', 'DESC')->get();
          //dd($data);   
		 return view('admin.testimonila.index',compact('data'));
    }
    
    
    public function create(Request $request)
    {
        $routes = Testimonila_state::orderBy('id')->get();
		 return view('admin.testimonila.create',compact('routes'));
    }
    
    
    public function store(Request $request)
    {
        //  dd($request);
        $this->validate($request, [
          
            'dr_name' => 'required',
            'hospital_name' => 'required',
            'remark' => 'required',
           
           
        ]);
        
         $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'testimonila';
                $image->move($destinationPath, $photo);
             }

    
        $input = $request->all();
     
      
        $input['photo'] = $photo; 
      
        // $input['dr_name'] = $request->dr_name;
        // $input['hospital_name'] = $request->hospital_name;
        //$input['state'] = $request->state;
        
        $testimonila = Testimonila::create($input);
   
        return redirect()->route('admin.testimonila.index')
                        ->with('success',' Created Successfully');
    }
    
   
  
    
    public function edit(Request $request, $id){    
        
	    $data = Testimonila::find($id);
	    $routes = Testimonila_state::orderBy('id')->get();
        return view('admin.testimonila.edit',compact('data','routes'));
        
    }
    
    public function update(Request $request, $id)
    {
                        // dd($request);
                        // $this->validate($request, [
                        //     'category' => 'required',
                        //     'title' => 'required',
                        // ]);
                       
                        $testimonila = Testimonila::find($id);
                        $input = $request->all();
                        if($request->file('photo')){
                            if ($testimonila->photo) {
                        $imagePath = env('IMAGE_UPLOAD_PATH').'testimonila/' . $testimonila->photo;
                        if (file_exists($imagePath) && !is_dir($imagePath)) {
                            unlink($imagePath);
                        } else {
                            \Log::error('File not found or is a directory: ' . $imagePath);
                        }
                  } 
                $image = $request->file('photo');
                
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'testimonila/';
                
                $image->move($destinationPath, $photo);
                
                $input['photo'] = $photo;
              }
              
       
             
        $testimonila->update($input);
        
        
         return redirect()->route('admin.testimonila.index')
                        ->with('success',' updated successfully');
    }
    

    
    
public function destroy(Request $request)
{
    // Find the record by user_id
    $testimonila = Testimonila::find($request->user_id);

    if ($testimonila->photo) {
        $imagePath = env('IMAGE_UPLOAD_PATH').'testimonila/' . $testimonila->photo;
        if (file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        } else {
            \Log::error('File not found or is a directory: ' . $imagePath);
        }
  } 
        $testimonila->delete();
        
        // Redirect with success message
        return redirect()->route('admin.testimonila.index')
            ->withSuccess(__('Deleted successfully.'));
  
}


  
    
    public function show($id)
{
    return redirect()->route('admin.testimonila.index');
}

}