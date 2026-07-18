<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Libinfosystem;
use App\Models\Hospital;
use App\Models\Testresult;
use App\Models\Medicine;
class RadiologyController extends Controller
{

    public function radio(Request $request){
        if($request->isMethod('POST')){
             
            $uhid = $request->uhid_no;
            
            $lab_rec_no = $request->rx_rec_no;
            $lab_id = $request->rx_id;
            $patient_data = Hospital::where('streg',$uhid)->first();
            
            if(!empty($patient_data)){
              $record = Libinfosystem::where('hospital_id',$patient_data->id)->where('lab_no',$lab_rec_no)->first();
              if(!empty($record))
              {
                  //dd($record['id']);
                  $test_tresult = Testresult::where('libinfosystem_id',$record->id)->where('lab_rec_id',$lab_id)->where('report_status','>','0')->first(); 
                
                if(!empty($test_tresult)){
                    $hospital_id = $patient_data->id;
                $sample_id = $test_tresult->sample_id;
                   return  redirect('https://tirupatihms.com/hms/img_text_report_redilogy/img_text_report_redilogy/'.$record['id'].'/0/1/1/'.$sample_id );
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

  public function radiology(){
      return view('radiology');
  }  

}