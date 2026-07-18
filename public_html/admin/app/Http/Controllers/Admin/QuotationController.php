<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\QuotationDetails;
// use App\Models\Testimonila_state;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function index(Request $request)
    {
        
        $data = Quotation::all();
       
         return view('admin.quotation.index',compact('data'));
    }
    
    
        public function create(Request $request)
        {
            $routes = Quotation::orderBy('id')->get();
            $planTypes = DB::table('plan_types')->where('status',1)->get();
    $plans     = DB::table('plans')->where('status',1)->get();
    		 return view('admin.quotation.create',compact('routes','planTypes','plans'));
        }
        
        
            
             
                        
public function store(Request $request){
    
    $this->validate($request, [
        'plan_type' => 'required',
        'popular' => 'required',
        'discount_label' => 'required',
        'plan_name' => 'required',
        'amount' => 'required',
        'features' => 'array', // Ensure features is an array
        'features.*' => 'required|string', // Each feature must be a string
    ]);
    
    $input = $request->only([
        'plan_type', 'discount_label', 'plan_name', 'amount', 'popular'
    ]);

             // dd($request->popular);
              
             $input['plan_type'] = $request->plan_type;
             $input['popular'] = $request->popular;
             
           $quotation = Quotation::create($input);
           
             for($count = 0; $count <= count($request->features); $count++){
              
                   if(isset($request->features[$count])){
                      $detail = new QuotationDetails;
                       $detail->quotation_id = $quotation->id;
                      $detail->features = $request->features[$count];
                      $detail->save();
                    }
                     
             } 
                 return redirect()->route('admin.quotation.index')
                                                    ->with('success',' Quotation successfully');
    }
            
         public function edit(Request $request, $id) {    
                    	    $data = Quotation::find($id);
                    	   
                    	    $dataDetail = QuotationDetails::where('quotation_id', $data->id)->get();
                    	    
                    	    $pgdata = Quotation::select('quotation.plan_type')->get();
                    	     $planTypes = DB::table('plan_types')->where('status',1)->get();
    $plans     = DB::table('plans')->where('status',1)->get();
                    	    

                    	    
             return view('admin.quotation.edit',compact('pgdata','data','dataDetail','planTypes','plans'));
                            
             }
  public function update(Request $request, $id) {
        
        $quotation = Quotation::find($id);
       $quotationDetail = QuotationDetails::where('quotation_id', $quotation->id)->get();
        $input['plan_type'] = $request->plan_type;
        $input['discount_label'] = $request->discount_label;
        $input['plan_name'] = $request->plan_name;
        $input['amount'] = $request->amount;
    //   dd($request);
        $quotation->update($input);
        $featuresCount = count($request->features);
                    foreach($request->features as $key => $itme){
                        if(isset($request->old_id[$key])){
                            $quotation_det = QuotationDetails::find($request->old_id[$key]); 
                        }else{
                            $quotation_det = new QuotationDetails;
                        }
                          
        			   	    $quotation_det->quotation_id = $quotation->id;
        			   	    $quotation_det->features = $request->features[$key];
        			   	   
        			   	    $quotation_det->save();                  
                    }
         return redirect()->route('admin.quotation.index')
                        ->with('success','Quotation updated successfully');
        }
            public function featuresDeleteSingle(Request $request){
                $id = $request->delete_id;
                $find = QuotationDetails::find($id);
                $decrement = Quotation::find($find->faq_id);
                $find->delete();
                return response()->json(['status' => 1]);
            }
                public function destroy(Request $request)
                {
                    // Find the record by user_id
                    $quotation = Quotation::find($request->user_id);
                 $quotation->delete();
                         $subdelete = QuotationDetails::where('quotation_id', $request->user_id)->delete();
                        // Redirect with success message
                        return redirect()->route('admin.quotation.index')
                          ->withSuccess(__('Deleted successfully.'));
                  
                }
                
                
                  
                    
                    public function show($id)
                {
                    return redirect()->route('admin.quotation.index');
                }
                
                }