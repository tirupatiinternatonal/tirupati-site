<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageImg;
// use App\Models\Testimonila_state;
use App\Models\Route;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class PageController extends Controller
{
     
     public function index(Request $request)
    {
         $data = Page::select('page.*','page_n.page_name as pg_name')
                            ->leftJoin('page_name as page_n','page_n.id','page.page')
                            ->get();
                            
        $pageImg= PageImg::all();
         return view('admin.page.index',compact('data','pageImg'));
    }
    
    
    public function create(Request $request)
    {
         $routes = Page::orderBy('id')->get();
         $pageIds = $routes->pluck('page')->toArray();
		 return view('admin.page.create',compact('pageIds'));
    }
        
        
    public function store(Request $request){
            
        // $input = $request->only([
        //     'page'
        // ]);
        
        $input = $request->all();

        // dd($request);
          
        $input['page'] = $request->page;
        $input['title'] = $request->title;
        $input['subtitle'] = $request->subtitle;
         
        // dd($input); 
         
        $page = Page::create($input);
       
        for($count = 0; $count <= count($request->bgimg); $count++){
          
            if(isset($request->bgimg[$count])){
               
                if ($request->file('bgimg')[$count]) {
                            $image = $request->file('bgimg')[$count];
                            $originalName = $image->getClientOriginalName();
                            $filename = str_replace(' ', '_', $originalName);
                            $bgimg = time() . uniqid() ;
                            $destinationPath = env('IMAGE_UPLOAD_PATH') . 'pageimg';
                            $image->move($destinationPath, $bgimg);
                        }

               
                $detail = new PageImg;
                $detail->page_id = $page->id;
                $detail->bgimg = $bgimg;
                $detail->save();
        
            }
                 
        } 
        return redirect()->route('admin.page.index')->with('success',' Quotation successfully');
    }
     
    public function edit(Request $request, $id) {
         
        $routes = Page::orderBy('id')->get();
             $pageIds = $routes->pluck('page')->toArray();
        
	    $data = Page::find($id);
	   
	    $dataDetail = PageImg::where('page_id', $id)->get();
	    
	    $pgdata = Page::select('page.id')->get();
	    
        return view('admin.page.edit',compact('pgdata','data','dataDetail','pageIds'));
        
    }
    
    public function update(Request $request, $id) {
        
        
   // dd($request);
        
        $quotation = Page::find($id);
        
        $quotationDetail = PageImg::where('page_id', $quotation->id)->get();
        
       // $input['page'] = $request->page;
        $input['title'] = $request->title;
        $input['subtitle'] = $request->subtitle;
        //   dd($request);
        $quotation->update($input);
        
        $featuresCount = count($request->bgimg ?? []);
                  
        if (!empty($request->bgimg) && is_array($request->bgimg)) {
            
            foreach($request->bgimg as $key => $item) {
        
                if (isset($request->old_id[$key])) {
                    $quotation_det = PageImg::find($request->old_id[$key]); 
                } else {
                    $quotation_det = new PageImg;
                }

                $quotation_det->page_id = $quotation->id;

        
                if ($request->hasFile("bgimg") && isset($request->file('bgimg')[$key])) {
                    $image = $request->file('bgimg')[$key];
                    
                    if ($image) {
                            
                            $originalName = $image->getClientOriginalName();
                            $filename = str_replace(' ', '', $originalName);  // Remove spaces from file name
                            $bgimg = time() . uniqid() ;
                            $destinationPath = env('IMAGE_UPLOAD_PATH') . 'pageimg';
                            $image->move($destinationPath, $bgimg);
                            $quotation_det->bgimg = $bgimg;
                        }

                } else {
                   
                }
        
                $quotation_det->save();  
            }
        } else {
    
        }
            
        return redirect()->route('admin.page.index')->with('success','Page  updated successfully');
        
    }

    
     public function destroy(Request $request) {
         
       $delete = Page::where('id', $request->user_id)->delete();
       
       $subdelete = PageImg::where('page_id', $request->user_id)->delete();
       
        return redirect()->route('admin.page.index')->withSuccess(__('Faq deleted successfully.'));
             
    }
     public function pageDeleteSingle(Request $request){
                $id = $request->delete_id;
                $find = PageImg::find($id);
                $decrement = Page::find($find->page_id);
                $find->delete();
                return response()->json(['status' => 1]);
            }
    
}