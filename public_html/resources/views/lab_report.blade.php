<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">
</head>
<title>Patient Lab. Report</title>
<?
$server = $this->Html->url('/', true);
$data_img = file_get_contents($server.'/app/webroot/img/tirupati1.png');
$type = 'png';
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data_img);

?>
<style>
@page{
  width:100%;
  margin:0;
  font-family:Franklin Gothic Heavy,sans-serif;
}
.style14 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style22 {font-size: 20px; font-weight: bold; }
.style23 {
  font-family: Geneva, Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size: 18px;
}
.style33 {font-family: , "Times New Roman", Times, serif}
.style34 {font-size: 20px; font-weight: bold; font-family: Georgia, "Times New Roman", Times, serif; }
.style39 {font-size: 18px}
.style42 {font-size: 18px; font-weight: bold; }
.style47 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style67 {font-size: 15px}
.style69 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold;}
.style72 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 14px; }
.style73 {font-size: 14px}
.style75 {font-size: 16px}
.style76 {font-size: 10px}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}
.style35 {font-size: 17px}
.style36 {font-size: 13px}
.style78 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 14px; font-weight: bold; }

 body {

	  margin-bottom:100px;
	 height:800px;
    }
</style>
<?
$get_url=Configure::read('https_url');
//pr($libinfosystem);die;
$session=$this ->Session->read(); 
 //pr($patient_data);die;
