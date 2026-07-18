@extends('admin.layouts.app')

@section('title')
    @lang('translation.Dashboard')
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-bank"></i> &nbsp; Edit Quotation

                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/quotation') }}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                     {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.quotation.update', $data->id]]) !!}
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                         <label for="Plan_type">Plan Type</label>
                                        <!-- <select name="plan_type" id="plan_type" class="mt-2 form-control @error('plan_type') is-invalid @enderror" required>-->
                                        <!--    <option value="">Choose Your Plan </option>-->
                                        <!--        <option value="1" {{ old('plan_type', $data->plan_type) == '1' ? 'selected' : '' }}>One Time Subscription</option>-->
                                        <!--    <option value="2" {{ old('plan_type', $data->plan_type) == '2' ? 'selected' : '' }}>Yearly Subscription</option>-->
                                        <!--</select> -->
                                        <select name="plan_type" class="form-control mt-2" required>
                                            <option value="">Choose Plan Type</option>
                                            @foreach($planTypes as $type)
                                                <option value="{{ $type->name }}" {{ $data->plan_type == $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount_label">Discount Label</label>
                                        <input type="text" class="form-control mt-2" name="discount_label" id="discount_label" placeholder="Enter Discount Label" value="{{ old('discount_label') ?? $data['discount_label'] }}" required>
                                        @error('discount_label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                         <label for="plan_name">Plan Name</label>
                                        <!-- <select name="plan_name" id="plan_name" class="mt-2 opwidhead form-control @error('plan_name') is-invalid @enderror" required>-->
                                        <!--    <option value="" >Choose Your Plan Name</option>-->
                                        <!--    <option value="" disabled><b> One Time Subscription </b></option>-->
                                        <!--    <option value="Premium Plan" {{ old('plan_name', $data->plan_name) == 'Premium Plan' ? 'selected' : '' }}>Premium Plan</option>-->
                                        <!--    <option value="Laboratary Plan" {{ old('plan_name', $data->plan_name) == 'Laboratary Plan' ? 'selected' : '' }}>Laboratary Plan</option>-->
                                        <!--    <option value="Radiology Plan" {{ old('plan_name', $data->plan_name) == 'Radiology Plan' ? 'selected' : '' }}>Radiology Plan</option>-->
                                        <!--    <option value="" disabled> <b>Yearly Subscription </b></option>-->
                                        <!--        <option value="Tirupati HMS Pro+" {{ old('plan_name', $data->plan_name) == 'Tirupati HMS Pro+' ? 'selected' : '' }}> Tirupati HMS Pro+</option>-->
                                        <!--    <option value="Tirupati Radiology Pro+" {{ old('plan_name', $data->plan_name) == 'Tirupati Radiology Pro+' ? 'selected' : '' }}>Tirupati Radiology Pro+</option>-->
                                        <!--    <option value="Tirupati Lab Pro+" {{ old('plan_name', $data->plan_name) == 'Tirupati Lab Pro+' ? 'selected' : '' }}>Tirupati Lab Pro+</option>-->
                                        
                                        <!--</select>-->
                                        <select name="plan_name" class="form-control mt-2" required>
                                            <option value="">Choose Plan Name</option>
                                            @foreach($plans as $plan)
                                                <option value="{{ $plan->name }}" {{ $data->plan_name == $plan->name ? 'selected' : '' }}>{{ $plan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control mt-2" name="amount" id="amount" placeholder="Enter Amount" value="{{ old('amount') ?? $data['amount'] }}" required>
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row m-2">
                                    <div class="col-md-3">
                                      <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                          <th class="serialWidth">Sr.</th>
                                        <th colspan="" >Modules & Features</th>
                                        <th></th>
                                
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        @if(!empty($dataDetail))
                                            @php
                                                $i = 1;
                                                
                                            @endphp
                                        @foreach($dataDetail as $detail)
                                          <tr id="appendRow_{{ $detail->id ?? '' }}" >
                                              <input type="hidden" name="old_id[]"  value="{{ $detail->id ?? '' }}" >
                                              <td class="serialWidth">{{ $i++ }})</td>
                                            <td colspan="1">
                                                <input name="features[]" id="features_{{ $detail->id ?? '' }}" type="text" class="form-control features", style="width:1500px" tabindex="1"  value="{{ $detail->features ?? '' }}" placeholder="Features" required>        
                                            </td>  
                                            <td style="width: max-content;">
                                              <div class="action_container">
                                                    <button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1" ><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-warning btn-xs ml-2 deleteData" data-bs-toggle="modal" data-bs-target="#Modal_id" data-id="{{ $detail->id ?? '' }}" id="" tabindex="1"><i class="fa fa-trash"></i></button>
                                                    <button type="button" class="btn btn-danger btn-xs removeprodtxtbx d-none" id="removerow_0" tabindex="1"><i class="fa fa-trash"></i></button>
                                              </div>
                                            </td>
                                          </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success pl-3 pr-3">Update</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #555b5beb;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">Delete Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>

            <!-- Modal body -->
            
                <div class="modal-body">
                    <input type="hidden" id="delete_id" name="delete_id">
                    <h5 class="text-white">Are you sure you want to delete  ?</h5>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light" id="deleteBtn">Delete</button>
                </div>

        </div>
    </div>
</div>



<style>
    .Label_top {
        margin-top: 25px;
    }
    .opwidhead option:disabled{
       background-color: #ddd;
  color: #000;
  font-weight: bold;
    }
</style>


    <style>
.table-bordered thead td, .table-bordered thead th {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 10px;
}
.table td {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 2px;
}
.select2-container--default .select2-selection--multiple{
    
    border-bottom-right-radius: 0px !important;
    border-top-right-radius: 0px !important;
}

    </style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<script>
$(document).ready(function() {
    count=0;
        // $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
        $(document).on("click", "#clonebtn", function() {
    count++;
        $('#table_body').append('<tr id="appendRowNew_'+count+'" ><td class="serialWidth">'+parseInt(count + 1)+')</td><td colspan="1"><input name="features[]" id="features_new_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control features" placeholder="Features" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
        });
    
        $(document).on("click", ".removeprodtxtbx", function() {
            $("#table_body").children(":last-child").remove();
            //$(this).parents('tr').remove();
            count--;
            window.calculateSum()
        });

});
</script>  


<script>
      $('.deleteData').click(function() {
      var delete_id = $(this).data('id'); 
      
      $('#delete_id').val(delete_id); 
      } );
      
          
</script>    
<script>
$(document).ready(function(){
    $('#deleteBtn').on('click', function(e){
        
    	var baseurl = "{{ url('/') }}";
    	var delete_id = $('#delete_id').val();
        $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    	  url: baseurl + '/admin/featuresDeleteSingle',
    	  data: {delete_id:delete_id},
    	  method:'post',
    	  success: function(response){
    			if(response.status == 1){
    			    toastr.success('Item Deleted Successfully!');
    			    window.location.reload();
    			}else{
    			    alert('Something Went Wrong, Plz Try Again Later!');
    			}
    	  }
    	});
    	
    });    
});
</script> 


@endsection
