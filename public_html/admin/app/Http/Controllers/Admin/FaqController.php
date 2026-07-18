<?php    
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqDetails;
use App\Models\Route;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
    
class FaqController extends Controller
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
         $data = Faq::select('faqs.*', 'routes.page_name')
         ->leftJoin('routes', 'routes.id', 'faqs.page_name')
         ->get();
        
        
		 return view('admin.faq.index',compact('data'));
    }
    
    
//     public function create(Request $request)
//     {
//         $routes = Route::orderBy('id')->get();
// 		 return view('admin.faq.create',compact('routes'));
//     }
    
    
    
    public function create(Request $request)
    {
        $routes = Route::orderBy('id')->get();
        // $data = Faq::all();
        
        $data = Faq::select('faqs.page_name')->get();

        // dd($data);

		 return view('admin.faq.create',compact('data','routes'));
    }
    
    
    
    
    
    public function store(Request $request) {
        // dd($request);
        
        // dd($request->all());
        // dd($request->page_name);
        
        $this->validate($request, [
            // 'question' => 'required',
            // 'answer' => 'required',
            // 'page_name' => 'required',
            // 'title' => 'required',
            // 'url' => 'required',
            //'descreption' => 'required',
        ]);
       
        
         $photo = "";
 
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'faq';
                $image->move($destinationPath, $photo);
             }

    
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $input['photo'] = $photo; 
        //$input['descreptionimage'] = $descreptionimage; 
        $input['page_name'] = $request->page_name;
        $input['modul_descreption'] = $request->modul_descreption;
        
        // dd($input);
        $faq = Faq::create($input);
    //   $data = Faq::orderBy('page_name','title','descreption','photo', 'desc')->get();
    
        if(!empty($request->description)){
            for($count = 0; $count <= count($request->description); $count++){
                
                if(isset($request->description[$count])){
                    
                    if($request->file('descriptionimage')[$count]){
                        $image = $request->file('descriptionimage')[$count];
                        $descreptionimage =  time().uniqid().$image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH').'descreptionimage';
                        $image->move($destinationPath, $descreptionimage);
                    }
                    
                    $detail = new FaqDetails;
                    $detail->faq_id = $faq->id;
                    $detail->descreption = $request->description[$count];
                    $detail->descriptionimage = $descreptionimage;
                    $detail->save();
                }
            }
        }
        return redirect()->route('admin.faq.index')
                        ->with('success','Faq created successfully');
    }
    
   
    public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = Faq::find($request->faq_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/faq')->with('success','Faq Active successfully');
        }else{
             $FetchData = Faq::find($request->faq_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/faq')->with('success','Faq Inactive successfully');
        }
		
    }
    
    public function edit(Request $request, $id) {    
        
	    $data = Faq::find($id);
	   
	    $dataDetail = FaqDetails::where('faq_id', $id)->get();
	    
	    $pgdata = Faq::select('faqs.page_name')->get();
	    
	   // dd($pgdata);
	    
	    $routes = Route::orderBy('id')->get();
	    
        return view('admin.faq.edit',compact('pgdata','data','routes','dataDetail'));
        
    }
    
    
    
    public function update(Request $request, $id) {
        
        // dd($id);
        $photo = "";
        if($request->file('photo')){
        
            $image = $request->file('photo');
            $path = $image->getRealPath();      
            $photo =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'faq';
            $image->move($destinationPath, $photo);
            
        } else {
            $photo = $request->scrimage;
        }
         
        // echo "**************";

        $faq = Faq::find($id);
        
       // $input['page_name'] = $request->page_name;
        $input['title'] = $request->title;
        $input['modul_descreption'] = $request->modul_descreption;
        $input['url'] = $request->url;
        $input['photo'] = $photo;
        
        $faq->update($input);
        // for($count = 0; $count <= count($request->description); $count++){
        //     if(isset($request->description[$count])){
                
        //         // dd($request->file('descriptionimage')[$count]);
                
        //         if(isset($request->file('descriptionimage')[$count])) {
                    
        //             $image = $request->file('descriptionimage')[$count];
        //             $descreptionimage =  time().uniqid().$image->getClientOriginalName();
        //             $destinationPath = env('IMAGE_UPLOAD_PATH').'descriptionimage';
        //             $image->move($destinationPath, $descreptionimage);
                    
        //             $detail['descriptionimage'] = $descreptionimage;
                    
        //         }
                
        //         // dd($request->description[$count]);
                
        //         // $faqdetail = FaqDetails::where('faq_id',$id);
                
        //         $faqdetail = FaqDetails::find($request->descid[$count]);
                
        //         $detail['descreption'] = $request->description[$count];
                
        //         $faqdetail->update($detail);
        //     }
        // }
        
        // $this->validate($request, [
        //     'page_name' => 'required',
        //     'title' => 'required',
        //     'url' => 'required',
        //     'descreption' => 'required',
        // ]);
        
        if(!empty($request->description)){
            foreach($request->description as $key => $itme){
                if(isset($request->old_id[$key])){
                    $detail = FaqDetails::find($request->old_id[$key]); 
                  
                }else{
                    $detail = new FaqDetails;
                }
                  $detail->faq_id = $faq->id;
                $detail['descreption'] = $request->description[$key];
                
                // Check if 'descriptionimage' exists and the file at the given key exists
                if ($request->hasFile("descriptionimage") && isset($request->file('descriptionimage')[$key])) {
                    $image = $request->file('descriptionimage')[$key];
                    
                    if ($image) {
                        $descreptionimage = time() . uniqid() . $image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH') . 'descreptionimage';
                        $image->move($destinationPath, $descreptionimage);
                        $detail->descriptionimage = $descreptionimage;
                    }
                } else {
                    // Handle the case where no image is uploaded for this key if necessary
                }
                		   	    
                		   	      //if($request->file('descriptionimage')[$key]) {
                                    
                            //         $image = $request->file('descriptionimage')[$key];
                            //         $descreptionimage =  time().uniqid().$image->getClientOriginalName();
                            //         $destinationPath = env('IMAGE_UPLOAD_PATH').'descriptionimage';
                            //         $image->move($destinationPath, $descreptionimage);
                                    
                            //         $detail['descriptionimage'] = $descreptionimage;
                                    
                            //     }
                		   	   
                		   	    $detail->save();  
                            
            }
        }
         return redirect()->route('admin.faq.index')
                        ->with('success','Faq updated successfully');
    }
    
     public function destroy(Request $request) {
         
       $delete = Faq::where('id', $request->user_id)->delete();
       
       $subdelete = FaqDetails::where('faq_id', $request->user_id)->delete();
       
        return redirect()->route('admin.faq.index')
             ->withSuccess(__('Faq deleted successfully.'));
             
    }
    
     public function descreptionDeleteSingle(Request $request){
                $id = $request->delete_id;
                $find = FaqDetails::find($id);
                $decrement = Faq::find($find->faq_id);
                $find->delete();
                return response()->json(['status' => 1]);
            }
    
    public function show($id) {
        
        return redirect()->route('admin.faq.index');
        
    }

}