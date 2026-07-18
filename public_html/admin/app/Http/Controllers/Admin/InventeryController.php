<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\Inventery;
use File;
use Image;
use Session;
    
class InventeryController extends Controller
{

    public function index(){
        	$data = Inventery::orderBy('id','DESC')->get();
         return view('admin.inventery.index',compact('data'));
			
    }
    
   
     public function store(Request $request)
    {
        $this->validate($request, [
           
            
        ]);
    
        $role = Inventery::create($request->all());
        return redirect('admin/inventery')->with('success','inventery created successfully');
    }
	public function create(Request $request){
	    
        return view('admin.inventery.create');
        
    }
    

    
   public function update(Request $request, $id)
    {
        $data = Inventery::find($id);
       
        $this->validate($request, [ ]);
        $input = $request->all();
        $data->update($input);  
		return redirect('admin/inventery')
		->with('success','Inventery Update successfully');
        } 
        
    
     
 
    public function destroy(Request $request)
    {
    
        Inventery::find($request->user_id)->delete();
        return redirect()->route('admin.inventery.index')
                        ->with('success','inventery deleted successfully');
    }
    
    
    
    public function show(Request $request,$id){
        
        $data = Inventery::find($id);
        
        return view('admin.inventery.index',compact('data'));
    }    
    
  public function edit(Request $request, $id){    
        
	    $data = Inventery::find($id);
	    
        return view('admin.inventery.edit',compact('data'));
        
    }
}