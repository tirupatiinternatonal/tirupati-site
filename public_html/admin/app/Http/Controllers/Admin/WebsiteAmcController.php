<?php    
namespace App\Http\Controllers\Admin;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\WebsiteAmc;
use App\Models\WebsiteHistory;
use App\Models\AmcDetails;
use DB;
use Hash;
use Illuminate\Support\Arr;
use File;
use App\Http\Requests\StoreCoupon;
use Image;
use Helper;
class WebsiteAmcController extends Controller

{
 public function index(Request $request)
    {
        
        $data = WebsiteAmc::where('status',1)->sortable(['id' => 'DESE'])->get();  
       
        /*if($request->name!=""){        
           $query->where('name', 'like', '%'.$request->name.'%');
        }       
    
        $data = $query->sortable(['id' => 'DESE']);*/
        return view('admin.website_amc.index',compact('data'));
    }



    public function create()
    {
        return view('admin.website_amc.create');
    }



   public function store(Request $request){
       $history = WebsiteHistory::all();
       
        $this->validate($request, [
          'name' => 'required|max:255',
          'mobile' => 'required|digits:10',
         
          ]);
    
   
        $photo = "";
        if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'AMC';
                $image->move($destinationPath, $photo);
             }
             
             
        $input = $request->all();
        $status = isset($request->status) ? 1 : 0;
        $input['status'] = $status;
        $input['photo'] = $photo;
        // $slider = sliders::create($input);
 
