@php
$setting = setting();

@endphp

<!DOCTYPE html>
<html>
 <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>   
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }


  table {

    border-collapse: collapse;
    width: 100%;
    
  }

  th {
    border: 1px solid black;
  }

  


  table {
    border-collapse: collapse;
    width: 100%;
  }
.body_set{
    font-size: larger; 
    border:1px solid black;
}
.logo_image{
margin-left: -65%;
  }
  .set_name{
      font-size:35px;
      color:red;
    padding-left: 28%;
  }
  .address_set{
      padding-left: 15%;
       padding-right: 15%;
      text-align:center;
  }
  .email_set{
      padding-left: 40%;
     
  }
  .phone_set{
      padding-left: 40%;
      
  }
  .salary_slep{
      margin-left: 35%;
  }
  .seel{
      height: 100px;
  }
@media only screen and (max-width: 600px) {
  .body_set{
      font-size:14px;
  }
 .logo_image {
  margin-left: -51%;
  width: 46%;
}
.set_name {
  font-size: 22px;
  color: red;
  margin-left: 19%;
}
.address_set {
  margin-left: 2%;
  position: absolute;
  text-align:center;
}
.email_set {
  margin-left: 38%;
  position: absolute;
  margin-top: 8%;
}
.salary_slep {
  margin-left: 23%;
}
}
</style>

<body class="body_set">
<div class="container-fluid" id="capture">
  <table style="border:1px solid black;width:100%;text-align: center;">

    <tr>
      <td rowspan="2" style="border-bottom: hidden;"><img class="logo_image"src="data:image/png;base64,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" ></td>
      
     <td style="border-bottom:hidden;"> <a id="btn" href="{{url('admin.print')}}/{{$data['user_id'] ?? ''}}" title="Salary Print"  class="btn btn-primary  btn-sm" target="_blank" download ><i class="fa fa-download" ></i>  </a> 
</td>
    </tr>

     </table>
      <table>

      <tr>
        
        <td colspan="12"class="set_name text-center"><b>{{$setting['name'] ?? ''}}</b></td>
        </tr>
        <tr>
       <td colspan="12"class="address_set text-center">{{$setting['address'] ?? ''}}</td>
       </tr>
       <tr>
       <td colspan="12"style="color: blue;" class="email_set">{{$setting['email'] ?? ''}}</td><b>
           </tr>
           <tr>
       <td colspan="12"class="phone_set">+91-{{$setting['phone'] ?? ''}}</td>
         </td></b>
    
      </td>
      </tr>
    
      
  <table>

<tr>

  <td colspan="4"><h3 class="salary_slep"><u> SALARY SLIP ({{ $data['month_name'] ?? '' }} <?php echo date("Y"); ?> )</u></h3></td>
 <!-- <td>
     @if(!empty($data['photo']))
      <img src="{{ env('IMAGE_SHOW_PATH').'student/'.$data['photo'] }}"width="100"height="100" style="margin-left: 20%;">
      @else
      <img src="{{asset('rukmaniImage/student/user.png')}}" class="img-fluid" style="width: 30%;margin-left: 47%;" alt="avatar.png">
        @endif
      </td>-->
</tr>
<tr >
    <td style="text-align:left;padding-left:10%"><b>Empoloyee Name : </b>{{ $data['name'] ?? '' }}</td>
    <td style="text-align:left;position: absolute;margin-left: -33%;"><b>Present : </b>{{ $data['present'] ?? '' }}</td>
    
     </tr>
     <tr>
    <td style="text-align:left;padding-left: 10%"><b>Empoloyee ID :</b> Ruk {{ $data['user_id'] ?? '' }}</td>
    <td style="text-align:left;position: absolute;margin-left: -33%;"><b>Absent :</b> {{ $data['absent'] ?? '' }}</td>

   
  </tr>
     <tr>
    <td style="text-align:left;padding-left: 10%"><b>Designation : </b>{{ $data['role_name'] ?? '' }}</td>
    <td style="text-align:left;position: absolute;margin-left: -33%;"><b>Total Days :</b> {{ $data['salary_day'] ?? '' }}</td>

   
  </tr>
 
  
     <tr>
    <td style="text-align:left;padding-left: 10%"><b>Status : </b>
    @if(!empty( $data['pay_status']))
    Payed
    @else
    Unpay
    @endif
   </td>
        <td style="text-align:left;position: absolute;margin-left: -33%;"><b>Holiday : </b>{{ $data['holiday'] ?? '' }}</td>


   </tr>

 
 
  
