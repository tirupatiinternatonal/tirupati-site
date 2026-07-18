<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
use App\Http\Requests\StoreCoupon;
use Image;
class EventGalleryController extends Controller

{
    public function index()
    {
         $data = Event::all();
       
         return view('admin.img_gallary.index',compact('data'));
    }
    
    public function create()
    {
        return view('admin.img_gallary.create');
    }
    
     public function show(Request $request,$id){
        
        $data = Event::find($id);
        
        return view('admin.img_gallary.show',compact('data'));
    }    
    
    
/*     public function store(Request $request){
   
        $this->validate($request, [
            'event_name' => 'required',
           'status' => 'required',
           'photo' => 'required',
            
            ]);
       
	$photo = '';
           if($request->file('photo')){
                 $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'event';
                $image->move($destinationPath, $photo);     
                
             }	
	
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $input['event_name'] = ($request->event_name) ;
        $input['photo'] = $photo;  
        $enquiey = Event::create($input);  
          
      
        return redirect()->route('admin.event_gallery.index')->with('success','gallery created successfully');

    }*/
    
    
    
     public function store(Request $request){
   
        $this->validate($request, [
   /*         'event_name' => 'required',
           'status' => 'required',
           'photo' => 'required',*/
            
            ]);
       
 $photo = "";
 
 echo "rfp=====".$request->file('photo');
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'event';
                $image->move($destinationPath, $photo);
             }
	
             
        $input = $request->all();
        // $status = isset($request->status) ? 1 : 0;
        $input['status'] = 1;
        $input['event_name'] = ($request->event_name) ;
        $input['photo'] = $photo;
        $enquiey = Event::create($input);  
          
      
        return redirect()->route('admin.event_gallery.index')->with('success','gallery created successfully');

    }
    
public function destroy(Request $request)
    {
    
        Event::find($request->user_id)->delete();
        return redirect()->route('admin.event_gallery.index')
                        ->with('success','Event deleted successfully');
    }
    
    
    	public function edit(Request $request,$id){
          $data = Event::find($id);
        return view('admin.img_gallary.edit',compact('data'));
			
    }
    
        
    public function update(Request $request, $id)
    {
 
        $this->validate($request, [
           
        ]);
        $user = Event::find($id);
        $input = $request->all();
        // $status = isset($request->status) ? 1 : 0;
        $input['status'] = $request->status;
        
        $photo = "";
         if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'event';
                $image->move($destinationPath, $photo);
               
             }else {
            $photo = $request->scrimage;
        }
             
         $user->update($input);
        $user->update(['photo' => $photo]);
       
        
      
       
       return redirect()->route('admin.event_gallery.index')
                        ->with('success','gallery updated successfully');
    }

    
    public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = Event::find($request->event_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/event_gallery')->with('success','Event Active successfully');
        }else{
             $FetchData = Event::find($request->event_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/event_gallery')->with('success','Event Inactive successfully');
        }
        
    }
}