          $enquiey = WebsiteAmc::create($input);
          $input['amc_id'] = $enquiey->id;
        $web_amc = WebsiteHistory::create($input);
     
        
       return redirect()->route('admin.website_amc.index')
                        ->with('success','Website AMC created successfully');

    }
    
    
  
    public function show($id)
    {
       $FetchData = WebsiteAmc::find($id);
       $data=AmcDetails::where('web_amc_id',$id)->get();
       return view('admin.website_amc.show',compact('FetchData','data'));
    }

    public function edit($id)
    {
        $FetchData = WebsiteAmc::find($id);
     
        $WebsiteHistory = WebsiteHistory::OrderBy('id','DESC')->where('amc_id',$id)->get();
        
        return view('admin.website_amc.edit',compact('FetchData','WebsiteHistory'));
    }

 public function update(Request $request, $id)
  {
      
        $user = WebsiteAmc::find($id);
      
        $this->validate($request, [
                  'name' => 'required|max:255',
                  'mobile' => 'required|digits:10',
                  
                  ]);
                /*   $user = sliders::find($id);*/
        $input = $request->all();
        $photo = "";
         if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'AMC';
                $image->move($destinationPath, $photo);
                $user->update($input);
                $user->update(['photo' => $photo]);
             }
    
    
        $history = new WebsiteHistory;//model name
	    $history->amc_id =$id;
	    
		$history->name = $user->name == $request->name ? NULL : $request->name;
		$history->website_name = $user->website_name == $request->website_name ? NULL : $request->website_name;
		$history->mobile = $user->mobile == $request->mobile ? NULL : $request->mobile;
		$history->email = $user->email == $request->email ? NULL : $request->email;
		$history->amc_amount = $user->amc_amount == $request->amc_amount ? NULL : $request->amc_amount;
		$history->pass_word = $user->pass_word == $request->pass_word ? NULL : $request->pass_word;
		$history->website_type = $user->website_type == $request->website_type ? NULL : $request->website_type;
		$history->user_name = $user->user_name == $request->user_name ? NULL : $request->user_name;
		$history->plan_details = $user->plan_details == $request->plan_details ? NULL : $request->plan_details;
		$history->website_link = $user->website_link == $request->website_link ? NULL : $request->website_link;
		$history->registration_date = $user->registration_date == $request->registration_date ? NULL : $request->registration_date;
		$history->amount = $user->amount == $request->amount ? NULL : $request->amount;
		$history->amc_amount = $user->amc_amount == $request->amc_amount ? NULL : $request->amc_amount;
		$history->emc_date = $user->emc_date == $request->emc_date ? NULL : $request->emc_date;
        
        
        if($history->name != NULL || $history->website_name != NULL || $history->mobile != NULL || $history->email != NULL || 
            $history->amc_amount != NULL || $history->pass_word != NULL || $history->website_type != NULL || $history->user_name != NULL || 
            $history->plan_details != NULL || $history->website_link != NULL || $history->registration_date != NULL || $history->amount != NULL || 
            $history->amc_amount != NULL || $history->emc_date != NULL){
    	    $history->save(); 
        }
        
         $status = isset($request->status) ? 1 : 0;
         $user->name  = $request->name;
         $user->website_name = $request->website_name;
         $user->mobile = $request->mobile;
         $user->email = $request->email;
         $user->amc_amount = $request->amc_amount;
         $user->pass_word = $request->pass_word;
         $user->website_type = $request->website_type;
         $user->user_name = $request->user_name;
         $user->plan_details = $request->plan_details;
         $user->website_link = $request->website_link;
         $user->registration_date = $request->registration_date;
         $user->amount = $request->amount;
         $user->status = $status;
         $user->emc_date = $request->emc_date;    
        $user->save();		
              
                return redirect()->route('admin.website_amc.index')->with('success','Website AMC Update successfully');

      	
	
    }


    public function destroy()
    {

    WebsiteAmc::find()->delete();
    return redirect()->route('admin.website_amc.index')->with('success','Website AMC deleted successfully');
    }
    
    
       
      public function amc_details(Request $request){

       if($request->isMethod('post')){
         
        $add_amc = new AmcDetails;//model name
        $add_amc->web_amc_id =$request->web_amc_id;
        $add_amc->from_date =$request->from_date;
		$add_amc->to_date =$request->to_date;
		$add_amc->description =$request->description;
		$add_amc->save();
    
        	return redirect()->route('admin.website_amc.index')->with('success','Amc Reminder successfully');
        }
        
        return view('website_amc.index');
 
     }
     
          public function amc_details_edit(Request $request){
          
            $data = AmcDetails::where('id',$request ->web_amc_id)->update(['from_date'=> $request -> from_date,'web_amc_id'=>$request ->web_amc_id,'to_date'=> $request -> to_date,'description'=> $request -> description]);

     
           	return redirect()->route('admin.website_amc.index')->with('success','Amc Reminder Update successfully');
          
              return view('website_amc.show',compact('data'));
         }
     
     
     
     
     
     
     /*
      public function edit_amc(Request $request,$id){
        $data=AmcDetails::find($id);
        
       if($request->isMethod('post')){
         
     
        $data->web_amc_id =$request->web_amc_id;
        $data->date =$request->date;
		$data->amount =$request->amount;
		$data->comment_box =$request->comment_box;
		$data->save();
    
        	return redirect()->route('admin.website_amc/'.$id)->with('success','Amc Reminder Update successfully');
        }
      
        return view('admin.amc_reminde.edit',['data'=>$data]);
 
     }
    */
     /*  public function change_status(Request $request){
       
         $FetchData = WebsiteAmc::find($request->website_amc_id);
        if($request->status_name == 'Active'){
            $FetchData->update(['status'=>0]);
            return redirect('admin/amc')->with('success','website_amc Active successfully');
        }else{
          
            $FetchData->update(['status'=>1]);
            return redirect('admin/amc')->with('success','website_amc Inactive successfully');
        }
       
       
    }*/
       
      
      
      
      public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = WebsiteAmc::find($request->webamc_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/website_amc')->with('success','Website Amc Inactive successfully');
        }else{
             $FetchData = WebsiteAmc::find($request->webamc_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/website_amc')->with('success','Website Amc Active successfully');
        }
			
    }  
    
    
    public function amc_reminder(Request $request)
    {
       $data=AmcDetails::all();

        $emailData = ['email' => 'neerajkumawat2308@gmail.com','subject' => 'Today AMC Reminder.'];
        sendMail('admin.amcreminder_email',$emailData);
        
        return view('admin.amcreminder_email');
    
    }
    
    
      /*public function change_status(Request $request){
        if($request->status_name == 'Active'){
            $FetchData = WebMeta::find($request->web_meta_id);
            $FetchData->update(['status'=>0]);
            return redirect('admin/web_meta')->with('success','Web Meta Active successfully');
        }else{
             $FetchData = WebMeta::find($request->web_meta_id);
            $FetchData->update(['status'=>1]);
            return redirect('admin/web_meta')->with('success','Web Meta Inactive successfully');
        }
		
    }*/
       
    }
 

