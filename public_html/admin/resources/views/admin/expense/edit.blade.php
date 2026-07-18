@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
<div class="content-wrapper" style="min-height: 222px;">
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-12">
               <div class="card card-outline card-orange">
                  <div class="card-header bg-primary">
                     <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Edit Expense</h3>
                     <div class="card-tools">
                        <a href="{{url ('admin/expense') }}" class="btn bbtn-warning text-white btn-sm"><i
                           class="fa fa-eye"></i> View</a>
                     </div>
                  </div>
                  {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.expense.update', $data->id]]) !!}
                  @csrf
                  <div class="row m-2">
                     <div class="col-md-3">
                        <label style="color:red;">Users*</label>
                      	<select class="form-control" id="user_id" name="user_id" >
                			<option value="">Select</option>
                		    @if(!empty(getuser())) 
                                          @foreach(getuser() as $type1)
                		
                                     <option value="{{ $type1->id ?? ''  }}" {{ ( $type1['id'] == $data['user_id'] ?? '') ? 'selected' : ''   }}>{{ $type1['name'] ?? ''  }}</option>
                                  @endforeach
                              @endif
                			
                            </select> 
                             			
                     </div>
                     <div class="col-md-3">
                        <label style="color:red;">Expense Name*</label>
                        <input type="text" class="form-control" placeholder="Expanse Name" id="expense_name" name="expense_name" value="{{ $data->expense_name ?? '' }}">
                        @error('expense_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror                  			
                     </div>
                     <div class="col-md-3">
                        <label style="color:red;">Date*</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $data->date ?? '' }}" >
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror                  			
                     </div>
                     <div class="col-md-3">
                        <label style="color:red;">Quantity*</label>
                        <!--<input type="text" class="form-control" onBlur="calculateAmount(this.value,0);" placeholder="Quantity" id="quantity_0" name="quantity" onkeypress="javascript:return isNumber(event)" value="{{ $data->quantity ?? '' }}" >-->
                         <input type="text" class="form-control" onBlur="calculateAmount(this.value,0);" placeholder="Quantity" id="quantity_0" name="quantity" onkeypress="javascript:return isNumber(event)" value="{{ $data->quantity ?? '' }}" required>
                                       
                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror                  			
                     </div>
                     <div class="col-md-3">
                        <label style="color:red;">Rate*</label>
                        <!--<input type="text" class="form-control" onBlur="calculateAmount(this.value,0);" placeholder="Rate" id="rate_0" name="rate" onkeypress="javascript:return isNumber(event)" value="{{ $data->rate ?? '' }}" >-->
                        <input type="text" class="form-control" onBlur="calculateAmount(this.value,0);" placeholder="Rate" id="rate_0" name="rate" onkeypress="javascript:return isNumber(event)" value="{{ $data->rate ?? '' }}" required>

                        @error('rate')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror                  			
                     </div>
                    <div class="col-md-3">
                        <label style="color:red;">Total Amount*</label>
                        <!--<input type="text" class="form-control amount" onblur="calculateSum()" placeholder="Amount" id="amount" name="amount" value="{{ $data->amount ?? '' }}" required>-->
                       <input type="text" class="form-control amount" onblur="calculateSum()" placeholder="Amount" id="amount_0" name="amount" value="{{ $data->amount ?? '' }}" Readonly required>

                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-md-3 ">
                        <label style="color:red;">Attachment*</label>
                        <input type="file" class="form-control"  id="attachment" name="attachment" value="{{ $data->attachment ?? '' }}" >
                        @error('attachment')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     
                     
                      <div class="col-md-2">    
								
                                <label for="category_id">Status </label>
                                <select class="form-control input1" id="status" name="status" >
                                <option value="">Select </option>
                                <option value="0" {{ ( 0 == $data['status'] ??  old('status')) ? 'selected' : '' }}>Pay </option>
                                <option value="1" {{ ( 1 == $data['status'] ??  old('status')) ? 'selected' : '' }}>Unpay </option>
                               
                     
                            </select>
                                                                 
                            </div>
                             
                  </div>
                  
      <!--            <div class="row m-2">
                                <div class="col-md-2 mt-2">
                                    <label for="switch1" data-on-label="Active" data-off-label="Inactive">Status</label>
                                    <div class="check-box mt-2">
                                     <input value="1"  name="status" type="checkbox" id="switch1" switch="none" checked/>
                                    </div>
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                
                                
                            </div>-->
                  <div class="row mt-4 mb-3">
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Update </button>
                     </div>
                  </div>
                  {!! Form::close() !!}
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<script>
    
$(document).ready(function() {
 $('#trColor tr').click(function() {
   $(this).css('backgroundColor', '#6639b5c4');
  $( this ).siblings().css( "background-color", "white" );
});
    
    count=0;
      $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
    $(document).on("click", "#clonebtn", function() {
       count++;
        //we select the box clone it and insert it after the box
        $('#box2').addClass('rowTr')
        $('#box2').clone().appendTo('#table_body')
       $('.rowTr').last().addClass('rowTr1')
       //  $('#box2').find('#removerow').addClass("buttondel")
          
   
        // $('.buttondel').css('visibility', 'visible')
      
         $( ".removeprodtxtbx" ).eq( count ).css( "display", "block" );
         $( ".addmoreprodtxtbx" ).eq( count ).css( "display", "none" );
         $( ".pay_amt" ).eq( count ).val("");
          
    });
    
    $(document).on("click", "#removerow", function() {
        $(this).parents("#box2").remove();
        $('#removerow').focus();
        count--;
    });
    
      $(document).on("click", "#closeModal", function() {
$( "tr" ).remove( ".rowTr1" );
 $( ".pay_amt" ).val("");
 $( "#pay_amt" ).val("");
count=0;
    });
    
    
    
    
   
});
</script>

<script>
   
    function calculateAmount(value,row_id) {
       
        var quantity = $('#quantity_'+row_id).val();
        var rate = $('#rate_'+row_id).val();
    
        var amount = quantity * rate;
    
        $('#amount_'+row_id).val(amount);
        calculateSum();
    };    
 function calculateSum() {
        var sum = 0;
        $(".amount").each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
        });
    
        $("#amount").val(sum.toFixed(2));
    }
        
</script>
@endsection


