<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageMap;
use App\Models\Department;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
use Carbon\Carbon;

    
class DepartmentController extends Controller
{
    
	     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $data = Department::orderBy('id','DESC')->get();
        
        return view('admin.department.create',compact('data'));
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
        
        if($request->isMethod('post')){
        
        $this->validate($request, [
           
            'name' => 'required|max:255',
            
        ]);
        $input = $request->all();
        Department::create($input);  
		return redirect('admin/department')
		->with('success','Department created successfully');
        }

    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
       $FetchData = Department::find($id);
       return view('admin.enquiry.show',compact('FetchData'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $FetchData = Department::find($id);
        return view('admin.department.edit',compact('FetchData'));
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
        $data = Department::find($id);
       
        $this->validate($request, [
           
            'name' => 'required|max:255',
            
        ]);
        $input = $request->all();
        $data->update($input);  
		return redirect('admin/department')
		->with('success','Department Update successfully');
        } 
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    // Department::find($id)->delete();
    // return redirect('admin/department')->with('success','Department deleted successfully');
    // }
    public function destroy(Request $request)
    {
		
        $delete = Department::where('id', $request->user_id)->delete();
        return redirect('admin/department')->with('success','Role deleted successfully');
         return redirect()->route('admin/department')
         ->withSuccess(__('Branch deleted successfully.'));
    }
}