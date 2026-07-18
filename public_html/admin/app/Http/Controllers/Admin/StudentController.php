<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\student;
use File;
use Image;
use Session;
    
class StudentController extends Controller
{

    public function index(Request $request){
        
        $data = student::all();

         return view('admin.student.index',compact('data'));
			
    }
    
   
    public function store(Request $request)
    {
        
        $this->validate($request, [
          /* 'name' => 'required',
           'photo' => 'required',
           'dob' => 'required',
           'email' => 'required',
           'mobile' => 'required',
           'aadhar' => 'required',*/
        ]);
    
    $photo = "";
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'student';
                $image->move($destinationPath, $photo);
             }
             
             
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $input['photo'] = $photo;
 
        $slider = student::create($input);
       
        return redirect()->route('admin.student.index')
                        ->with('success','Student created successfully');
    }
    
	public function create(Request $request){
	    
        return view('admin.student.create');
        
    }
    
	public function edit(Request $request,$id){
          $data = student::find($id);
        return view('admin.student.edit',compact('data'));
			
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           
        ]);
        $user = student::find($id);
        $input = $request->all();
         $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $photo = "";
         if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'student';
                $image->move($destinationPath, $photo);
               
             }
    
        $user->update($input);
        $user->update(['photo' => $photo]);
      
       
        return redirect()->route('admin.student.index')
                        ->with('success','student updated successfully');
    }
    
     
   public function change_status(Request $request){
       
         $FetchData = student::find($request->student_id);
        if($request->status_name == 'Active'){
            $FetchData->update(['status'=>0]);
            return redirect('admin/student')->with('success','student Active successfully');
        }else{
          
            $FetchData->update(['status'=>1]);
            return redirect('admin/student')->with('success','student Inactive successfully');
        }
       
       
    }

    public function destroy(Request $request)
    {
    
        student::find($request->user_id)->delete();
        return redirect()->route('admin.student.index')
                        ->with('success','student deleted successfully');
    }
    
    
    
    public function show(Request $request,$id){
        
        $data = student::find($id);
        
        return view('admin.student.show',compact('data'));
    }    
   
}