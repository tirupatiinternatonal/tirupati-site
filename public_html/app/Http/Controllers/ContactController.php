<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Redirect;
use Helper;
class ContactController extends Controller
{

    public function contact(Request $request){
        
    if($request->isMethod('post')){
    
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'designation'=>'required|string',
                'phone'  => 'required|numeric|unique:contacts,phone',
                'mobile' => 'required|unique:contacts,mobile',
                'email' => 'email',
                'gender' => 'required',
                'address' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zipcode'=>'required',
                'subj' => 'required',
                'organization_name' => 'required',
                'message' => 'required'
            ],[
                'phone.unique'  => 'This phone number has already submitted an enquiry.',
                'mobile.unique' => 'This mobile number has already submitted an enquiry.'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
         $filename = null;
//dd($request);
    if($request->hasFile('file'))
    {
        $file = $request->file('file');

        // Unique filename
        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

        // Folder create if not exist
        $destinationPath = public_path('assets/images/contact');
        //dd($destinationPath);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $file->move($destinationPath, $filename);
    }
    
    $contact= new Contact;//modal name
    $contact->name =$request->name;
    $contact->designation =$request->designation;
    $contact->email =$request->email;
    $contact->phone =$request->phone;
    $contact->mobile =$request->mobile;
    $contact->gender =$request->gender;
    $contact->message =$request->message;
    $contact->address =$request->address;
    $contact->country_id =$request->country;
    $contact->state_id =$request->state;
    $contact->city_id =$request->city;
    $contact->zipcode =$request->zipcode;
    $contact->subj =$request->subj;
    $contact->organization_name =$request->organization_name;
    $contact->file =$filename;
    $contact->save();
//     if (!empty($request->email)) {
//                 $emailData = [ 'name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'gender' => $request->gender,  'messages' => $request->message, 'subject' => 'Enquiry for Tirupati Hospital Management Software'];
//                 Helper::sendMail('email.email_view', $emailData);
// 		}

//  if (!empty($request->email)) {
// 						$emailData = [ 'name' =>'tirupatisoftwareinfotechpvtltd@gmail.com', 'email' =>'tirupatisoftwareinfotechpvtltd@gmail.com', 'phone' => $request->phone, 'gender' => $request->gender,  'messages' => $request->message, 'subject' => 'Enquiry for Tirupati Hospital Management Software'];
// 						Helper::sendMail('email.email_view',$emailData);
// 	}   

 $country= Country::find($request->country);
        $state= State::find($request->state);
        $city=City::find($request->city);
        $toMobile = '9588840007';
        
       $text = "Hello Tirupati Software Admin,

We have received a new contact enquiry through our website. Here are the details:

    Name: " . ($request->name ?? 'null') . "
    Designation: " . ($request->designation ?? 'null') . "
    Phone Number: " . ($request->phone ?? 'null') . "
    Mobile Number: " . ($request->mobile ?? 'null') . "
    Email: " . ($request->email ?? 'null') . "
    Gender: " . ($request->gender ?? 'null') . "
    Address: " . ($request->address ?? 'null') . "
    Country: " . ($country->name ?? 'null') . "
    State: " . ($state->name ?? 'null') . "
    City: " . ($city->name ?? 'null') . "
    Zip Code: " . ($request->zipcode ?? 'null') . "
    Interested for: " . ($request->subj ?? 'null') . "
     Organization/Company/Healthcare Institute’s Name : " . ($request->organization_name ?? 'null') . "
    Message: " . ($request->message ?? 'null') . "

Please review the details and take the necessary action to respond to this enquiry.

Thank you!";
$emailData = ['email' =>['tirupati_international@yahoo.com','tirupatisoftwareinfotechpvtltd@gmail.com'], 'name' =>$request->name, 'userEmail' =>$request->email, 'phone' => $request->phone,'messages'=>$request->message,'apply'=>$request->subj,'citys'=>$city->name,'state'=>$state->name,'country'=>$country->name, 'gender' => $request->gender, 'address' => $request->address,  'city' => $request->city, 'age' => $request->age, 'apply_for' => $request->apply_for, 'education' => $request->education, 'pin' => $request->pin, 'image' => $request->photo, 'subject' => 'New Contact Enquiry Received!'];
	

	Helper::sendMail('email.contact_mail',$emailData);
	
         Helper::sendWhatsappMessage($toMobile, $text);
            
    return redirect::to('contact')->with('success','Your Enquiry Has Been Submitted Seccsfully, Our Executive will Connect Shortly');
    
}
    

        return view('contact.contact');
    }
    
    public function checkMobile(Request $request)
    {
        $exists = Contact::where('mobile', $request->mobile)->exists();

        return response()->json([
        'exists' => $exists
        ]);
    }
    
    public function checkPhone(Request $request)
    {
        $exists = Contact::where('phone', $request->phone)->exists();

        return response()->json([
        'exists' => $exists
        ]);
    }
    
    public function payNow(Request $request){
        if($request->isMethod('post')){
            $contact = new Contact;
             $contact->name =$request->name;
            $contact->email =$request->email;
            $contact->phone =$request->phone;
            $contact->gender =$request->gender;
            $contact->message =$request->message;
            $contact->amount = $request->amount;
            dd($contact);
        }
        return view('contact.payNow');
    }
    
    
    public function faq(Request $request){
        
        return view('faq');
        
    }
     
    
    public function faqDetails(Request $request){
        
        return view('faq-details');
        
    }
    
    public function countryData(Request $request,$id){
        if(!empty($id)){
            $getState = array();      
         
            $getState = State::where('country_id',$id)->get();
            
            $stateData ='<option value="">Select</option>';
            foreach($getState as $state)
            {
              $stateData.='
              <option value="'.$state->id.'">'.$state->name.'</option>';
            }
          echo $stateData;
        } 
    }
       
    
    public function stateData(Request $request,$id){
        if(!empty($id)){
            $getState = array();      
         
            $getState = City::where('state_id',$id)->get();
            
            $cityData ='<option value="">Select District</option>';
            foreach($getState as $city){
                $cityData.='<option value="'.$city->id.'">'.$city->name.'</option>';
            }    
            echo $cityData;
        } 
    }
    
    public function googleReview(Request $request){
        return view('googleReview');
    }
    
    public function bookAppointment(Request $request){
        return view('bookAppointment');
    }
    
    public function diagnosticReport(Request $request){
        return view('diagnosticReport');
    }
    
    public function patientPortal(Request $request){
        return view('patientPortal');
    }
    
}