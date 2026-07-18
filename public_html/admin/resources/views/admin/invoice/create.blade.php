@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@php

@endphp

<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Add Invoice</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/index')}}/{{$invoice_id}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                                <a href="{{url('admin/website_amc')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i> Back</a>
                            </div>

                        </div>
            <div class="card-body p-0" style="display: block;">
           
                  <form action="{{ url('admin/invoice') }}/{{$invoice_id}}" method="post">
              	 @csrf
            <table class="table table-bordered mb-2 mt-3 text-nowrap table-responsive-sm table_wid ">
   
                  <tbody id ="tbodynew" >
                    <tr class="sel_wid">
                     <td class=" p-1">
                        <div class="form-group select_bos">

                    	   <select name="payment_type[]" id="payment_type_0" class="form-control">
                              <option value="">Select</option>
                              <option value="AMC">AMC</option>
                              <option value="Payment">Payment</option>
                            </select>
                        </div>
                    </td> 
                   
                   
                    <td class="p-1">
                        
                        <div class="form-group amount">
                            <input name="date[]" id="date_0" class="form-control cal qty" type="date" value="{{date('Y-m-d')}}">
                	   </div>
                    </td>
                 
                    
                    <td class="p-1">
                        <div class="form-group amount">
                	    <input type="text" name="amount[]" id="amount_0" class="form-control tolamount" min="0" onblur="calculateSum(this.value,0)" placeholder="Amount" required />
                	   </div>
                    </td>
                     <td class="p-1">
                        <div class="form-group  description_siz ">
                            <input id="description_0" type="text" class="form-control description" name="description[]" required  placeholder="description" >
                	   </div>
                    </td>
                   <td style="width: 51px; cursor: pointer;"> 
                   <div class="col-sm-3" id="add">
         <input  type="button" onclick="addElement_room();" value="" title="Add More" class="addmoreprodtxtbx" style="color:#6445d2;" id="button"/>
        
      </div>
                  </td>
                    </tr>
                    	
                 </tbody>
              
                 
            </table>
            <div class="row">
        
        <div class="col-md-12">
            <div id="maindiv_room" class="size_multipal">
		        <div id="append_1">	
			        <div id="capacity_1"></div>
		        </div>	
	        </div>
	    </div>
	</div>
	<input type="hidden" name="total_room" id="total_room" value="1">
	<input type="hidden" name="value_room" id="value_room" value="1">
            <div class="row m-1">
		
				<div class="col-md-2 col-6">
                    <div class="form-group">
						 <label for="netamount_amt">Net Amount</label>
						<input type="text" class="form-control" id="net_amount" readonly tabindex="1" placeholder="Net Amount" name="net_amount"required>
					</div>
				</div>

							
							</div>
							
						
							
                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                   <br>
                                    <button type="submit" class="btn btn-info" id="btnSubmit">Submit</button>
                                </div>
                            </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>

