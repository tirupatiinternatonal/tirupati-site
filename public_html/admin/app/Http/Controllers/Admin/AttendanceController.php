<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use App\Models\AttendanceStatus;
use App\Models\StaffAttendance;
use Session;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;

class AttendanceController extends Controller
{

    public function index(Request $request){
        //dd($request);
        //$curr_yrs = date('Y',strtotime(date("Y-m-d")));	
        $curr_yrs = ( !empty($request->month)) ? 2022 : date('Y',strtotime(date("Y-m-d"))) ;
		$curr_mnt = ( !empty($request->month)) ? $request->month : date('m',strtotime(date("Y-m-d"))) ;
		$curr_date = date('d',strtotime(date("Y-m-d")));	
		$data['monthDate'] = cal_days_in_month(CAL_GREGORIAN,$curr_mnt, $curr_yrs); 
		$totel_month_day = $data['monthDate'];  
		
		$allStaff = User::where('role_id', '!=' , 1)->where('status','0')->get();

		$data =array();
		if(!empty($allStaff)){
		    
    		foreach ($allStaff as $key => $staff_record) {
           	    
			$data[$staff_record['id']] = StaffAttendance::where('user_id',$staff_record['id'])->whereMonth('date',$curr_mnt)->whereYear('date',$curr_yrs)->groupby('date')->get(['date','user_id','attendance_status_id'])->keyBy('date')->toArray();
	
		    }
		}
		$AttStatus = AttendanceStatus::get()->keyBy('id')->toArray();
        return view('admin.attendance.index',compact('data','allStaff','totel_month_day','AttStatus','curr_yrs','curr_mnt','totel_month_day'));
    }

   
    public function attendance_search(Request $request){
        $data = User::where('role_id', '!=' , 1)->where('status',0);
          if($request->name!="" ){       
             
           $data = $data->where('name', 'LIKE', '%'.$request->name.'%');
        }     
        
        $data = $data->orderBy('id','DESC')->get();
		$attendanceStatus = AttendanceStatus::where('status',1)->get();
        return view('admin.attendance.create',compact('data','attendanceStatus'));
    }

    public function attendance_store(Request $request){
        $staff_id = $request->staff_id;
        $attendance_status_id = $request->attendance_status_id;
   
		if(!empty($staff_id)){
		    for($count = 0; $count <= count($staff_id); $count++){
		        if(isset($staff_id[$count])){
    		        $oldData = StaffAttendance::where('user_id',$staff_id[$count])->where('date',$request->date)->get()->first();
    		        if(!empty($oldData)){
    		               
    		            $attendance = $oldData;
    		        }else{
    		            $attendance = new StaffAttendance;
    		        }		            
		            $attendance->branch_id = 1;
		            $attendance->user_id = $staff_id[$count];
		            $attendance->date = $request->date;
		            $attendance->attendance_status_id = $attendance_status_id[$count];
		            $attendance->save();
		        }
		    }
		    return redirect()->route('admin.attendance')->with('success','Attendance Submit Successfully');
		}
                
    
		
    }

   


}