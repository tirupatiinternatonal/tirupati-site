<?php

namespace App\Http\Controllers\Api;   
use Illuminate\Http\Request;
use App\Models\WebUser;
use App\Models\User;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use File;
use URL;
use Image;
use Carbon;
use App\Helpers\helpers;
use Mail;

   
class LoginController extends BaseController
{   

    	/** profile api  **/
    	
		public function profile(Request $request,$user_id){
		    	
			$request_data = $request->json()->all();
			
		    $data = $this->user_data($user_id);
		
		 return  response()->json(['status'=>true,'message'=>'User Profile','data'=>$data],200 );
		}
		
		
        	/** user_data  **/
		function user_data($id){
          
            $user_profile = User::select('users.*','document.aadhar_image','document.pan_image','document.aadhar_no','document.pan_no')
            ->leftjoin('user_documents as document','users.id','document.user_id')->where('users.id',$id)->first();
				$image_url1 ="";
				$image_url2 ="";
				$image_url3 ="";
			if($user_profile){
				if(!empty($user_profile->photo)){ 
					$image_url1 =  env('IMAGE_SHOW_PATH').'/profile/'.$user_profile->photo;				
					}else{
					$image_url1 = '';
				}
				if(!empty($user_profile->aadhar_image)){ 
					$image_url2 =  env('IMAGE_SHOW_PATH').'/user_documents/'.$user_profile->aadhar_image;				
					}else{
					$image_url2 = '';
				}
				if(!empty($user_profile->pan_image)){ 
					$image_url3 =  env('IMAGE_SHOW_PATH').'/user_documents/'.$user_profile->pan_image;				
					}else{
					$image_url3 = '';
				}
				
				$user_data =  array(			        
				'id'=> $user_profile->id,			
				'name'=> $user_profile->name,
				'email'=>$user_profile->email,
				'mobile'=> $user_profile->mobile,						
				'address'=> $user_profile->address,	
				'doc_status'=>$user_profile->doc_status,	 
				'aadhar_no'=>$user_profile->aadhar_no,	 
				'pan_no'=>$user_profile->pan_no,	 
				'photoURL'=> $image_url1,
				'aadhar_image'=> $image_url2,
				'pan_image'=> $image_url3,
			
				);	

				return $user_data;
				}else{
				return '';	
			}
		}
		
		/** update api  **/
		public function update(Request $request){	
		    $request_data = $request->json()->all();
			try {
				$FetchData = WebUser::find($request_data['user_id']);
				// upload Photo
				$destinationPath = env('IMAGE_SHOW_PATH').'/profile/';			
				$name = '';
				if($request->hasFile('uploadFile')){
					if(!empty($FetchData->image) ){
						$file_path=  env('IMAGE_SHOW_PATH').'/profile/';
						unlink($file_path);
					}
					$image = $request->file('uploadFile');				
					$name=$image->getClientOriginalName();
					$extension = $image->getClientOriginalExtension();  //Get Image Extension
					$name = round(microtime(true) * 1000).'.'.$extension;									
					$image->move($destinationPath, $name);
					
					}else{
					$name = $FetchData->image;
				}
				// end photo		
				$request->merge(["image"=>$name]);		
				$FetchData->update($request_data);		
				//$success =  $this->user_data($request_data['user_id']);				
				//return $this->sendResponseData($success, 'Receive success'); 
			    	return $this->sendResponse('', 'Update Date success');    
				} catch (Exception $e) {
				return $this->sendError('Validation Error.', 'Receive Error');            
			}
		}
		
			/** Login api  **/
		public function login(Request $request)   {
			$request_data = $request->json()->all();
		$validator = Validator::make($request->all(), [          
          	
            'password' => 'required',            
			'email' => 'required',
			]
			);
			
			if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
			
				$user = User::where("email",$request->email)->first();
				
    			
    			if($user){
    			    if(Hash::check($request->password,$user->password)){ 
    				$success = array_merge($this->user_data($user->id));						
    				return $this->sendResponseData($success, 'Success');               
    			    }else{
    				return $this->sendError('Validation Error.', 'Invalid Password');
    			    }
    				}else{
    				return $this->sendError('Validation Error.', 'No Found user Error');
    			}
    			
			}
			
		public function resetPass(Request $request)   {
			$data = $request->json()->all();
		$validator = Validator::make($request->all(), [          
          	
            'password' => 'required',            
			'email' => 'required',
			]
			);
			
			if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
			 
    			$input = $request->all();
            $user = User::create($input);
            $pass=$user->where('email',$user->email)->update(['password'=>Hash::make($request->password)]);
			$success = '';						
			return $this->sendResponseData($success, 'Success');
             
    			
			}
			
	
			
		public function forgetPass(Request $request)   {
			$forget = $request->json()->all();
		$validator = Validator::make($request->all(), [          
			'email' => 'required',
			]
			);
			
			if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
			$user = User::where("email",$request->email)->first();
			if($user){
                     $otp = mt_rand(1000, 9999);
                     return  response()->json(['status'=>true,'message'=>'forget password otp','otp'=>$otp],200 );
                    
                    }
    				else{
    				return $this->sendError('Validation Error.', 'No Found user Error');
    			}
    	}
/** SignUp api  **/
		public function signUp(Request $request)   {
		$validator = Validator::make($request->all(), [          
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'mobile' => 'required',
			'password' => 'required',
			]
			);
			
			
			if($validator->fails()){            
				return $this->sendError('Validation Error.', $validator->messages()->first());
			}
		    
			$input = $request->all();
            $user = User::create($input);
            $pass=$user->where('id',$user->id)->update(['password'=>Hash::make($request->password),'show_password'=>$request->password]);
             $userDocument = new UserDocument;
                     $userDocument->user_id = $user->id;
        		     $userDocument->save();
           
         
            $data = $this->user_data($user->id);
              if(!empty($data)){
    				  return  response()->json(['success'=>true,'message'=>'Sign Up Completed','data'=>$data],200 );
              }
              
              else{
                  return  response()->json(['message'=>'Somthing Went Wrong'],200 );
              }
    			
			}
		
}