$to=$patient_data['Hospital']['email'];
$msg="";
ob_start();
?>
<div id="showcont" style="background-image: url(<?php echo $base64 ?>); background-repeat: no-repeat;background-attachment: fixed;background-position: center; ">
  <div align="center">
    <table  style="padding-top:10px;padding-left:10px;width:100%;position:fixed; background-image: url=/hms/app/webroot/img/<?=$header[0]['Header']['logo'];?>" id="myHeader">
      <tr>
        <td width="35" rowspan="4"><div align="right">
                  <img src="<?=$get_url.$this->base?>/app/webroot/img/<?=$header[0]['Header']['logo']?>" height="80px" width="80px" />
                 
                  </div></td>
        <td colspan="4"><div align="center" class="style34 style35">
          <?=$header[0]['Header']['hsname'];?>
        </div></td>
    <td width="15%" rowspan="4">
        
        <? 
        $server = $this->Html->url('/', true);
        echo $this->QrCode->text($server.'/libsystems/report/'.$testsids.'/0/0/0/0/'.$select_test); ?>
    </td>
      </tr>
      <tr>
        <td colspan="4"><div align="center" class="style42 style36">
          <?=$header[0]['Header']['licence'];?>
        </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center" class="style42 style36">
          <?=$header[0]['Header']['address'];?>
        </div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="center" class="style36"><strong>Phone:
          <?=$header[0]['Header']['mobile'];?>
        , Email:
        <?=$header[0]['Header']['email'];?>
        </strong></div></td>
      </tr>
      
      <tr>
        <td colspan="7">
      <table width="100%" style="border:0px solid">
      <tr>
          <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td width="30%">UHID: <?=@$patient_data['Hospital']['streg']?></td>
        <td width="31%">Lab No.:
          <?=@$libinfosystem[$testtype[0]['libsystems']['test']][0]['libinfosystems']['lab_no']?></td>
        <td width="39%"> <? 
        if(!empty($patient_data['Hospital']['registration_no'])){
        echo 'IPD No.:'.$patient_data['Hospital']['registration_no']; 
        }else{
           echo ' ' ;
        }
        ?>        </td>
        </tr>
      <tr>
        <td>Pt. Name:
        <?php //$sex= $gender[$patient_data['Hospital']['gender']];
    if(@$patient_data['Hospital']['gender']=='M'){
      @$sex="Male";
     
     }else if($patient_data['Hospital']['gender']=='F'){
      @$sex="Female";
      
     }
     else{
     @$sex=" "; }
    echo $patient_data['PatientSalutation']['salutation'].' '.$patient_data['Hospital']['name']." ".$patient_data['Hospital']['middle_name']."  ".$patient_data['Hospital']['l_name']   
   ?></td>
	    <td>Age/Gender&nbsp;:<? echo @$patient_data['Hospital']['dob']; ?>&nbsp;/&nbsp;
          <?=@$sex?></td>
	    <td>Date By: <?php echo date('d-m-Y h:i A',strtotime($testtype[0]['libinfosystems']['date_added'])); ?></td>
        </tr>
      <tr>
        <td colspan="2">Dr. <?php echo $patient_data['Specialist']['specialist_name']; ?></td>
        <td>Sample Date :<strong><?
            if(isset($sample_collection_date)){
                echo date("d-m-Y h:i A",strtotime(@$sample_collection_date));
            }else{
                echo date("d-m-Y h:i A");
            }?></strong> </td>
        </tr>
      <tr>
        <td colspan="2">Ref. By: <?php echo $patient_data['Refdoctor']['refdocname']; ?></td>
        <td>Report Date :<strong><span class="style73 style33 style73 style75">
          <? if(isset($testtype[0]['libinfosystems']['date_added'])){ echo date('d-m-Y h:i A',strtotime($testtype[0]['libinfosystems']['date_added'])); }?>
        </span></strong> </td>
        </tr>
      <tr>
        <td colspan="2"><?
        if(!empty($patient_data['Section']['class_name'])){
          echo 'Ward :' .$patient_data['Section']['class_name'];
          echo '/Bed No.:' .$patient_data['Hospital']['room']; 
        }else{
           echo ' ' ;
        }
        ?></td>
        <td>Print Date :<strong><span class="style73 style33 style73 style75"><?php echo date('d-m-Y h:i A'); ?></span></strong></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Panel :- 
          <?=@$panel[$patient_data['Hospital']['panel']]?></td>
        </tr>
     <tr>
          <td colspan="3"><hr></td>
      </tr>
      </table></td>
      </tr>
    </table>
    <?
    $methodhead="";
    for($j=0;$j<count(@$testtype);$j++)
    {
        for($i=0;$i<count(@$libinfosystem[$testtype[$j]['libsystems']['test']]);$i++){
            if($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['impression_line']!="")
            {
                $methodhead="Method";break;
            }
        }
        if($methodhead!="")
        break;
    }
    
    ?>
    <table style="padding-top:300px;padding-left:10px;width:100%;padding-bottom: 180px;">
	
      <span class="style73">
      <?php

    $tol = count($testtype);
    $group = array();
       $l= 0;
    for($j=0;$j<count(@$testtype);$j++){ 
      if($j%2==0){
        $style="#DFFFFF";
      }else{
        $style="#FFFFFF";
      }
      if(in_array($testtype[$j]['groups']['groupname'],$group)){
        
      }else{
        $group[$j] =$testtype[$j]['groups']['groupname'];
      }
    $test_id = $testtype[$j]['libsystems']['test'];
    if(!empty($libinfosystem[$test_id])){
     //pr($sample_data);die;
    ?>
      </span>
      <?
      if(@$group[$j]!="")
      {
          
      ?>
      
      <tr>
        <td colspan="7" align="center" style="font-size:14px;text-transform: uppercase;" class="line1"><strong><? echo @$group[$j];?></strong> </td>
      </tr>
      <tr>
        <td colspan="7" class="line1" style="font-size:14px;"><hr></td>
      </tr>
      <tr>
        <td  colspan="2" class="style23" style="background-color:LightGray;">Test</td>
        <td width="10%" class="style23" style="background-color:LightGray;">Value</td>
        <td width="10%" class="style23" style="background-color:LightGray;">Flag</td>
        <td width="8%" class="style23" style="background-color:LightGray;">Unit</td>
        <td width="10%" class="style23" style="background-color:LightGray;"> NormalRange</td>
        <td width="15%" class="style23" style="background-color:LightGray;">Age Group</td>
        
        
      </tr>
      <?php }?>
      <? $total_subtest = count(@$libinfosystem[$testtype[$j]['libsystems']['test']]);
      if($total_subtest >1)
      {?>
    
    
      
      <tr>
        <td colspan="2" class="line1" style="font-size:14px;"><span class="line1"><strong><? echo @$testtype[$j]['tests']['testname']; ?>&nbsp;&nbsp;<?=@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['lab_rec_id']?></strong></span></td>
        <td colspan="3"  style="font-size:14px;"> <? if(isset($sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['sample_date']) && !empty($sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['sample_date'])){ echo "Samp. Date:".date("d-m-Y H:i ",strtotime(@$sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['sample_date'])); }?></td>
        
        <td width="15%" class="line1" style="font-size:14px;"><span class="line1"><strong>
          <? if(isset($sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['id']) && !empty($sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['id'])){ echo "Samp. ID:".@$sample_data[$testtype[$j]['libsystems']['test']]['sample_collections']['id']; }?>
        </strong></span></td>
        <td width="15%" class="line1" style="font-size:14px;"><span class="line1"><strong>
          <? if(isset($sample_data[$testtype[$j]['libsystems']['test']]['sample_types']['sample_type']) && !empty($sample_data[$testtype[$j]['libsystems']['test']]['sample_types']['sample_type'])){ echo "Samp. TYPE:".@$sample_data[$testtype[$j]['libsystems']['test']]['sample_types']['sample_type']; }?>
        </strong></span></td>
        
      </tr>
      <? } ?>
      <span class="style73">
      <?php } 
	  $sr_no=1;
        for($i=0;$i<count(@$libinfosystem[$testtype[$j]['libsystems']['test']]);$i++){
       ?>
      </span>
      <tr>
        <td colspan="7"><?php if(isset($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['testsubname'])&& !empty($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['testsubname'])){
		echo  $libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['testsubname'];
		} ?></td>
      </tr>
      <tr>
        <td colspan="2" class="line1" style="font-size:14px;padding-left:10px;"><?=$sr_no++;?>
          .&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?=@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['testname']?></td>
        <?
          if(@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] < @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['fromrange'] || @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] > @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['torange'] && is_numeric($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore']))
          {
              ?>
        <td class="line1" align="left" style="font-size:14px;"><?
            echo "<strong style='color:#FF0000'>".@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore']."</strong>";
        ?></td><td><?
                if($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] < @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['fromrange']){
                  echo "L &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }else{
                  echo "H &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }?>
        </td>
        <td width="8%" class="line1" align="left" style="font-size:14px;"><? if(@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] < @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['fromrange'] || @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] > @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['torange'] && is_numeric($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'])){
            echo"<strong style='color:#FF0000'>".@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['unit']."</strong>";
          }else{
            echo @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['unit'];
          }
          ?>
        </td>
        <td class="line1" align="left" style="font-size:14px;">
            <?
            echo @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['printrange'];
            ?></td>
          <? }else{ ?>
        
        <?php if($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['testtype']==1) { ?>
        <td width="5%" align="left" class="line1" style="font-size:14px;" ><?
             //echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'];
            ?>
        </td>
            
        <td width="8%"></td>
        <td width="8%" align="left" class="line1" style="font-size:14px;"><? if(@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] < @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['fromrange'] || @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'] > @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['torange'] && is_numeric($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore'])){
            echo"<strong style='color:#FF0000'>".@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['unit']."</strong>";
          }else{
            echo @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['unit'];
          } ?>
          </td>
          <? }else{ ?>
		  <td colspan="3"> <?php echo@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['testscore']; ?></td>
		<?php } ?>
          
          
        <td width="3%" align="left" class="line1" style="font-size:14px;"> 
        <?
        echo @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['printrange'];
        
        ?></td>
        
        <? } ?>
        <td><?php
         echo " ".$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['libsystems']['printage'];
        
        ?></td>
        <!--<td><?php
        // echo " ".@$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['remark'];
        
        ?></td>-->
        <?  if($methodhead!="")
        {
            ?>
            <td >
                
                </td>
            <?
        }?>
        <?php if(!empty($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['remark'])){ ?>
            <tr>
            <td width="4%">&nbsp;</td>
            <td colspan="5">&nbsp;Remark:<?php echo $libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['remark']; ?><td>
            </tr>
        <?php } ?>
     
        <?php if(!empty($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['format_report'])){ ?>
            <tr >
            <td width="4%">&nbsp;</td>
            <td colspan="5">&nbsp;Interpretation Data:<?php echo $libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['format_report']; ?><td>
            </tr>
        <?php } ?>
      </tr>
      <?php if (!empty($libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['impression_line'])) { ?>
      <tr>
        <td width="4%">&nbsp;</td>
        <td colspan="5"><span style="font-size:12px;">&nbsp;Method: <?php echo str_replace('<p>','', str_replace('</p>','', @$libinfosystem[$testtype[$j]['libsystems']['test']][$i]['testresults']['impression_line']));?></span></td>
      </tr>
      <?php } 
      } }?>
      <tr>
        <td colspan="7" align="center" style="padding-top:0px;"><hr></td>
      </tr>
      <tr>
        <td style="background-color:#DFFFFF;font-size:12px;" colspan="6"><span class="style76">COMMENT LINE</span></td>
      </tr>
      <tr>
        <td colspan="7"><span class="style75"><?php echo @$libinfosystem[$testtype[0]['libsystems']['test']][0]['libinfosystems']['comment_line'] ?></span> </td>
      </tr>
      <tr>
        <td colspan="7" align="center" style="padding-top:0px;"><hr></td>
        
	  <tr><td colspan="7">
	   <!--
	  <?=$content1?>-->
	  </td></tr>
      </tr>
    </table>
    <div align="center" style="margin-left:15px;" class="footer" id="myfooter">
    <table width="94%" align="center" cellpadding="0" cellspacing="0" style="padding-top:40px; width:98%">
     <tr>
        <td width="44%" height="20" class="line style33 style73" style="display:initial;"><p align="center"><strong>Sign. of Lab Technician </strong></p></td>
       <td width="56%" class="css style14 style73"><p align="center" class="style69">Pathology</p></td>
                </tr>
     <tr>
       <td class="line" style="display:initial;"><div align="center"><strong><?php echo '<br><br><br><br>'.$labtechnician['User']['owner_name'];?></strong></div></td>
       <td width="56%" class="css style14 style73"><div align="center"><span class="style69">
         <?php if($testtype[0]['libinfosystems']['is_verified']==NULL){
          echo '<img src='.$get_url.$this->base.'"/app/webroot/img/lab_sign.jpg" style="max-height:40px; max-width:40px"/><br>';
        }elseif ($testtype[0]['libinfosystems']['is_verified']==1) {
          echo $pathologist['User']['owner_name'];
        }else{
          echo 'Recheck Test';
        } ?>
       </span> </div>
	   </td>
     </tr>
     <tr>
        <td colspan="2" align="center" style="padding-top:3px;"><div align="left" class="style76">The Test Results Depends on the Quality of Sample ,The Test Results to be interpretted in Conjunction with the Clinical Findings.  </div></td>
      </tr>
     <tr>
        <td colspan="2" align="center" style="padding-top:3px;"><div align="center" class="style47">
          <div align="left">In case of any Discrepancy , Please Contact the Laboratory ,Not Valid for Medico-Legal Purpose.  </div>
        </div></td>
      </tr>
    </table>
    </div>
   <?
   $msg = ob_get_clean();
   echo $msg;
   App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
	$this->dompdf = new DOMPDF();
	$papersize = "A2";
	$orientation = 'portrait';
	$this->dompdf->load_html($msg);
	$this->dompdf->set_paper($papersize, $orientation);
	$this->dompdf->render();
    $output = $this->dompdf->output();
    $file_name_create = 'lab_report_'.$patient_data['Hospital']['id'].'_'.date('his').'.pdf';
    $url=$_SERVER['DOCUMENT_ROOT'].$this->base.'/app/webroot/lab_report/'.$file_name_create;
    file_put_contents($url, $output);
       