function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[type="number"]', forceNumeric);

  
       function addElement_room(){
	var SITEURL  = "{{ url('/') }}";
		var div=document.getElementById('maindiv_room');
		
		var num=Number(document.getElementById('value_room').value)+Number(1);
		document.getElementById('value_room').value=num;
		var num1=Number(document.getElementById('total_room').value)+Number(1);
		document.getElementById('total_room').value=num1;
		var heightchange=Number(42)*(Number(num)-Number(1))+Number(110)+Number(15);
		//alert(heightchange);
		$("#main_room").css('height',heightchange);
		var newdiv = document.createElement('tbody');
	  	var divIdName = 'append_'+num;
	   	var contents ='';
		newdiv.setAttribute('id',divIdName);
		contents='<tr class="tr_clone "><td><div class="form-group select_bos"> <select name="payment_type[]" id="payment_type_'+num+'" class="form-control"><option value="">Select</option><option value="AMC">AMC</option><option value="Payment">Payment</option></select></div></td><td><div class="form-group date_ipt"><input name="date[]" id="date_'+num+'"  class="form-control date "type="date" value="{{date('Y-m-d')}}"></div></td><td><div class="form-group amt"><input name="amount[]" id="amount_'+num+'" placeholder="Amount" onblur="calculateSum(this.value,0)" class="form-control tolamount amount" maxlength="100" type="number"  value="" tabindex="1"></div></td><td class="p-2"><div class="form-group  description_siz_loop"><input id="description_0" type="text" class="form-control description" name="description[]" required  placeholder="description" ></div></td><td><div style="padding:15px;" id="add"><input type="button" style="margin-left: -81%;"onclick="addElement_room();" value="" title="Add More " class="addmoreprodtxtbx" id="button" name="button" ><input type="button" class="removeprodtxtbx" name=delrow_'+num+' id=delrow_'+num+'  style="position: absolute;"value="" onclick="removeElement_room(\'append_'+num+'\','+num+')"></div></div></td></tr>';
		
		newdiv.innerHTML = contents;
	  	div.appendChild(newdiv);
	  
	}
	
	
    	function removeElement_room(divNum, countNum){
		
		var d = document.getElementById('maindiv_room');
		d.removeChild(window.document.getElementById(divNum+""));
		var counterValue= Number(document.getElementById('value_room').value)-Number(1);
		document.getElementById('value_room').value=counterValue;
		var heightchange=Number(42)*(Number(counterValue)-Number(1))+Number(110)+Number(15);
		
		$("#main_room").css('height',heightchange);
  	
	}
	
   
  </script> 

      <script type="text/javascript">
    
 

function calcSum(value,row_id) {
   
    
    
        
        $('#amount_'+row_id).val(amount);
        
        calculateSum();
    
};

function calculateSum() {
    var sum = 0;
    $(".tolamount").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
    });
   
    $("#net_amount").val(sum.toFixed(2));

   
}






</script>
    <style>
   
    .description_siz_loop{
        width:300px !important;
    }
    .size_multipal{
        margin-left:1% !important;
    }
    .amt{
        width:382px;
    }
    
    .select_bos{width: 162px;}
    
    .date_ipt{
        width: 239px;
    }
    
    .clove{
        width: 414px;
padding-right: 16px;
    }
    
    .form-control {
    height: 35px !important;
    }
    .tr_clone{
    margin-left:5%!important;
    }
    
        .form-group {
  margin-bottom: 2px;
}
.left_b_none{
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    height: 40px;
    padding: 4px;
    line-height: 15px;
    font-size: 26px;
}
label {
  display: inline-block;
  margin-bottom: 0px;
  font-size: 14px;
}
.form-control {
  display: block;
  width: 100%;
  height: 28px;
  padding: 3px;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: .25rem;
  box-shadow: inset 0 0 0 transparent;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.form-group {
  margin-bottom: 0px;
}
.table-bordered thead td, .table-bordered thead th {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 10px;
}
.table td {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 2px;
}
.border-radius{
    height:28px !important;
}
.addmoreprodtxtbx {
  background-color: #FFFFFF;
  background-image: url({{url('public/list_add.png')}});
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 16px;
  width: 16px;
  
}

.removeprodtxtbx {
  background-color: #FFFFFF;
  background-image: url({{url('public/delete2.png')}});
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 15px;
  margin-left: 5px;
  width: 16px;
}

@media only screen and (max-width: 600px) {
.clove{
    width: 89%;

}
.description_siz_loop{
    width:80px !important;
    margin-left:-10% !important;
}
.description_siz{
    width:60px;
}
.amount{
    width:60px;
}
.date_ipt{
    width:70px;
}
   .amt{
        width:70px;
    }
  .select_bos{width: 70px;}
.payment_type{
    margin-top: -9%;
}
.sel_wid{
    width:200px !important;
}
.iten_name_set{
    width: 58%;
}
.form-control{
    font-size:8px;
}
.table_wid{
    width:100% !important;
}
.font_set{
   font-size: 9px;
margin-bottom: -8%;
margin-top: 2%;
}.amount_set{
    margin-left: -60%;
}
}.rate_set{
    margin-left: -30%;
}
}
</style>
@endsection      