</table>
<br>
<table style="width:80%;margin-left:10%;font-size: 14px;">
 
  
 <tr>
  <th width="20%"> Salary</th>
    <th  width="20%"> Amount</th>
    <th  width="20%"> Deducation </th>
    <th  width="20%"> Amount</th>
   
 </TR>
 <tr>
  <th width="20%">  Basic Salary</th>
    <th  width="20%"> {{ $data['basic_amt'] ?? '' }}</th>
    <th  width="20%"> PF </th>
    <th  width="20%"> -</th>
   
 </TR>
 <tr>
  <th width="20%"ft;>  DA</th>
    <th  width="20%"> -</th>
    <th  width="20%"> TDS </th>
    <th  width="20%"> -</th>
   
 </TR>
 <tr>
  <th width="20%"> HRA</th>
    <th  width="20%"> -</th>
    <th  width="20%">ESIC </th>
    <th  width="20%">-</th>
   
 </TR>

 <tr>
  <th width="20%"> Incentive</th>
    <th  width="20%"> 
    @if(!empty($data['incentive']))
    {{ $data['incentive'] ?? '' }}
    @else
    -
    @endif
    </th>
    <th  width="20%">Other Deducation </th>
    <th  width="20%">
         @if(!empty($data['other_deduction']))
        {{ $data['other_deduction'] ?? '' }}</th>
       @else
       -
       @endif
 </TR>
 @if(!empty($data['deduction_remark']))
 <tr>
  <th width="20%"> Deduction Remark</th>
    <th  width="20%"> {{ $data['deduction_remark'] ?? '' }} </th>
    <th  width="20%"> Advance Amt</th>
    <th  width="20%"> 
     @if(!empty($data['advance']))
    {{ $data['advance'] ?? '' }}</th>
   @else
   -
   @endif
 </TR>
  @endif

  


<!-- <tr>
  <th width="20%"> Total Days(A)</th>
    <th  width="20%"> Present</th>
    <th  width="20%">  Absent (B) </th>
    
    <th  width="20%"> Salary Day (A-B)</th>
   
 </tr>
 <tr>
  <th width="20%">   {{ $data['salary_day'] ?? '' }}</th>
    <th  width="20%"> {{ $data['present'] ?? '' }}</th>
    <th  width="20%"> {{ $data['absent'] ?? '' }}</th>
   
    <th  width="20%"> 31</th>
   </tr>-->
  <tr>
  <th width="20%"> Total(Amount)(A)</th>
    <th  width="20%"> {{ $data['total_amount'] ?? '' }}</th>
    <th  width="20%"> Total Deducation </th>
    <th  width="20%"> {{ $data['other_deduction'] ?? '' }}</th>
   
 </tr>
 
 <tr>
  <th width="20%" colspan="2"> </th>
    <th  width="20%"  >Total  </th>
    <th  width="20%" >  {{ $data['total_amount'] ?? '' }}</th>
    
   
 </TR>
 </table>
<!-- <table style="width:80%;margin-left:10%;">

  </tr>
    <th id="inWords"></th>
   
  
   </tr>-->



</table>

<table style="width:100%">
    
   
    
    
  <tr style="border-top: 2px solid;">
         
          </tr>    
    
      <tr>
          <td ><h3><i style="margin-top: 3%;padding-left: 5%;position: absolute;">Signature Empoloyee</i></h3>  </td>
          <td style="text-align: right;"><h3 style="padding-right:5%;">
              
              <img src="{{asset('rukmaniImage/logo/school_seal.png')}}" class="seel">
            
              <br>Signature / CO</h3></td>
          </tr>    <br>
  </table>
  
  <table style="width:100%;">
  
      <tr style="border-top: 2px solid;">
          <td class=" pr-3" style="text-align: center;">Note: This is computerised copy so no need any Signature.</td>
      </tr>    
  </table>
 </div>
<br><br><br>

   <button type="button" style="position: absolute; margin-top: 5%;margin-left:2%;"><a href="{{url('admin/salary')}}" title="Salary Print"  class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> Back </a></button> 

</body>

</html>
<script type="text/javascript">
  
    function capture() {
  const captureElement = document.querySelector('#capture')
  html2canvas(captureElement)
    .then(canvas => {
      canvas.style.display = 'none'
      document.body.appendChild(canvas)
      return canvas
    })
    .then(canvas => {
      const image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream')
      const a = document.createElement('a')
      a.setAttribute('download', 'my-image.png')
      a.setAttribute('href', image)
      a.click()
      canvas.remove()
    })
}

const btn = document.querySelector('#btn')
btn.addEventListener('click', capture)
</script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>