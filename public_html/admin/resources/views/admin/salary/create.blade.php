@extends('admin.layouts.app')
@php
$incentive_amount = 0;
$staffAtten = staffAtten($data->id ?? '' ,$serach['month'] ?? '' );


$totel_salary_day = $staffAtten['P']+$staffAtten['d']+$staffAtten['W']+$staffAtten['H'];
$totel_par_day_amt = $data['salary']/$staffAtten['TotalDay'];

$half_day_amt   = $totel_par_day_amt/2;

$totel_half_day = $half_day_amt*$staffAtten['HF'];


if($totel_salary_day >= $staffAtten['TotalDay']){
$incentive_amount = $totel_par_day_amt;
}
$totel_amount = $totel_salary_day*$totel_par_day_amt+$totel_half_day;


@endphp


@section('content')
<div class="content-wrapper">
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">    

            <div class="col-md-12">
                <div class="card card-outline card-orange mr-1">
                 <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-money"></i>Salary Panel</h3>
                <div class="card-tools">
                         <a href="{{url('admin/salary')}}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>

               
               </div>
                </div>  
                <form action="{{ route('admin.salaryCreate') }}" method="post"> 
                            @csrf  
                     <div class="row m-2">
          
                          <div class="col-md-3">
                                <label>Roles</label>
                                <select class="form-control" name="role_id" id="role_id" >
                                    <option value="">Select Role</option>
                                      @if(!empty(getRole())) 
                                          @foreach(getRole() as $role)
                                             <option value="{{ $role->id ?? ''  }}" {{$role['id'] == $serach['role_id'] ? 'selected' : '' }} >{{ $role->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                </select>
                            </div>
                    	
                          <div class="col-md-3">
            			<label style="color:red;">Salary Month*</label>
            			<select class="form-control"  name="month" id="month" >
            			<option value="">Select</option>
            			<option value="1"  {{"1" == $serach['month'] ? 'selected' : ''}} >January</option>
            			<option value="2"  {{"2" == $serach['month'] ? 'selected' : ''}} >February</option>
            			<option value="3"  {{"3" == $serach['month'] ? 'selected' : ''}} >March</option>
            			<option value="4"  {{"4" == $serach['month'] ? 'selected' : ''}} >April</option>
            			<option value="5"  {{"5" == $serach['month'] ? 'selected' : ''}} >May</option>
            			<option value="6"  {{"6" == $serach['month'] ? 'selected' : ''}} >June</option>
            			<option value="7"  {{"7" == $serach['month'] ? 'selected' : ''}} >July</option>
            			<option value="8"  {{"8" == $serach['month'] ? 'selected' : ''}} >August</option>
            			<option value="9"  {{"9" == $serach['month'] ? 'selected' : ''}} >September</option>
            			<option value="10"  {{"10" == $serach['month'] ? 'selected' : ''}}  >October</option>
            			<option value="11"  {{"11" == $serach['month'] ? 'selected' : ''}}  >November</option>
            			<option value="12"  {{"12" == $serach['month'] ? 'selected' : ''}}  >December</option>
                        
                        </select>                 			
                	</div>          	
                    	
                        <div class="col-md-3">
                        
                			<label style="color:red;">Select Staff* </label>
                			<select class="form-control" id="user_id" name="user_id" onchange="this.form.submit()">
                			<option value="">Select</option>
                		    @if(!empty($user)) 
                                          @foreach($user as $type1)
                		
                                     <option value="{{ $type1->id ?? ''  }}" {{ ( $type1->id  == $serach['user_id'] ?? '') ? 'selected' : ''   }}>{{ $type1['name'] ?? ''  }}</option>
                                  @endforeach
                              @endif
                			
                            </select> 
                            
                    	</div>
                    </div>
    </form>
                    
                </div>          
            </div>

      
        <div class="col-md-6 pr-0">
                <form action="{{ route('admin.generate.salary') }}" method="post">
                    @csrf          
                        
                    <input type="hidden" name="role_id" value="{{ $data->role_id ?? '' }}">
                    <input type="hidden" name="user_id" value="{{ $data->id ?? '' }}">
                    <input type="hidden" name="month_id" value="{{$serach['month'] ?? ''}}">
                    <input type="hidden" name="per_day_amt" value="{{ round($totel_par_day_amt) ?? '' }}">
                    <input type="hidden" name="salary_day" value="{{ $totel_salary_day ?? '' }}">
                    <input type="hidden" name="present" value="{{ $staffAtten['P'] ?? '' }}">
                    <input type="hidden" name="absent" value="{{ $staffAtten['A'] ?? '' }}">
                    <input type="hidden" name="holiday" value="{{ $staffAtten['H'] ?? '' }}">
                    <input type="hidden" name="half_day" value="{{ $staffAtten['HF'] ?? '' }}">
                    <input type="hidden" name="work_from_home" value="{{ $staffAtten['W'] ?? '' }}">
                    <input type="hidden" name="double_shift" value="{{ $staffAtten['d']/2 ?? '' }}">
            <div class="card card-outline card-orange mr-1">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-money"></i>Salary Panel</h3>
            <div class="card-tools">
          </div>
            
            </div>                 

                <div class="row m-2">
                        <div class="col-md-6">
                			<label style="color:red;">Staff First Name*</label>
                			<input class="form-control @error('first_name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Staff  Name" value="{{$data['name'] ?? ''}}">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    			
                    	</div>
                                        	
              	
                        <div class="col-md-6">
                			<label  style="color:red;">Basic Salary* </label>
                			<input class="form-control @error('basic_amt') is-invalid @enderror" onkeyup="calculateAmount(this.value,'basic_amt');" type="text" name="basic_amt" id="basic_amt" placeholder="Basic Salary" value="{{ $data['salary'] ?? '' }}" readonly>
                            @error('basic_amt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    			
                    	</div>                	
                       <!-- <div class="col-md-6">
                			<label>HRA </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'hra');" type="text" name="hra" id="hra" placeholder="HRA" value="">
                      			
                    	</div>  -->              	
                        <div class="col-md-6">
                			<label>DA Amount  </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'da');" type="text" name="da" id="da" placeholder="DA Amount" value="">
                    	</div>                	
                        <div class="col-md-6">
                			<label>Incentive</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'incentive');" type="text" name="incentive" id="incentive" placeholder="Incentive" value="{{round($incentive_amount) ?? ''}}" >
                    	</div>                	
                       <!-- <div class="col-md-6">
                			<label >Allowances</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'allowance');" type="text" name="allowance" id="allowance" placeholder="Allowances" value="">
                    	</div>  -->              	
                        <div class="col-md-6">
                			<label >Advance </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'advance');" type="text" name="advance" id="advance" placeholder="Advance" value="">
                    	</div>                	
                        <div class="col-md-6">
                			<label>PF Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'pf');" type="text" name="pf" id="pf" placeholder="PF Amount" value="">
                    	</div>                	
                        <div class="col-md-6">
                			<label>TDS Amount</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'tds');" type="text" name="tds" id="tds" placeholder="TDS Amount" value="">
                    	</div>                	
                      <!--  <div class="col-md-6">
                			<label >ESIC Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'esic');" type="text" name="esic" id="esic" placeholder="ESIC Amount" value="">
                   			
                    	</div>  -->              	
                       <!-- <div class="col-md-6">
                			<label>Tax Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'tax');" type="text" name="tax" id="tax" placeholder="Tax Amount" value="">
                    	</div>-->                	
                        <div class="col-md-6">
                			<label >Other Deduction </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'other_deduction');" type="text" name="other_deduction" id="other_deduction" placeholder="Other Deduction" value="">
                    	</div>                	
                        <div class="col-md-6">
                			<label>Other Deduction Remark </label>
                			<input class="form-control" type="text" name="deduction_remark" id="deduction_remark" placeholder="Deduction Remark">
                    	</div>                	
                        <div class="col-md-6">
                			<label  style="color:red;">Salary Generate Date*</label>
                			<input class="form-control @error('date') is-invalid @enderror" type="date" name="date" id="date" value="{{ date('Y-m-d') }}">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    			
                    	</div>                	
                        <div class="col-md-6">
                			<label style="color:red;">Final Salary*</label>
                			<input class="form-control" type="text" name="total_amount" id="total_amount" placeholder="Final Salary" value="{{round($totel_amount)+$incentive_amount ?? ''}}" readonly>
                    	</div> 
                    	
                </div>
                	  <div class="row m-2">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Generate </button>
                    </div>
                </div>
               
            </div>          
        </div>
        
        <div class="col-md-6 pr-0">
            <div class="card card-outline card-orange mr-1">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-money"></i> Attendance Panel</h3>
            <div class="card-tools">
           </div>
            
            </div>                 
                <div class="row m-2">
                        <div class="col-md-3">
                			<label> <b>Total Days</b></label><br>
                			<label > <b style=" color: blue;margin-left: 35px;">{{ $staffAtten['TotalDay'] ?? '0' }}</b></label>
                			
                		
                		                 			
                    	</div>
                        <div class="col-md-3">
                			<label><b style="margin-left: 10px;">Holiday</b></label><br>
                			<label><b style="color: red;margin-left: 35px;">{{ $staffAtten['H'] ?? '0' }}</b></label>
                			                  			
                    	</div>                	
                        <div class="col-md-3">
                			<label ><b style="margin-left: 10px;">Absent</b></label><br>
                			<label ><b style="color: red;margin-left: 35px;">{{ $staffAtten['A'] ?? '0' }}</b></label>
                   			
                    	</div>   
                            
                        <div class="col-md-3">
                			<label ><b style="margin-left: 10px;"> Half-Day</b></label><br>
                			<label ><b style="color: blue;margin-left: 35px;">{{ $staffAtten['HF'] ?? '0' }}</b></label>
                  			
                    	</div> 
                    	<div class="col-md-3">
                			<label> <b style="margin-left: 10px;">Double Shift</b></label><br>
                			<label > <b style="color: orange;margin-left: 35px;">{{ $staffAtten['d']/2 ?? '0' }}</b></label>
                			
                		
                		                 			
                    	</div>
                    	<div class="col-md-3">
                			<label><b style="margin-left: 10px;"> Working</b></label><br>
                			<label><b style="color: green;margin-left: 35px;">{{ $staffAtten['P']+$staffAtten['d']+$staffAtten['W'] ?? '0' }}</b></label>
                			                  			
                    	</div> 
           
                    
                        <div class="col-md-3">
                			<label ><b style="margin-left: 10px;">Salary Days</b></label><br>
                			<label ><b style=" color: green;margin-left: 35px;">{{$totel_salary_day ?? ''}}</b></label>
                    	</div>                	
                </div>
            </div>  
        </div>
       
       
         </form>
    </div>
    
