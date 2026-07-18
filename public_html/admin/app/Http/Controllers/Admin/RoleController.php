<?php
    
namespace App\Http\Controllers\Admin; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
     	$data = Role::orderBy('id','DESC')->get();
      
    return view('admin.roles.index',compact('data'));
			
    }
    public function create(){
        return view('admin.roles.create');
    }
    
   public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name'
            
        ]);
    
        $role = Role::create($request->all());
        return redirect('admin/roles')->with('success','Role created successfully');
    }
    
    
    public function edit($id){
        
         $data = Role::find($id);
        return view('admin.roles.edit',compact('data'));
    }
    
     public function update(Request $request,$id)
    {
        $data = Role::find($id);
        $this->validate($request, [
           'name' => 'required'
            
        ]);
    
    
     
			//dd($request);	
        
        $data->update($request->all());
        return redirect('admin/roles')->with('success','Role Update successfully');
    }
    
    public function destroy(Request $request)
    {
		
        $delete = Role::where('id', $request->user_id)->delete();
        return redirect('admin/roles')->with('success','Role deleted successfully');
         return redirect()->route('admin/roles')
         ->withSuccess(__('Branch deleted successfully.'));
    }
    
 

    	/*public function change_status(Request $request,$roles_id,$status){
        if($status == 'Active'){
            $FetchData = Role::find($roles_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/roles')->with('success','Role Active successfully');
        }else{
             $FetchData = Role::find($roles_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/roles')->with('success','Role Inactive successfully');
        }
		
        return view('admin.roles.show');
			
    }*/
    
    public function show($slug)
    {
      $test = Test::whereSlug($slug)->firstOrFail();
      return view('tests.show', compact('test'));
    }
}