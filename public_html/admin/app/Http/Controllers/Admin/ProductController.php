<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
// use App\Models\Testimonila_state;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class ProductController extends Controller
{
     
     public function index(Request $request)
    {
        
        $data = Product::all();
       
         return view('admin.product.index',compact('data'));
    }
    
    
        public function create(Request $request)
        {
            $routes = Product::orderBy('id')->get();
            $productIds = $routes->pluck('product_type')->toArray();
            
    		 return view('admin.product.create',compact('productIds'));
        }
        public function store(Request $request){
    
    
    
     $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'product';
                $image->move($destinationPath, $photo);
             }
              $photo2 = "";
        if($request->file('photo2')){
            
                $image = $request->file('photo2');
                $path = $image->getRealPath();      
                $photo2 =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'backgroundimg';
                $image->move($destinationPath, $photo2);
             }
             
    
    $input = $request->only([
        'heading', 'description' , 'url'
    ]);
     $input['photo'] = $photo; 
     $input['photo2'] = $photo2; 

             // dd($request->popular);
              
           
             
           $quotation = Product::create($input);
           
             for($count = 0; $count <= count($request->card_heading); $count++){
              
                   if(isset($request->card_heading[$count])){
                      $detail = new ProductDetails;
                      $detail->product_id = $quotation->id;
                      $detail->card_heading = $request->card_heading[$count];
                      $detail->card_description = $request->card_description[$count];
                      $detail->save();
                    }
                     
             } 
                 return redirect()->route('admin.product.index')
                                                    ->with('success',' Product successfully');
    }
    
    public function edit(Request $request, $id) {    
                    	    $data = Product::find($id);
                    	   
                    	    $dataDetail = ProductDetails::where('product_id', $data->id)->get();
                    	    
                    	    $pgdata = Product::select('product.id')->get();
                    	    

                    	    
             return view('admin.product.edit',compact('pgdata','data','dataDetail'));
                            
             }
  public function update(Request $request, $id) {
        
        $product = Product::find($id);
       $productDetail = ProductDetails::where('product_id', $product->id)->get();
       
       
        $photo = "";
        if($request->file('photo')){
        
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'product';
            $image->move($destinationPath, $photo);
            
        } else {
            $photo = $request->scrimage;
        }
        $photo2 = "";
        if($request->file('photo2')){
        
            $image = $request->file('photo2');
            $path = $image->getRealPath();      
            $photo2 =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'backgroundimg';
            $image->move($destinationPath, $photo2);
            
        } else {
            $photo2= $request->scrimage1;
        }

             
        $input['product_type'] = $request->product_type;
        $input['heading'] = $request->heading;
        $input['url'] = $request->url;
        $input['description'] = $request->description;
         $input['photo'] = $photo;
         $input['photo2'] = $photo2;
        // $input['amount'] = $request->amount;
    //   dd($request);
        $product->update($input);
        $card_headingCount = count($request->card_heading);
                    foreach($request->card_heading as $key => $itme){
                        if(isset($request->old_id[$key])){
                            $product_det = ProductDetails::find($request->old_id[$key]); 
                        }else{
                            $product_det = new ProductDetails;
                        }
                          
        			   	    $product_det->product_id = $product->id;
        			   	    $product_det->card_heading = $request->card_heading[$key];
        			   	    $product_det->card_description = $request->card_description[$key];
        			   	   
        			   	    $product_det->save();                  
                    }
         return redirect()->route('admin.product.index')
                        ->with('success','Product updated successfully');
        }
        
             public function productDeleteSingle(Request $request){
                $id = $request->delete_id;
                $find = ProductDetails::find($id);
                $decrement = Product::find($find->faq_id);
                $find->delete();
                return response()->json(['status' => 1]);
            }
             public function destroy(Request $request)
                {
                    // Find the record by user_id
                    $product = Product::find($request->user_id);
                 $product->delete();
                         $subdelete = ProductDetails::where('product_id', $request->user_id)->delete();
                        // Redirect with success message
                        return redirect()->route('admin.product.index')
                          ->withSuccess(__('Deleted successfully.'));
                  
                }
                        

                }