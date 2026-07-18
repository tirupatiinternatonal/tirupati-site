<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Salary;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;

class SalaryController extends Controller
{   
   
    public function index(Request $request)
    {
        $search['frome_date'] = $request->frome_date;
        $search['to_date'] = $request->to_date;
        $search['pay_status'] = $request->pay_status;
        $search['name'] = $request->name;
        
    
	 $data =  Salary::select('salarys.*','user.name as user_name','user.email as user_email','user.mobile as user_mobile')
      ->leftjoin('users as user','user.id','salarys.user_id');
   	
		  if($request->isMethod('post')){
		  
                       
                        if(!empty($request->name)){
                                $data = $data->where('user.id',$request->name);
                            }
                        if(!empty($request->pay_status)){
                                $data = $data->where('salarys.pay_status',$request->pay_status);
                            }

                              if(!empty($request->from_date)){
                             $data = $data->whereBetween('salarys.date', [$request->from_date , $request->to_date]);
                         }
           
                            
                        }
                        
                        $data =  $data->orderBy('id','ASC')->get();
   
        return view('admin.salary.index',compact('data','search'));
    }
    

    public function salary_create(Request $request)
    { 
        
        $serach['role_id'] = !empty($request->role_id) ? $request->role_id : '' ;
        $serach['month'] = !empty($request->month) ? $request->month : '' ;
        
       $roles = Role::where('name', '!=','Admin')->pluck('name','id')->all();
       if(!empty($request->role_id)){
            $user=User::where('role_id', $request->role_id)->whereNotNull('users.salary')->get(['name','id']);
            
       }else{
       $user=User::whereNotNull('users.salary')->get('name','id');
       }
         $serach['user_id'] = !empty($request->user_id) ? $request->user_id : '1' ;
        $data = User::select('users.*','users.salary as salary')
        ->where('users.id',$serach['user_id'])->get()->first();

      
                  
        
        return view('admin.salary.create',compact('roles','user','data','serach'));
    }
    


public function generateSalary(Request $request){
        
        $serach['role_id'] = !empty($request->role_id) ? $request->role_id : '' ;
        $serach['month'] = !empty($request->month_id) ? $request->month_id : '' ;
        $serach['user_id'] = !empty($request->user_id) ? $request->user_id : '1' ;
        if($request->isMethod('post')){
            $request->validate([
                
                'name' => 'required',
                'date' => 'required',
            ]);
            
            $add = new Salary;//model name
          
            $add->user_id = $request->user_id;
            $add->name = $request->name;              
            $add->month_id = $request->month_id;   
            $add->basic_amt = $request->basic_amt;
            $add->total_amount = $request->total_amount;              
            $add->per_day_amt = $request->per_day_amt;              
            $add->salary_day = $request->salary_day;              
            $add->da = $request->da;              
            $add->incentive = $request->incentive;              
            $add->allowance = $request->allowance;              
            $add->advance = $request->advance;              
            $add->pf = $request->pf;              
            $add->tds = $request->tds;              
            $add->present = $request->present;              
            $add->absent  = $request->absent;              
            $add->other_deduction = $request->other_deduction;              
            $add->double_shift = $request->double_shift;   
            $add->work_from_home = $request->work_from_home;
            $add->deduction_remark = $request->deduction_remark;
            $add->holiday = $request->holiday;
            $add->half_day = $request->half_day;
            $add->date = $request->date;              
            $add->save(); 
            
           
           if(!empty($request->role_id)){
            $user=User::where('role_id', $request->role_id)->whereNotNull('salary')->get(['name','id']);
            
       }else{
       $user=User::whereNotNull('salary')->get('name','id');
       }
            $data = User::select('users.*','users.salary as salary')
        ->where('users.id',$serach['user_id'])->get()->first();      
            return view('admin.salary.create',compact('user','data','serach'));
        }

    }  
    
    
    
 public function store(Request $request)
    {
  
        $input = $request->all();
   
 
        $slider = Salary::create($input);
        $slider = StaffSalaryDetail::create($input);
       
         $data = array();
        if($request->isMethod('post')){
            $data = User::where('role_id',$request->role_id)->orderBy('id','DESC')->get();
            $userData ='<option value="">Select</option>';
            foreach($data as $user){
            $userData.='<option value="'.$user['id'].'">'.$user['name'].'</option>';
            }
      
        }
                
        return redirect()->route('admin.salary.index')
                        ->with('success','Salary created successfully');
    }
    
    public function find_staff(Request $request){
        $data = array();
        if($request->isMethod('post')){
            $data = User::where('role_id',$request->role_id)->orderBy('id','DESC')->get();
            $userData ='<option value="">Select</option>';
            foreach($data as $user){
            $userData.='<option value="'.$user['id'].'">'.$user['name'].'</option>';
            }
        echo $userData;
        }
    } 
    
    public function show(Request $request,$id){
        
        $data = Salary::select('salarys.*','users.name as name','users.email as user_email','users.mobile as user_mobile','users.address as user_address','users.salary as salary','users.photo as photo','users.dob as user_dob')
                        ->leftjoin('users as users','users.id','salarys.user_id')->find($id);
      
        return view('admin.salary.show',compact('data'));
    }  

    
    public function printFile(Request $request,$id){
        
      $data = Salary::select('salarys.*','users.name as name','users.email as user_email','users.mobile as user_mobile','users.address as user_address','users.salary as salary','users.photo as photo','months.name as month_name','roles.name as role_name')
                         ->leftjoin('months as months','months.id','salarys.month_id')
                        ->leftjoin('users as users','users.id','salarys.user_id')
                        ->leftjoin('roles as roles','roles.id','users.role_id')->where('salarys.user_id',$id)->get()->first();
      
        return view('admin.salary.print_file',compact('data'));
    }  

    
          public function user_pay(Request $request){
       
          $data =  Salary::find($request->id);
       
         if($request->isMethod('post')){
         
      
        $data->total_amount =$request->total_amount;
        $data->user_pay_date =$request->user_pay_date;
        $data->pay_status = 1;
		$data->user_pay_amt =$request->user_pay_amt;
		$data->save();
    
        	return redirect()->route('admin.salary')->with('success',' Users Pay Add successfully');
        }
        
        return view('salary.index',compact('data'));
 
     }
}