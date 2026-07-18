<?php	
	use Illuminate\Http\Request;
	use Illuminate\Support\Collection;
	use App\Models\User;
	use App\Models\PermissionManagement;
	use App\Models\Setting;
	use App\Models\Customer;
	use App\Models\Sidebar;
	use App\Models\TaskDetails;
	use App\Models\Expense;
	use App\Models\AmcDetails;
	use App\Models\Branches;
	use App\Models\Task;
	use App\Models\Route;
	use App\Models\ResponceStatus;
	use App\Models\Role;
	use App\Models\Department;
	use App\Models\StaffAttendance;
	use App\Models\WebsiteAmc;
	use App\Models\Country;
	use App\Models\City;
	use App\Models\State;
	use App\Models\OrderRequiredDocuments;
	use Spatie\Permission\Models\Permission;
	use Carbon\Carbon;
	
	
	
	 function getCountry(){
       $getCountry = Country::orderBy('id','DESC')->get();
       return $getCountry;
   }
   
   function getState(){
        $country_id = Setting::where('branch_id',Session::get('branch_id'))->get()->first();
        
        if(empty($country_id))
        {
            $getstate = State::where('country_id',101)->get();
        }
        else
        {
            $getstate = State::where('country_id',$country_id->country_id)->get();
        }
       
       return $getstate;
   
   }
    function getCity(){
        $state_id = Setting::where('branch_id',Session::get('branch_id'))->get()->first();
         if(empty($state_id))
        {
            
            $state_ids = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41];
            $getcitie = City::where('state_id',33)->get();
        }
        else
        {
            $getcitie = City::where('state_id',$state_id->state_id)->get();
        }
       
       return $getcitie;
   }
	
	function setting(){
		$setting = Setting::first();
		return $setting;
	}
	
    function getSiderbar(){
       $getSidebar = Sidebar::orderBy('id', 'ASC')->get();
       return $getSidebar;
    }

    function getPermission(){
        $user_id = Auth::user()->id;
       
        $Permission = PermissionManagement::where('reg_user_id', $user_id)->first();
       
        return $Permission;
    }
   
	function responceStatusList(){
	
		return ResponceStatus::where('status','1')->pluck('name','id')->prepend('--Select--','');		
	}	
	
	    function getwebmeta(){
        $getwebmeta = Route::orderBy('id','ASC')->get();
        return $getwebmeta;
    }
	
	function getDepartment(){
	  
		return Department::pluck('name','id')->prepend('--Select--','');		
	
	}


 	function customerDetails($id,$field){
 		$customerDetais = Customer::where('id',$id)->first();
 		if($customerDetais){
			return $customerDetais->$field;
		}else{
			return '';
		}
 	}

	function getLestreminder($id){
	  
		$getreminder= AmcDetails::where('web_amc_id',$id)->orderBy('id','DESC')->get()->first();
	
	  return $getreminder;
	}
    function getRole(){
        $getRole = Role::orderBy('id','ASC')->get();
        return $getRole;
    }
    function expanceSum(){
        $expanceSum = Expense::where('deleted_at', '=' , null)->sum('amount','deleted_at', '=' , null);
        return $expanceSum;
    }
    function getuser(){
        $getuser = User::orderBy('id','ASC')->get();
        return $getuser;
    }
    function gettask(){
        $gettask = Task::orderBy('id','ASC')->get();
        return $gettask;
    }
    
    
    
	function getAssignedRole($id){
	  
		return TaskDetails::select('to_assign_id')->where('id',$id)->get()->first();	
	
	}
    function sendMail($tmplale,$data){

        Mail::send($tmplale, $data, function($message) use ($data) {
            $message->from(getenv('MAIL_FROM_ADDRESS'));
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
    }

	function website_amc(){
	  $date = date('Y-m-d', strtotime( date("Y-m-d") . " +7 days"));
	    $data = WebsiteAmc::select('website_amc.*')->where('status',1)->whereDate('emc_date', '<=', $date)->orderBy('id','DESC')->get();
	    
	        
	    

	 return $data;
	
	}
	
    function staffAtten($id,$monthId){
        
        $month = $monthId;
        $year = 2022;
        $sundays=0;
        if(!empty($monthId)){
            $total_days=cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for($i=1;$i<=$total_days;$i++)
            if(date('N',strtotime($year.'-'.$month.'-'.$i))==7)
            $sundays++;            
        }
       
       $staffAtten['P'] = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',1)->count();
       $staffAtten['A'] = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',2)->count();
       $staffAtten['W'] = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',3)->count();
       $staffAtten['HF'] = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',4)->count();
       $staffAtten['H'] = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',5)->count();
       $recode = StaffAttendance::where('user_id',$id)->whereMonth('date',$monthId)->where('attendance_status_id',11)->count();
       $staffAtten['d'] = $recode*2;
       $staffAtten['TotalDay'] = Carbon::now()->month($monthId)->daysInMonth; // 28
       $staffAtten['Sunday'] = $sundays; // 28
       return $staffAtten;
    }     
   

?>