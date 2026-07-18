<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Hospital;
use App\Models\Testresult;
use App\Models\Medicine;
use App\Models\Libinfosystem;
class RadioController extends Controller
{

    public function radio(Request $request){
        if($request->isMethod('POST')){
            $uhid = $request->uhid_no;
            //dd($request);
            $rad_rec_no = $request->rx_rec_no;
            $rad_id = $request->rx_id;
            $patient_data = Hospital::where('streg',$uhid)->first();
            if(!empty($patient_data)){
              $record = Libinfosystem::where('hospital_id',$patient_data->id)->where('lab_no',$rad_rec_no)->first();
         //  dd($record);
              if(!empty($record))
              {
                 // dd($record['id']);
                  $test_tresult = Testresult::where('libinfosystem_id',$record->id)->where('lab_rec_id',$rad_id)->where('report_status','=','0')->first(); 
          //  dd($test_tresult);
                if(!empty($test_tresult)){
                    $hospital_id = $patient_data->id;
                $test_result_id = $test_tresult->id;
                                $testid = $test_tresult->test_id;
                       // dd($test_result_id);
                        
                   return  redirect('https://tirupatihms.com/hms/libsystems/img_text_report_redilogy/'.$record['id'].'/0/1/'.$test_result_id);
                }
                
                else {
                ?>
                    
                 <script>
                     alert("Report Not Found !");
                 </script>  
                   
               <? }
              }
              
             
            }
             
            
            
            
        }
        return view('radio');
    }


}