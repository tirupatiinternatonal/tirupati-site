<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Helpers\helpers;
use App\Models\User;
use App\Models\Task;
use App\Models\TaskDetails;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
use File;
use App\Http\Requests\StoreMap;
use Image;
    
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query = TaskDetails::select('task_details.*','user.name as users_name','user.mobile as users_mobile')
          ->leftjoin('users as user','user.id','task_details.user_id')->where('user.status',0);
          
        
        if($request->name!=""){		
           $query->where('name', 'like', '%'.$request->name.'%');
        }
        
        if(\Auth::user()->role_id > 1){
           $query->where('user_id',\Auth::user()->id);
        }
     	$data = $query->groupBy('task_details.user_id')->orderBy('created_at','desc')->get();
       
        
        return view('admin.task.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Role::where('name', '!=','Admin')->pluck('name','id')->all();
	
        return view('admin.taks.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)   {		
	
		
		 if($request->isMethod('post')){
			 $this->validate($request, [
            'title' => 'required',

        ]);
		
			// upload
		
			
		
		$status = isset($request->status) ? 1 : 0;		
		
		   $photo ="";
     if($request->file('attach_docs')){
                 $image = $request->file('attach_docs');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'task_docs';
                $image->move($destinationPath, $photo);   
          
             }
		$request->merge(["status"=>$status]);
		$task = Task::create($request->all());	
		 $attach = Task::find($task->id);
		  $attach->update(['attach_docs' => $photo]);  
		if(!empty($request->task_name))
         {
           foreach($request->task_name as $key=>$data){
          
        $addfol = new TaskDetails;//model name
        $addfol->user_id = Auth::id();   
        $addfol->task_id = $task['id'];
        $addfol->date = date('Y-m-d');
        $addfol->task_name = $request->task_name[$key];
       	    $addfol->save();
           }
         }
		return redirect()->route('admin.task.index')->with('success','Task add successfully');
			 }
    }
    
    public function show(Request $request,$id)
    {

        $query = TaskDetails::select('task_details.*','user.name as users_name','user.mobile as users_mobile','user.role_id as role_id')
                            ->leftjoin('users as user','user.id','task_details.user_id');
        
        if(\Auth::user()->role_id > 1){
            
           $query = $query->where('user_id',[\Auth::user()->id]);
           
        }
         if($request->task_status!=""){    
           
           $query =  $query->where('task_status',$request->task_status);
        }
        if($request->task_date!=""){    
           
           $query =  $query->whereBetween('created_at', [$request->task_date, $request->task_end_date]);
        }/*else{
              
          $query =  $query->whereDate('created_at',date('Y-m-d'));
        }  */
        
        $taskDetails = $query->orderBy('created_at','desc')->groupBy(DB::raw('DATE(task_details.created_at)'))->get();
 
        return view('admin.task.show',compact('taskDetails'));
    }
    
    public function show_detail(Request $request,$id,$date)
    {
       
        $query = TaskDetails::select('task_details.*','user.name as users_name','user.mobile as users_mobile','user.role_id as role_id')
          ->leftjoin('users as user','user.id','task_details.user_id')->where('task_details.user_id',$id)->whereDate('task_details.created_at',$date);
        
         if($request->task_status!=""){    
           
           $query =  $query->where('task_status',$request->task_status);
        }
        if($request->task_date!=""){    
           
           $query =  $query->whereBetween('created_at', [$request->task_date, $request->task_end_date]);
        }/*else{
              
          $query =  $query->whereDate('created_at',date('Y-m-d'));
        }  */
        
        $taskDetails = $query->orderBy('created_at','desc')->get();
     
        
        return view('admin.task.show_detail',compact('taskDetails'));
    }
 
    public function edit($id)
    {
      
        $FetchData = Task::find($id);
        $taskDetails = TaskDetails::where('task_id',$id)->get();
        $roles = Role::where('name', '!=','Admin')->where('role_type','employee')->pluck('name','name')->all();
        return view('admin.task.edit',compact('FetchData','taskDetails','roles'));
    }
    
    
    public function taskAssign(Request $request)
    {

            for($i=0; $i < count($request->taskid); $i++)
                    
            {
                $FetchData = TaskDetails::find($request->taskid[$i]);
                $FetchData->to_assign_name = $request->to_assign_name[$i];
                $FetchData->to_assign_id = $request->to_assign_id[$i];
                $FetchData->assign_by_id = $request->assign_id_by[$i];
                $FetchData->assign_by_name = $request->assign_name_by[$i];
                $FetchData->save();
             }
            
            $emailTask['Task'] = Task::find($request->taskid[0]);
            $emailTask['assignBy'] = explode(',',$request->assign_name_by[0]);
            $emailTask['assignTo'] = explode(',',$request->to_assign_name[0]);
           
            $assignByExplode = explode(',',$request->assign_id_by[0]);
            foreach($assignByExplode  as $key=>$item){ 
                $assignBy = User::find($item);
                if(isset($assignBy['email'])){
                    $emailData = [ 'email' => $assignBy['email'], 'subject' => 'New Task Assigned!', 'emailTask' => $emailTask];
                    sendMail('admin.email.task_assign_by', $emailData);   
                }            
            }
            
            $assignToExplode = explode(',',$request->to_assign_id[0]);
            foreach($assignToExplode  as $key=>$value){ 
                $assignTo = User::find($value);
                if(isset($assignTo['email'])){
                    $emailData = [ 'email' => $assignTo['email'], 'subject' => 'New Task Assigned!', 'emailTask' => $emailTask];
                    sendMail('admin.email.task_assign_to', $emailData);   
                }            
            }
                
                

              
                
      return redirect()->route('admin.task.index')->with('success',' Task assigned successfully');
    }
    
    
   // change active deactive of task
    public function taskStatus(Request $request)
    {
      $status_update = Task::find($request->id);
		  $status_update->update(['status' => $request->status]);  
         
      return redirect()->route('admin.task.index')->with('success',' task assigned successfully');
    }
    
    
    //change status of the task
    public function taskStatusSubmit(Request $request)
    {
             $status_update = TaskDetails::where('id',$request->task_id);
		  $status_update->update(['task_status' => $request->status]);  
           if(!empty($status_update)){
                echo json_encode(0);
                }else{
                      echo json_encode(1);
                }
            
        }
    public function taskReassigned(Request $request)
    {
             $status_update = TaskDetails::where('id',$request->task_id);
		  $status_update->update(['to_assign_id' => $request->assign_id,'user_id' => $request->assign_id,'task_id' => $request->assign_id]);  
           if(!empty($status_update)){
                echo json_encode(0);
                }else{
                      echo json_encode(1);
                }
            
        }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
		 $this->validate($request, [
            'name' => 'required',
            'amount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
			'uploadFile' => 'gpx',			 
        ]);
		
		
        $FetchData = Map::find($id);		
				// upload Photo
			$destinationPath = public_path().'/uploads/maps';						
			if($request->hasFile('uploadFile')){
			if(!empty($FetchData->map_json) && File::exists( public_path().'/uploads/maps/'.$FetchData->map_json)){
			$file_path=  public_path('/uploads/maps/'.$FetchData->map_json);
				unlink($file_path);
			}
			$image = $request->file('uploadFile');				
				$name=$image->getClientOriginalName();
				$extension = $image->getClientOriginalExtension();  //Get Image Extension
				$name = round(microtime(true) * 1000).'.'.$extension;									
				$image->move($destinationPath, $name);	
                    
                    // send map update 
                    $basic_user = DB::table('customers')
                    ->select('customers.device_token')			
                    ->where('customers.device_token', '!=', '')
                    ->whereNotNull('customers.device_token')
                    ->get()->toArray();			
                    $arr = array();
                    if(!empty($basic_user)){
                    foreach($basic_user as $data){				
                    $notification = [
                    'title' => 'Map New',
                    'body' =>'New Map updated',
                    'sound' => 'mySound'
                    ];			
                    $deviceToken = $data->device_token;				
                    push_android($deviceToken, $notification);
                    
                    
                    }
                    }
			}else{
			$name = $FetchData->map_json;
			}
			// end photo
			
			
			// upload Photo
			$destinationPath = public_path().'/uploads/maps';						
			if($request->hasFile('image')){
			
			if(!empty($FetchData->photo) && File::exists( public_path().'/uploads/maps/'.$FetchData->photo)){
			$file_path=  public_path('/uploads/maps/'.$FetchData->photo);
				unlink($file_path);
			}
			$image2 = $request->file('image');		
		
				$name2=$image2->getClientOriginalName();
				$extension = $image2->getClientOriginalExtension();  //Get Image Extension
				$name2 = round(microtime(true) * 1000).'.'.$extension;									
				$image2->move($destinationPath, $name2);			
			}else{
			$name2 = $FetchData->photo;
			}
				
			// end photo
		$status = isset($request->status) ? 1 : 0;		
		$request->merge(["status"=>$status,"map_json"=>$name,"photo"=>$name2]);
        $FetchData->update($request->all());
        return redirect()->route('admin.maps.index')->with('success','Map updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$category = Task::find($id);	
	
        Task::find($id)->delete();
        return redirect()->route('admin.task.index')->with('success','Task deleted successfully');
    }
    
    
      public function taskByAssign(Request $request)
    {
      $query = Task::select('tasks.*','role.name as role_name','detail.to_assign_id','detail.task_status','detail.assign_by_id')
            ->leftjoin('roles as role','role.id','tasks.roles_id')
            ->leftjoin('task_details as detail','detail.task_id','tasks.id')
            ->groupBy('detail.assign_by_id');
        
        if($request->name!=""){		
           $query->where('name', 'like', '%'.$request->name.'%');
        }		
       if($request->task_date!="" || $request->task_end_date!=""){
          
           $query->whereBetween('task_date', [$request->task_date, $request->task_end_date]);
        }else{
            $query->whereDate('task_date', '<=', date("Y-m-d"))->whereDate('task_end_date', '>=', date("Y-m-d"));
        }
        
        if(\Auth::user()->role_id > 1){
            $query->where('detail.assign_by_id',[\Auth::user()->id]);
        }
        
     	$data = $query->sortable(['id' => 'DESC'])->paginate(10);
        return view('admin.task.task_assigned_by_index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);

    }
    
    
    public function taskByAssignDetail($id)
    {
        $FetchData = Task::find($id);
        $query = TaskDetails::where('task_id',$id);
      /*  if(\Auth::user()->role_id > 1){
            $query ->where('assign_by_id',[\Auth::user()->id]);
        }*/
        
        $taskDetails = $query->get();
      
        return view('admin.task.task_assigned_by_detail',compact('FetchData','taskDetails'));
    }
        
     public function taskAssignUpdate(Request $request)
    {
        
          
        
        
        $photo ="";
     if($request->file('task_attachment')){
                 $image = $request->file('task_attachment');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'task_docs';
                $image->move($destinationPath, $photo);   
          
             }
       
        
        $data = TaskDetails::create($request->all()); 
         $taskDetails = TaskDetails::where('task_id',$request->task_id)->get();
             $data->update(['task_attachment' => $photo]);  
         $FetchData = Task::find($request->task_id);
          return redirect('admin/task/'.$request->task_id)->with('success','Task Add Success successfully');
    }
    
    
    
}