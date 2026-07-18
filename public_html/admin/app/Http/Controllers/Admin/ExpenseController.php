<?php    
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\Expense;
use File;
use Image;
use Session;
    
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     public function index(Request $request){
    
        $search['frome_date'] = $request->frome_date;
        $search['to_date'] = $request->to_date;
        $search['name'] = $request->name;
        
          $data = Expense::select('expenses.*','user.name as username')
                        ->leftjoin('users as user','user.id','expenses.user_id')->where('deleted_at', '=' , null);
                       
		  if($request->isMethod('get')){
 
                       
                        if(!empty($request->name)){
                                $data = $data->where('user.id',$request->name);
                            }
         
                        if($request->from_date!="" || $request->to_date!=""){        
                                   $data = $data->whereBetween('expenses.date', [$request->from_date, $request->to_date]);
                                }
                    
                    /*          if(!empty($request->from_date)){
                             $data = $data->whereBetween('expenses.date', [$request->from_date , $request->to_date]);
                         }
           */
                            
                        }
                        
                       
                        
                        $data =  $data->orderBy('id','ASC')->get();
      
            return view('admin.expense.index',compact('data','search'));
            
        }
        
        public function create(Request $request){
            
            
            return view('admin.expense.create');
            
        }
        public function store(Request $request){
            

        $attachment = "";
        if($request->file('attachment')){
            
                $image = $request->file('attachment');
                $path = $image->getRealPath();      
                $attachment =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'expense';
                $image->move($destinationPath, $attachment);
             }
             
             
            $input = $request->all();
            $status = isset($request->status) ? 1 : 0;
            $input['status'] = $status;
            $input['attachment'] = $attachment;
           
             $expense = Expense::create($input);
       
        return redirect()->route('admin.expense.index')
                        ->with('success','expense created successfully');
            
            
        }
        
        public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = Expense::find($request->expense_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/expense')->with('success','Expense Active successfully');
        }else{
             $FetchData = Expense::find($request->expense_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/expense')->with('success','Expense Inactive successfully');
        }
		
    }
    
    public function edit(Request $request, $id){    
        
	    $data = Expense::find($id);
	    
        return view('admin.expense.edit',compact('data'));
        
    }
    
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
      /*      'expense_name' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'total_amt' => 'required',*/
            
            
        ]);
        
        $attachment = "";
        if($request->file('attachment')){
            
                $image = $request->file('attachment');
                $path = $image->getRealPath();      
                $attachment =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'expense';
                $image->move($destinationPath, $attachment);
             }
        
        $expense = Expense::find($id);
        $input = $request->all();
        
        
         $expense->update($input);
         $expense->update(['attachment' => $attachment]);
       
    
         return redirect()->route('admin.expense.index')
                        ->with('success','expense updated successfully');
    }
    
    public function destroy(Request $request, $id)
{
   $delete = Expense::where('id', $id)->delete();
    return redirect()->route('admin.expense.index')
         ->withSuccess(__('Expense deleted successfully.'));
}
   
    public function show(Request $request,$id){
        
        $data = Expense::find($id);
        
        return view('admin.expense.show',compact('data'));
    }    
   
   
}