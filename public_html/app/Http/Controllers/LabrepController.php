<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Libinfosystem;
use App\Models\Hospital;
use App\Models\Testresult;
use App\Models\Medicine;
class LabrepController extends Controller
{

    public function labrep(Request $request){
        if($request->isMethod('POST')){
             
            $uhid = $request->uhid_no;
            
            $lab_rec_no = $request->lab_rec_no;
            $lab_id = $request->lab_id;
            $patient_data = Hospital::where('streg',$uhid)->first();
            
            if(!empty($patient_data)){
              $record = Libinfosystem::where('hospital_id',$patient_data->id)->where('lab_no',$lab_rec_no)->first();
       //       dd($record);
              if(!empty($record))
              {
                  //dd($record['id']);
                  $test_tresult = Testresult::where('libinfosystem_id',$record->id)->where('lab_rec_id',$lab_id)->where('report_status','>','0')->first(); 
    //          dd($test_tresult);
                if(!empty($test_tresult)){
                    $hospital_id = $patient_data->id;
                $sample_id = $test_tresult->sample_id;
                                $testid = $test_tresult->test_id;
                       // dd($sample_id);
                   return  redirect('https://tirupatihms.com/hms/libsystems/report/'.$record['id'].'/0/1/'.$testid.'/'.$sample_id );
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
        return view('labrep');
    }

    

}