</div>
</section>
</div>

  <meta name="csrf-token" content="{{ csrf_token() }}" />      
     
           
<script type="text/javascript">
    function isNumber(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      
      
    $("#role_id").change(function(){
    
      var role_id = $(this).val();
        $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: URL+'/findStaff',
        data: {role_id:role_id},
	    success: function(data){
	     if(data != ''){
	         	$("#user_id").html(data);
	     }else{
	         	$("#user_id").html(data);
	            toastr.error('User Not Found !');
	     }
	    }
        }); 
 
});  

$(document).ready(function(){
    var user_data = $('#user_data').val();
    if(user_data != ''){
         $("#user_id").html(user_data);
    }
});

function calculateAmount(value,row_click) {
   var total_amount = {{round($totel_amount)}};
        if(row_click == "da"){
             $('#total_amount').val(total_amount-value);
        }
        if(row_click == "advance"){
             $('#total_amount').val(parseFloat(total_amount)+parseFloat(value));
        }
        if(row_click == "pf"){
             $('#total_amount').val(total_amount-value);
        }
        if(row_click == "tds"){
             $('#total_amount').val(total_amount-value);
        }
        if(row_click == "other_deduction"){
             $('#total_amount').val(total_amount-value);
        }
        if(row_click == "incentive"){
           
             $('#total_amount').val(parseFloat(total_amount)+parseFloat(value));
        }
       
    
};
      
</script>

@endsection      