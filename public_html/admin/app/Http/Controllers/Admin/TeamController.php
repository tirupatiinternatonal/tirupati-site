<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
use App\Http\Requests\StoreCoupon;
use Image;
class TeamController extends Controller

{
    public function index()
    {
         $data = Team::all();
       
         return view('admin.team.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.team.create');
    }
    
     public function show(Request $request,$id){
        
        $data = Team::find($id);
        
        return view('admin.team.show',compact('data'));
    }    
    
    
/*     public function store(Request $request){
   
        $this->validate($request, [
            'Team_name' => 'required',
           'status' => 'required',
           'photo' => 'required',
            
            ]);
       
	$photo = '';
           if($request->file('photo')){
                 $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'Team';
                $image->move($destinationPath, $photo);     
                
             }	
	
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $input['Team_name'] = ($request->Team_name) ;
        $input['photo'] = $photo;  
        $enquiey = Team::create($input);  
          
      
        return redirect()->route('admin.Team_gallery.index')->with('success','gallery created successfully');

    }*/
    
    
    
     public function store(Request $request){
   
      
       
    $photo = "";
        if($request->file('photo')){
          
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'Team';
                $image->move($destinationPath, $photo);
             }
	
        $input = $request->all();
        $status = 1;
        $input['status'] = $status;
        $input['photo'] = $photo;  
        $enquiey = Team::create($input);  
          //dd($input);
      
        return redirect()->route('admin.team.index')->with('success','gallery created successfully');

    }
    
public function destroy(Request $request)
    {
    
        Team::find($request->user_id)->delete();
        return redirect()->route('admin.team.index')
                        ->with('success','Team deleted successfully');
    }
    
    
    	public function edit(Request $request,$id){
          $data = Team::find($id);
        return view('admin.team.edit',compact('data'));
			
    }
    
        
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
           
        ]);
        $user = Team::find($id);
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = 1;
        
        $photo = $user->photo;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo = time() . uniqid() . $image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH') . 'Team';
            $image->move($destinationPath, $photo);
        }
        
        $user->update($input);
        if ($photo !== $user->photo) {
            $user->update(['photo' => $photo]);
        }
      
       
       return redirect('admin/team')->with('success',' updated successfully');
    }

    
    // public function change_status(Request $request){
    //     if($request->status_name == 'Active'){
    //         $FetchData = Team::find($request->Team_id);
    //         $FetchData->update(['status'=>0]);
    //         return redirect('admin/team')->with('success','Team Active successfully');
    //     }else{
    //          $FetchData = Team::find($request->Team_id);
    //         $FetchData->update(['status'=>1]);
    //         return redirect('admin/team')->with('success','Team Inactive successfully');
    //     }
        
    // }
    
     public function teamStatus(Request $request){
        $data = Team::where('id',$request->id)->update(['status'=> $request->status_id]);
        return redirect('admin/team')->with('message', 'Status Changed Successfully.');
    }
}

