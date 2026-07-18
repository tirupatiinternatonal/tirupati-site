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
use Illuminate\Support\Arr;
use File;

class ResponceStatusController extends Controller
{
    
    
    public function index(Request $request)
    {
        
        $data = ResponceStatus::all();
          
        return view('admin.department.responce_status',compact('data'));
        }
        
        
           public function store(Request $request){
       
        $this->validate($request, [
        
        // 'name' => 'required',
          ]);

        $input = $request->all();
          $status = isset($request->status) ? 1 : 0; 
        $enquiey = ResponceStatus::create($input);  
          
      
        return redirect()->route('admin.responce_status.index')->with('success','Responce Status created successfully');

    }
    
      public function edit($id)
    {
        $FetchData = ResponceStatus::find($id);
        return view('admin.department.responce_status_edit',compact('FetchData'));
    }
    
    
     public function update(Request $request, $id)
    {
        $data = ResponceStatus::find($id);
       
        $this->validate($request, [
           
            'name' => 'required|max:255',
            
        ]);
        $input = $request->all();
        $data->update($input);  
		return redirect('admin/responce_status')
		->with('success','Responce Status Update successfully');
        } 
        
    //     public function destroy($id)
    // {
    //     ResponceStatus::find($id)->delete();
    //     return redirect('admin/responce_status')->with('success','Responce Status deleted successfully');
    // }
    
    public function destroy(Request $request)
    {
		
        $delete = ResponceStatus::where('id', $request->user_id)->delete();
        return redirect('admin/responce_status')->with('success','Responce Status deleted successfully');
         return redirect()->route('admin/responce_status')
         ->withSuccess(__('Responce Status deleted successfully.'));
    }
    
    
    	public function ResStatus(Request $request)
    {
      $status_update = ResponceStatus::find($request->id);
		  $status_update->update(['status' => $request->status]);  
         
      return redirect()->route('admin.responce_status.index')->with('success',' Status Change successfully');
    }
    

}


