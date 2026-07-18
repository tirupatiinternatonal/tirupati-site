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
    
class PaidController extends Controller
{
   

         public function index(Request $request){
       
            $search['frome_date'] = $request->frome_date;
            $search['to_date'] = $request->to_date;
            $search['name'] = $request->name;
        
                 $data = Expense::select('expenses.*','user.name as name')
                        ->leftjoin('users as user','user.id','expenses.user_id');
                      
      		  if($request->isMethod('get')){

               
                        if(!empty($request->name)){
                                $data = $data->where('user.id',$request->name);
                            }
                    

                              if(!empty($request->from_date)){
                             $data = $data->whereBetween('expenses.date', [$request->from_date , $request->to_date]);
                         }
           
                            
                        }
                                $data =  $data->orderBy('id','ASC')->get();
       
        return view('admin.expanse.paid',compact('data','search'));
        
    }
        
        
   
    public function show(Request $request){
      
                $search['frome_date'] = $request->frome_date;
            $search['to_date'] = $request->to_date;
            $search['name'] = $request->name;
            
            $data = Expense::select('expenses.*','user.name as name')
                        ->leftjoin('users as user','user.id','expenses.user_id');
                   
                     if($request->isMethod('get')){

               
                        if(!empty($request->name)){
                                $data = $data->where('user.id',$request->name);
                            }
                    

                              if(!empty($request->from_date)){
                             $data = $data->whereBetween('expenses.date', [$request->from_date , $request->to_date]);
                         }
           
                            
                        }
                                $data =  $data->orderBy('id','ASC')->get();
                                
        return view('admin.expense.paid',compact('data','search'));
    }    
    
     public function store(Request $request){
            
            
            $status = isset($request->paid_status) ? 1 : 0;
            $input['paid_status'] = $status;
           
             $expense = Expense::create($input);
       
        return redirect()->route('admin.expense.index')
                        ->with('success','expense Create created successfully');
            }
        
          public function update(Request $request,$id)
    {
        $this->validate($request, [
           
        ]);
        $user = Expense::find($id);
      


        return redirect()->route('admin.expense.index')
                        ->with('success','paid updated successfully');
    }
        
        
    
  
   
}