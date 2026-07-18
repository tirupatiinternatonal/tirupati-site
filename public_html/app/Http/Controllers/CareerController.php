<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Career;
use Redirect;
use Helper;

class CareerController extends Controller
{

    public function career(Request $request) {

         $photo = "";
 
        if($request->isMethod('post')){
            //dd($request);
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'gender' => 'required',
                'age' => 'numeric',
                'education' => 'required',
                'apply_for' => 'required',
                'address' => 'required',
                'city' => 'required',
                'pin' => 'required|numeric',
                'photo' => 'required'
               
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
             if($request->file('photo')){
            
                $image = $request->file('photo');
                $path = $image->getRealPath();      
                $photo =  time().uniqid().$image->getClientOriginalName();
                $destinationPath =public_path('resume/');
                $image->move($destinationPath, $photo);
             }
            
    
            $Career= new Career;//modal name
            $Career->name =$request->name;
            $Career->email =$request->email;
            $Career->phone=$request->phone;
            $Career->gender =$request->gender;
            $Career->address =$request->address;
            $Career->age =$request->age;
            $Career->apply_for =$request->apply_for;
            $Career->education =$request->education;
            $Career->city =$request->city;
            $Career->pin =$request->pin;
            $Career->image =$photo;
            $Career->save();
        
            $toMobile = '9588840007';
            $text = "Hello Tirupati Software Admin,
            
            We have received a new career enquiry through our website. Here are the details:
            
                Name: {$request->name}
                Email: {$request->email}
                Phone Number: {$request->phone}
                Gender: {$request->gender}
                Address: {$request->address}
                Age: {$request->age}
                Position Applied For: {$request->apply_for}
                Education: {$request->education}
                City:{$request->city}
                Pin:{$request->pin}
                
            
            Please review the details and follow up as necessary.
            
            Thank you!";

           
 
       
         

            $filepath =   url('resume') .'/'. $photo;



	        $emailData = [ 'name' =>$request->name, 'email' =>['tirupatisoftwareinfotechpvtltd@gmail.com','tirupati_international@yahoo.com'], 'phone' => $request->phone,'userEmail' => $request->email, 'gender' => $request->gender, 'address' => $request->address,  'city' => $request->city, 'age' => $request->age, 'apply_for' => $request->apply_for, 'education' => $request->education, 'pin' => $request->pin, 'image' => $request->photo, 'subject' => 'New Career Enquiry Received!'];
	
	
        	Helper::sendMail('email.carrer_mail',$emailData);
        	
             Helper::sendWhatsappMessage($toMobile, $text, $filepath);

   
            return redirect::to('career')->with('success','Your Application Has been Submitted Secussfully, Our HR Team Will Connect You');
    
        }

        return view('career');
    }
   

    public function careerjd(Request $request) {

        return view('career-jd');
    }
   


}