<?php    

namespace App\Http\Controllers\Admin;    

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Employee;
use App\Models\EnquiryDetail;
use App\Models\Department;
use App\Models\User;
use App\Models\ResponceStatus;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
use File;

class EnquiryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
$date = date('Y-m-d');
        $query = Enquiry::with('User')->sortable(['id' => 'DESC']); 
       
        if($request->name!=""){        
           $query->where('name', 'like', '%'.$request->name.'%');
        }       
         if($request->mobile!=""){        
           $query->where('mobile',$request->mobile);
        }
        if($request->enquiry_date!=""){   
             $query =  $query->whereBetween('enquiry_date', [$request->enquiry_date, $request->enquiry_end_date]);
        }else{
            $query->whereDate('enquiry_date','<',date('Y-m-d', strtotime( $date . " + 7 days")));
        }  
        
        if($request->user_id!=""){        
           $query->where('user_id',$request->user_id);
        } 
         if($request->responce_status_id!=""){        
           $query->where('responce_status_id',$request->responce_status_id);
        }  
        if(Auth::user()->role_id > 1){
            
            $query->where('user_id',[\Auth::user()->id]);
           
        } 
        
        $data = $query->get();
        
        $responce_status = ResponceStatus::where('status','1')->get();	
        $users = User::where('role_id',6)->where('status','1')->get();	
        return view('admin.enquiry.index',compact('data','responce_status','users'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.enquiry.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 

    public function store(Request $request){
        //dd($request);
        $this->validate($request, [
        'deepartment_id' => 'required',
        'name' => 'required',
          'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
          ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();
           
        $enquiey = Enquiry::create($input);  
          
      
        return redirect()->route('admin.enquiry.index')->with('success','Enquiry created successfully');

    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
       $FetchData = Enquiry::find($id);
       $FetchDetail = EnquiryDetail::where('enquiry_id',$id)->orderBy('id','DESC')->get();
        $responce_status = ResponceStatus::where('status','1')->get();
       return view('admin.enquiry.show',compact('FetchData','FetchDetail','responce_status'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $FetchData = Enquiry::find($id);
        return view('admin.enquiry.edit',compact('FetchData'));
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

		$FetchData = Enquiry::find($id);	
        $input =$request->all();


       // end photo
		$status = isset($request->status) ? 1 : 0;	
            	
		$request->merge(["status"=>$status]);
		$request->merge(["user_id"=>Auth::id()]);
		
        $FetchData->update($request->all());

        return redirect()->route('admin.enquiry.index')->with('success','Enquiry updated successfully');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    
    //     public function destroy(Request $request)
    // {
		  //    Enquiry::find($request->user_id)->delete();
		  //     //Enquiry::find('id')->delete();
    //     return redirect()->route('admin.enquiry.index')
    //                      ->with('success','Enquiry deleted successfully');
    // }
    
    public function destroy(Request $request)
    {
		
        $delete = Enquiry::where('id', $request->user_id)->delete();
        return redirect('admin/enquiry')->with('success','Enquiry deleted successfully');
         return redirect()->route('admin/enquiry')
         ->withSuccess(__('Enquiry deleted successfully.'));
    }
    
    
    
    
     public function department(Request $request)
    {
        
        if($request->isMethod('post')){
        
        $this->validate($request, [
           
            'name' => 'required|max:255',
            
        ]);
        $input = $request->all();
        Department::create($input);  
		return redirect('admin/department')
		->with('success','department created successfully');
        }
        $data = Department::orderBy('id','DESC')->get();
        
        return view('admin.department.create',compact('data'));
    }

   

public function enquiryStatus(Request $request)   {	
  
   		 if($request->isMethod('post')){
			 $this->validate($request, [
                   ]);
			// upload
				
		 $enquiry = Enquiry::find($request->enquiry_id);
		 
		  $enquiry->update(['responce_status_id' =>$request->status]);  
			$enquiry_detail = new EnquiryDetail;//model name
        $enquiry_detail->enquiry_id = $request->enquiry_id;
        $enquiry_detail->message = $request->message;
        $enquiry_detail->status = $request->status;
        $enquiry_detail->reminder_date = $request->reminder_date;
		$enquiry_detail->save();
			/*if($request->status == 3)
			{
	    $employee = new User;//model name
        $employee->branch_id = 1;   
        $employee->role_id = 3;
        $employee->name = $enquiry->name;
        $employee->email = $enquiry->email;
        $employee->enquiry_id = $enquiry->id;
        $employee->password = Hash::make('12345678');
        $employee->status = 1;
        
      
       	$employee->save();
			    
			}*/
			
	
		return redirect()->route('admin.enquiry.index')->with('success','Status submitted successfully');
			 }
    }

}