<?php
namespace App\Http\Controllers\Api;   

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\Clint;
use App\Models\About;
use App\Models\Faq;
use App\Models\Chat;
use App\Models\NewsLetter;
use App\Models\Services;
use App\Models\ServiceDetail;
use App\Models\UserDocument;
use App\Models\ServiceDocuments;
use App\Models\User;
use App\Models\Docs;
use App\Models\DocType;
use App\Models\Coupon;
use App\Models\OrderRequiredDocuments;
use App\Models\NewsEvent;
use App\Models\UserGstin;
use App\Models\State;
/*use App\Models\Route;*/
use App\Models\Contacts;
use App\Models\Notification;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use File;
use URL;
use Image;
use Carbon;
use Response;

   
class SettingController extends BaseController
{
	public function setting(Request $request){			

		 try {			
			$setting = Setting::first();			
			$data = array(
				'logo'=>URL::asset('public/uploads/logo/'.$setting->logo),
				'name'=>$setting->name,
				'email'=>$setting->email,
				'phone'=>$setting->phone,
				'facebook_link'=>$setting->facebook_link,
				'youtube_link'=>$setting->youtube_link,
				'twitter_link'=>$setting->twitter_link,
				'tin_no'=>$setting->tin_no,
				'address'=>$setting->address,
				'pincode'=>$setting->pincode,
			);
			return $this->sendResponseData($data, 'success');         
		} catch (Exception $e) {
			return $this->sendError('Validation Error.', 'Error');            
		}
	}