if($patient_data['Hospital']['is_whatsapp']==1){
        $Whatsapp = new WhatsappController();
        $server=Configure::read('file_path');
        $url=$server.'/app/webroot/lab_report/'.$file_name_create;
        $msg_data = $Whatsapp->createMessage("laboratory_report", array("uhid"=>$patient_data['Hospital']['streg'],"date"=>date("d-m-Y"),"test_name_lab_code"=>@$libinfosystem[@$testtype[0]['libsystems']['test']][0]['libinfosystems']['lab_no'],"hospital"=>$header[0]['Header']['hsname']));
        $mobile_number = '91'.$patient_data['Hospital']['f_mobile'];
        $optin = $Whatsapp->optinUser($mobile_number);
        $resp = $Whatsapp->sendWhatsappMessage($mobile_number, $msg_data,'file','Laboratory_report.pdf',$url);
        //$resp = $Whatsapp->sendWhatsappMessageNew($mobile_number, $msg_data,$url);

			}
			
if(!empty($whatsapp_no) && isset($whatsapp_no)){
        $Whatsapp = new WhatsappController();
        $server=Configure::read('file_path');
        $url=$server.'/app/webroot/lab_report/'.$file_name_create;
        $msg_data = $Whatsapp->createMessage("laboratory_report", array("uhid"=>$patient_data['Hospital']['streg'],"date"=>date("d-m-Y"),"test_name_lab_code"=>@$libinfosystem[@$testtype[0]['libsystems']['test']][0]['libinfosystems']['lab_no'],"hospital"=>$header[0]['Header']['hsname']));
        $mobile_number = '91'.$whatsapp_no;
        $optin = $Whatsapp->optinUser($mobile_number);
        $resp = $Whatsapp->sendWhatsappMessage($mobile_number, $msg_data,'file','Laboratory_report.pdf',$url);
        //$resp = $Whatsapp->sendWhatsappMessageNew($mobile_number, $msg_data,$url);

			
    
}
?> 
  <?php
    $msg = ob_get_clean();
   echo $msg;
    
 if(!empty($patient_data['Hospital']['email'])){
    $file_name = WWW_ROOT . '/app/webroot/lab_report' . DS.$file_name_create ;
    App::import('Controller', 'Emailtemplates');
    $emailTemp = new EmailTemplatesController();
    $emaiId = $patient_data['Hospital']['email'];
    $subject = 'Lab Report';
    //$body_text = 'PFA Your Lab Report Is Ready.';
    $resp = $emailTemp->sendEmail($emaiId,$subject,$file_name); 
    
}
?>

    
<?php if($single_report == 0){ ?>
    <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
    //alert(sticky);
  if (window.pageYOffset > sticky) {
   document.getElementById("myHeader").style.display = "none";
   document.getElementById("myfooter").style.display = "none";
  } else {
     document.getElementById("myHeader").style.display = "";
     document.getElementById("myfooter").style.display = "";
  }
}
</script>
<?}?>
<script>
window.print();
</script>

    <?=exit;?>
  </div>
  