    public function about(Request $request ){			

		 try {			
			$about = About::get()->first();
		$data = array(
				'photo'=>env('IMAGE_SHOW_PATH').'about/'.$about->photo,
				'name'=>$about->name,
				'short_description'=>$about->short_description,
				'long_description'=>$about->long_description,

			);  
            return  response()->json(['status'=>true,'message'=>'success','data'=>$data ],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function privacy_policy(Request $request){			
		 try {			
			$setting = Setting::get()->first();
			$data =$setting->privacy_policy;
	       
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Privacy Policy Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function terms_conditions(Request $request){			
	try {			
			$setting = Setting::get()->first();
			$data =$setting->terms_and_conditions;
	          
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Terms And Conditions Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	public function contact_us(Request $request){			
        try {			
			$setting = Setting::get()->first();
			$data =$setting->contact_us;
	         
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Contact Us Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function service(Request $request){			
        try {			
			$setting = Setting::get()->first();
			$data =$setting->service;
	         
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Service Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function contactUs(Request $request){			
        try {			
			$setting = Setting::get()->first();
			$data =$setting->contact_us;
	         
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Contact Us Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function chat(Request $request,$order_id){	
	  
        try {			
				$chat = Chat::select('chats.*','user.name as user_name')
            ->leftjoin('users as user','user.id','chats.user_id')->where('chats.order_id',$order_id)->get();
             
			$data = array();
			foreach ($chat as $item) {
					$data[] = array(
					'id' => $item->id,
			       	'user_id' => $item->user_id,
					'rm_user_id' => $item->rm_user_id,
					'ca_user_id' => $item->ca_user_id,
					'order_id' => $item->order_id,
					'role_id' => $item->role_id,
					'message' => $item->message,
					'name'=>$item->user_name,
					'created_at'=>$item->created_at,
					
					);
			}
	         
            return  response()->json(['status'=>true,'message'=>'Chat Data','data'=>$data],200 );       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function blog(Request $request ){			

		 try {		
		     $blog =  Blog::where('status',1)->orderBy('id','DESC')->take(2)->get();
		     $category_blog =  Blog::where('status',1)->orderBy('id','DESC')->take(4)->get();
		     $recents =  Blog::where('status',1)->orderBy('id','DESC')->take(3)->get();
			
				$list = array();
			foreach ($blog as $data) {
					$list[] = array(
					'id' => $data->id,
					'name' => $data->name,
					'status' => $data->status,
					'author' => $data->author,
					'remark' => $data->remark,
					'created_at' =>date('M-Y', strtotime($data['created_at'])),
					'ck_editor' => $data->ck_editor,
					'backlings' => $data->backlings,
					'photo' => env('IMAGE_SHOW_PATH').'blog/'.$data->photo,
					);
			}
			$category =array();
				foreach ($category_blog as $data) {
					$category[] = array(
					'category' => $data->category
					);
			}
			
			$recent  = array();
				foreach ($recents  as $recent_data) {
					$recent[] = array(
					'id' => $recent_data->id,
					'name' => $recent_data->name,
					'author' => $recent_data->author,
					'ck_editor' => $recent_data->ck_editor,
					'created_at' =>date('M-Y', strtotime($recent_data['created_at'])),
					'remark' => $recent_data->remark,
					'photo' => env('IMAGE_SHOW_PATH').'blog/'.$recent_data->photo,
					);
			}
			
			if(count($list) > 0){
				 return  response()->json(['status'=>true,'message'=>'Blog Data','data'=>$list,'category'=>$category,'recent_blog'=>$recent ],200 );
			}
			else{
				$list = '';
				return $this->sendResponseData($list, 'No Record Found');
			}
			
            return  response()->json(['status'=>true,'data'=>$blog ,'message'=>"About Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function blogDetail(Request $request,$id ){			

		 try {		
		     $blog_detail =  Blog::where('id',$id)->first();
		     $img_path = env('IMAGE_SHOW_PATH').'blog/';
		     $blog =  Blog::where('status',1)->orderBy('id','DESC')->take(2)->get();
		     $category_blog =  Blog::where('status',1)->orderBy('id','DESC')->take(4)->get();
		     $recents =  Blog::where('status',1)->orderBy('id','DESC')->take(3)->get();
			
				$list = array();
			foreach ($blog as $data) {
					$list[] = array(
					'id' => $data->id,
					'name' => $data->name,
					'status' => $data->status,
					'author' => $data->author,
					'remark' => $data->remark,
					'created_at' =>date('M-Y', strtotime($data['created_at'])),
					'ck_editor' => $data->ck_editor,
					'backlings' => $data->backlings,
					'photo' => env('IMAGE_SHOW_PATH').'blog/'.$data->photo,
					);
			}
			$category =array();
				foreach ($category_blog as $data) {
					$category[] = array(
					'category' => $data->category
					);
			}
			
			$recent  = array();
				foreach ($recents  as $recent_data) {
					$recent[] = array(
					'id' => $recent_data->id,
					'name' => $recent_data->name,
					'author' => $recent_data->author,
					'ck_editor' => $recent_data->ck_editor,
					'created_at' =>date('M-Y', strtotime($recent_data['created_at'])),
					'remark' => $recent_data->remark,
					'photo' => env('IMAGE_SHOW_PATH').'blog/'.$recent_data->photo,
					);
			}
			
			if(count($list) > 0){
				 return  response()->json(['status'=>true,'message'=>'Blog Data','blogDetail'=>$blog_detail,'imgPath'=>$img_path,'data'=>$list,'category'=>$category,'recent_blog'=>$recent ],200 );
			}
			else{
				$list = '';
				return $this->sendResponseData($list, 'No Record Found');
			}
			
            return  response()->json(['status'=>true,'data'=>$blog ,'message'=>"About Data"],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	public function our_clints(Request $request ){			

		 try {		
		     $clint =  Clint::where('status',1)->orderBy('id','DESC')->get();

				$list = array();
			foreach ($clint as $data) {
					$list[] = array(
					'id' => $data->id,
					'name' => $data->name,
					'photo' => env('IMAGE_SHOW_PATH').'clints/'.$data->photo,
					);
			   }
			
			if(count($list) > 0){
				 return  response()->json(['status'=>true,'message'=>'Our Clints Data','data'=>$list],200 );
			}
			else{
				$list = '';
				return $this->sendResponseData($list, 'No Record Found');
			}
			
            
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
		 
	}
	
	public function getEvent(Request $request ){			

		 try {		
		     $event =  NewsEvent::where('status',1)->where('role_id',2)->orderBy('id','DESC')->get();
		     
		     	$data = array();
			foreach ($event as $item) {
					$data[] = array(
					'id' => $item->id,
			       	'title' => $item->title,
					'date' => date('d', strtotime($item->date)),
					'month' => date('M', strtotime($item->date)),
					'time' => $item->time,
					'event_description' => $item->event_description,
					
					);
			}
		
			 return  response()->json(['status'=>true,'message'=>'success','event'=>$data ],200);       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
		
	}
	
	public function email_subscription(Request $request)   {
		$validator = Validator::make($request->all(), [          
			'email' => 'required|email|unique:news_leters,email',
			]
			);
			try {		
		     $input = $request->all();
            $subscription = NewsLetter::create($input);
    				$success = '';						
    				return $this->sendResponseData($success, 'Success');   
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
			
			
			            
    			
			}
	
	public function chat_text(Request $request)   {
		$validator = Validator::make($request->all(), [          
			'message' => 'required'
			]
			);
			try {		
		     $input = $request->all();
            $chat_text = Chat::create($input);
    				$success = '';						
    				return $this->sendResponseData($success, 'Success');   
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Chat Went Wrong');            
		}
			       
    			
			}
			
			
			public function getServices (Request $request, $page_name){	
			    
        try {			
			$data = Services::select('services.*','details.price','details.category','details.short_des','details.id as service_detail_id')
        ->leftjoin('service_details as details','details.service_id','services.id')->where('services.page_name',$page_name)->take(3)->get();
	         
            return  response()->json(['status'=>true,'data'=>$data ,'message'=>"Service Detail Data"],200);       
		} 
		catch (Exception $e) {
		    
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
			public function uploadOrderDocument (Request $request,$id,$user_id){	
			    
        try {			
				$order_document = OrderRequiredDocuments ::where('order_id',$id)->where('user_id',$user_id)->get();
          
              $documentList = array();
			foreach ($order_document as $item) {
					$documentList[] = array(
					'id' => $item->id,
					'name' => $item->documents,
					'status' => $item->status,
					'files' => $item->files,
					'files_name' => $item->files_name,
					'documents' => $item->documents,
			       
					
					);
			}
			
            return  response()->json(['status'=>true,'message'=>'Chat Data','data'=>$documentList],200 );       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
			
			
	public function user_document (Request $request)   {
	   
		$validator = Validator::make($request->all(), [          
			'mobile' => 'required',
			'aadhar_no' => 'required',
 			'address' => 'required',
		    'pan_no' => 'required',
			'aadhar_image' => 'required',
			'pan_image' => 'required'
			]
			);
			try {		
		     
            $user = User::find($request->id);
            $user->update(['mobile'=>$request->mobile,'address'=>$request->address,'doc_status'=>1]);
            $user_doc = UserDocument::where('user_id',$request->id)->first();
           
           if(!empty($user_doc))
           {
               
               return $this->sendError('message', 'Documents are already updated');   
           }
           else
           {
                $user_document = new UserDocument;
		     $user_document->user_id = $user->id;
		     $user_document->pan_no = $request->pan_no;
		     $user_document->aadhar_no = $request->aadhar_no;
		     
		      $photo = "";
		      $photo1 = "";
         if($request->file('aadhar_image')){
            
                $image = $request->file('aadhar_image');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'user_documents';
                $image->move($destinationPath, $photo);
              }
         if($request->file('pan_image')){
            
                $image = $request->file('pan_image');
                $path = $image->getRealPath();      
                $photo1 =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'user_documents';
                $image->move($destinationPath, $photo1);
              }

		    $user_document->aadhar_image = $photo;
		    $user_document->pan_image = $photo1;
		    $user_document->save();
           
       
           }
          
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Something Went Wrong');            
		}
			       
	}
	
	
	
	public function getServiceDetail (Request $request){
	   
	   try{
	       	$data = ServiceDetail::select('service_details.*','service.name','service.id as s_id','service.ca_share')
        ->leftjoin('services as service','service.id','service_details.service_id')->where('service_details.id',$request->id)->first();
        
         
         
        return  response()->json(['status'=>true,'data'=>$data,'message'=>"Service Detail Data"],200); 
	   }
	   
	   catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
	    
	    
	}
	
	public function getUserInfo (Request $request,$user_id){
	   
	   try{
	       	$get_info = User::select('users.*','document.cin','document.company_name','document.incorporation_date','document.fathers_name','document.dob'
	                                 ,'document.pan_no','document.aadhar_no','document.house_no','document.area','document.pincode','document.city','document.state'
	                                 ,'document.code','document.ifsc','document.bank_name','document.bank_account_no')
        ->leftjoin('user_documents as document','document.user_id','users.id')->where('users.id',$user_id)->first();
            $states = State::where('country_id','101')->orderBy('name')->get();
            
        return  response()->json(['status'=>true,'data'=>$get_info,'message'=>"User Data",'states'=>$states],200); 
	   }
	   
	   catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
	    
	    
	}
	
	
	
	

		public function orderPurchased(Request $request)   {
		   
		$validator = Validator::make($request->all(), [          
		'email' => 'required|email'
			]
			);
			try {		
			    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                
                // shuffle the result
                $string = str_shuffle($pin);
        
		     $user = User::where('id',$request->user_id)->first();
		    
		     $serviceDetail = ServiceDetail::where('id',$request->service_id)->first();
	
		             $order_detail = new OrderDetail;
        		     $order_detail->user_id = $user->id;
        		     $order_detail->transaction_no = $request->transaction_no;
        		     $order_detail->order_no = $string;
        		     $order_detail->service_detail_id = $serviceDetail->id;
        		     $order_detail->service_id = $serviceDetail->service_id;
        		     $order_detail->amount = ($serviceDetail->price);
        		     $order_detail->payment_mode = $request->payment_mode;
        		     $order_detail->ca_share = $request->ca_share;
        		     $order_detail->coupon_id = $request->coupon_id;
        		     $order_detail->coupon_discount = $request->coupon_discount;
        		     $order_detail->coupon_code = $request->coupon_code;
        		     $total = ($serviceDetail->price)-(($serviceDetail->price)*$request->coupon_discount/100);
        		     $order_detail->total_amount = $total + $total*18/100;
        		     $order_detail->date = date('Y-m-d');
        		     $order_detail->save();
		     
		     	$service_document = ServiceDocuments ::where("service_id",$serviceDetail->service_id)->pluck('document_types_id')->first();
          
              	$data = array(); 
              foreach(explode(',', $service_document) as $key=>$info) 
                {
                   $data[$key] = (Int)$info;
                }
               
              
               for($i=0; $i < count($data) ; $i++)
               {
                   $service_item = DocType::where('id',$data[$i])->first();
                    $order_documents = new OrderRequiredDocuments;
		     $order_documents->user_id = $user->id;
		     $order_documents->order_id = $order_detail->id;
		     $order_documents->documents = $service_item->name;
		       $order_documents->save();
		      
               }
               
              	$success = '';	
    				 return  response()->json(['status'=>true,'message'=>"Order Purchased Successfully"],200); 
		      	
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
			
			
			            
    			
			}
	
	public function getOrderList(Request $request,$user_id){			
        try {			
            $order_detail = OrderDetail::select('order_details.*','service.name')
        ->leftjoin('services as service','service.id','order_details.service_id')->where('order_details.user_id',$user_id)->get();
        
        
			$data  = array();
				foreach ($order_detail  as $item) {
					$data[] = array(
					'id' => $item->id,
					'name' => $item->name,
					'user_id' => $item->user_id,
					'service_id' => $item->service_id,
					'order_no' => $item->order_no,
					'created_at' =>date('d-M', strtotime($item['created_at'])),
					
					);
			}
	         
            return  response()->json(['status'=>true,'message'=>'Order Data','data'=>$data],200 );       
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	
	public function editProfile(Request $request)   {
		$validator = Validator::make($request->all(), [          
			'name' => 'required',
			'address' => 'required',
			'mobile' => 'required',
			'pan_no' => 'required',
			'aadhar_no' => 'required',
			'aadhar_image' => 'required',
			'pan_image' => 'required',
			
			]
			);
			try {		
		     
            $edit_profile = User::where('id',$request->id)->get()->first();
            $edit = UserDocument::where('user_id',$request->id)->get()->first();
           
              $photo = "";
		      $photo1 = "";
         if($request->file('aadhar_image')){
            
                $image = $request->file('aadhar_image');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'user_documents';
                $image->move($destinationPath, $photo);
                $edit->update(['aadhar_image' => $photo]);
              }
         if($request->file('pan_image')){
            
                $image = $request->file('pan_image');
                $path = $image->getRealPath();      
                $photo1 =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'user_documents';
                $image->move($destinationPath, $photo1);
                $edit->update(['pan_image' => $photo1]);
              }
              
       

		    $edit_profile->update(['name'=>$request->name,'address'=>$request->address,'mobile' => $request->mobile]);
		    
		   		    $edit->update(['aadhar_no'=>$request->aadhar_no,'pan_no'=>$request->pan_no]);
            
    				$success = '';						
    				return $this->sendResponseData($success, 'Success');   
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Chat Went Wrong');            
		}
			       
    			
			}
			
		
		
		public function getNotification(Request $request ){			

		 try {		
		     $notification =  Notification::where('status',1)->get();
            
				$alert = array();
			foreach ($notification as $data) {
					$alert[] = array(
					'id' => $data->id,
					'message' => $data->message,
					'created_at' =>date('d-M', strtotime($data['created_at'])),
				        
					);
			   }
			
			if(count($alert) > 0){
				 return  response()->json(['status'=>true,'message'=>'Our Clints Data','data'=>$alert],200 );
			}
			else{
				$alert = '';
				return $this->sendResponseData($alert, 'No Record Found');
			}
			
            
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
		 
	}	
	
		public function getFaq(Request $request){			

		 try {		
		     $faq =  Faq::where('status',1)->where('page_name',$request->page_name)->orderBy('id','DESC')->take(6)->get();
		    
				$list = array();
			foreach ($faq as $data) {
					$list[] = array(
					'id' => $data->id,
					'question' => $data->question,
					'answer' => $data->answer,
					);
			}
		
			if(count($list) > 0){
				 return  response()->json(['status'=>true,'message'=>'Faq Data','data'=>$list],200 );
			}
			else{
				$list = '';
				return $this->sendResponseData($list, 'No Record Found');
			}
			
          
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}
	}
	
	
		public function getContacts(Request $request){			
        $validator = Validator::make($request->all(), [          
			'email' => 'required|email',
			'name' => 'required',
			'number' => 'required',
			'mobile' => 'required',
			'query' => 'required'
			]
			);
			try {		
			    $contacts =  Contacts ::where('page_name',$request->page_name)->get();
		     $input = $request->all();
            $contacts = Contacts ::create($input);
    				$success = '';						
    				return $this->sendResponseData($success, 'Success');   
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
		

    }
        
        
    
		public function userInfo(Request $request){			
        /*$validator = Validator::make($request->all(), [          
			'email' => 'required|email',
			'name' => 'required',
			'number' => 'required',
			'mobile' => 'required',
			'query' => 'required'
			]
			);*/
			try {	
			    $info =  UserDocument ::where('user_id',$request->id)->first();
			    
			         //$info->user_id = $request->i;
                     $info->fathers_name = $request->fathers_name;
        		     $info->cin = $request->cin;
        		     $info->company_name = $request->company_name;
        		     $info->incorporation_date = $request->incorporation_date;
        		     $info->gender = $request->gender;
        		     $info->state = $request->state;
        		     $info->pan_no = $request->pan_no;
        		     $info->aadhar_no = $request->aadhar_no;
        		     $info->city = $request->city;
        		     $info->dob = $request->dob;
        		     $info->house_no = $request->house_no;
        		     $info->area = $request->area;
        		     $info->code = $request->code;
        		     $info->ifsc = $request->ifsc;
        		     $info->bank_name = $request->bank_name;
        		     $info->house_no = $request->house_no;
        		     $info->pincode = $request->pincode;
        		     $info->bank_account_no = $request->bank_account_no;
        		     $info->save();
           
        		   	$info1 = User :: where('id',$request->id)->first();
            		$info1->first_name = $request->first_name;
            		$info1->last_name = $request->last_name;
            		$info1->mobile = $request->mobile;
            		$info1->email = $request->email;
            	    $info1->save();
        		
        		     
    		 	$get_info = User::select('users.*','document.cin','document.company_name','document.incorporation_date','document.fathers_name','document.dob'
	                                 ,'document.pan_no','document.aadhar_no','document.house_no','document.area','document.pincode','document.city','document.state'
	                                 ,'document.code','document.ifsc','document.bank_name','document.bank_account_no')
        ->leftjoin('user_documents as document','document.user_id','users.id')->where('users.id',$request->id)->first();
        
            
        return  response()->json(['status'=>true,'data'=>$get_info,'message'=>"User Data"],200); 
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
		

    }
    
    
    
		public function getOrderInvoice(Request $request,$order_id){			
       
		try {		
		     $order_details =  OrderDetail ::where('id',$order_id)->get();
		     
		return  response()->json(['status'=>true,'data'=>$order_details ,'message'=>"Order Details"],200);     
		
		} catch (Exception $e) {
			return $this->sendError('Data Empty.', 'Error');            
		}

    }
    
		public function getCoupon(Request $request){			
        
			try {		
			    $coupon = Coupon::where('page_name',$request->route)->where('coupon_code',$request->coupon)->get();
            	if(count($coupon)>0){            
			 return  response()->json(['status'=>true,'message'=>'Coupon Code','coupon_code'=>$coupon],200 );
			    }else{
			         return  response()->json(['status'=>false,'message'=>'Coupon Code','coupon_code'=>$coupon],200 );
			    }
            
		      } 
            	catch (Exception $e) {
		    	return $this->sendError('message', 'Somthing Went Wrong');            
		   }
		        }
    
		public function editProfileImage(Request $request){	
        $validator = Validator::make($request->all(), [          
			'photo' => 'required'
			]
			);
			try {		
			    $data =  User ::find($request->id);
			   
        $photo = "";
         if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'profile';
                $image->move($destinationPath, $photo);
              }
         $data->update(['photo' => $photo]);
         $updatedImage = User ::find($request->id);
         $image = env('IMAGE_SHOW_PATH').'profile/'.$updatedImage->photo;
    				 return  response()->json(['status'=>true,'message'=>'Image Updated Successfully','updatedImage'=>$image],200 );
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
		

    }
    
    public function userGstinDetails(Request $request)   {
		$validator = Validator::make($request->all(), [          
			'gstin' => 'required',
			'firm_name' => 'required',
			'firm_address' => 'required',
			'pin_code' => 'required',
			]
			);
			try {		
		     $input = $request->all();
            $gstin = UserGstin::create($input);
    				$success = '';						
    				return $this->sendResponseData($success, 'Success');   
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Chat Went Wrong');            
		}
			       
    			
			}
    
    		public function orderDocument(Request $request){	
        $validator = Validator::make($request->all(), [          
			'id' => 'required',
			'files' => 'required'
			]
			);
			try {		
			    $data =  OrderRequiredDocuments ::find($request->id);
			   
        $document = "";
         if($request->file('files')){
            
                $image = $request->file('files');
                $path = $image->getRealPath();      
                $document =  time().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'orderDocuments';
                $image->move($destinationPath, $document);
              }
              
              
         $data->update(['files' => $document,'status'=>1,'files_name' =>$image ]);
    				 return  response()->json(['status'=>true,'message'=>'document uploaded Successfully'],200 );
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somthing Went Wrong');            
		}
		

    }
   
	public function downloadOrderDocuments(Request $request){
        $download = OrderRequiredDocuments::find($request->id);
        $image =  'http://accounts.fivestarmart.in/accountimage/'.'orderDocuments/'.$download['files'];
       // return Response::download($image);

        return  response()->json(['status'=>true,'message'=>'File Found','file_url'=>$image],200 );
        
}


    public function userPersonalInfo(Request $request)   {

			try {		
            $user_document  = UserDocument::where('user_id',$request->user_id);
            $user_document->update
            (['cin'=>$request->cin,
            'company_name'=>$request->company_name,
            'incorporation_date'=>$request->incorporation_date,
            'fathers_name'=>$request->fathers_name,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'pan_no'=>$request->pan_no,
            'aadhar_no'=>$request->aadhar_no,]);
            
            $user  = User::where('id',$request->user_id);
            $user->update
            (['first_name'=>$request->first_name,
            'last_name'=>$request->last_name,]);
            
    			 return  response()->json(['status'=>true,'message'=>'Persnol Info Saved Successfully'],200 );
			
		if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
            
		} 
		
		catch (Exception $e) {
			return $this->sendError('message', 'Somethig went wrong');            
		}
			       
    			
			}

}
