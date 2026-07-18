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
                                <i class="fa fa-bank"></i> &nbsp; Edit Product

                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/product') }}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                     {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.product.update', $data->id]]) !!}
                            <div class="row m-2">
                                <!--<div class="col-md-3">-->
                                <!--    <div class="form-group">-->
                                <!--         <label for="product_type">Product Type</label>-->
                                <!--         <select name="product_type" id="product_type" class="mt-2 form-control @error('product_type') is-invalid @enderror" required>-->
                                <!--        <option value="">Choose Your Product</option>-->
                                <!--        <option value="1" {{ old('product_type', $data->product_type) == '1' ? 'selected' : '' }}>Tirupati Ultimate Hms Pro+ </option>-->
                                <!--        <option value="2" {{ old('product_type', $data->product_type) == '2' ? 'selected' : '' }}>Tirupati Hms Pro+</option>-->
                                <!--        <option value="3" {{ old('product_type', $data->product_type) == '3' ? 'selected' : '' }}>Tirupati Lab Pro+</option>-->
                                <!--        <option value="4" {{ old('product_type', $data->product_type) == '4' ? 'selected' : '' }}>Tirupati Radio. Pro+</option>-->
                                <!--        <option value="5" {{ old('product_type', $data->product_type) == '5' ? 'selected' : '' }}>Tirupati Pharmacy Pro+</option>-->
                                <!--        <option value="6" {{ old('product_type', $data->product_type) == '6' ? 'selected' : '' }}>Tirupati Doctor Pro+</option>-->
                                <!--        <option value="7" {{ old('product_type', $data->product_type) == '7' ? 'selected' : '' }}>Tirupati Blood Bank Pro+</option>-->
                                <!--    </select>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="heading">Heading</label>
                                        <input type="text" class="form-control mt-2" name="heading" id="heading" placeholder="Enter Heading" value="{{ old('heading') ?? $data['heading'] }}" required>
                                        @error('discount_label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="url">Youtube Url</label>
                                        <input type="text" class="form-control mt-2" name="url" id="url" placeholder="Enter Youtube Url" value="{{ old('url') ?? $data['url'] }}" required>
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control mt-2" id="description" name="description" rows="4" cols="50" required>{{ old('description') ?? $data['description'] }}</textarea>
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto">Upload photo<span class="text-danger">*</span></label>
                                        <input type="file" id="thumbnail" class="form-control mt-2" name="photo" value="{{ $data['photo'] ?? ''}}" accept="image/*">
                                            
                                        <div class="form-group col-md-4">
                                            <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                            
                                            <input type="hidden" class="form-control" name="scrimage" value="{{old('photo') ?? $data['photo'] }}" id="scrimage">
                                            
                                            <img src="{{ env('IMAGE_SHOW_PATH').'product/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}" value="{{old('photo') ?? $data['photo'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto">BackGround photo<span class="text-danger">*</span></label>
                                        <input type="file" id="thumbnail" class="form-control mt-2" name="photo2" value="{{ $data['photo2'] ?? ''}}" accept="image/*">
                                            
                                        <div class="form-group col-md-4">
                                            <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                            
                                            <input type="hidden" class="form-control" name="scrimage1" value="{{old('photo2') ?? $data['photo2'] }}" id="scrimage1">
                                            
                                            <img src="{{ env('IMAGE_SHOW_PATH').'backgroundimg/'.$data['photo2'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo2}}" value="{{old('photo2') ?? $data['photo2'] }}">
                                        </div>
                                    </div>
                                </div>
                                

                               

                                

                            <div class="row m-2">
                                    <div class="col-md-6">
                                      <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                          <th class="serialWidth">Sr.</th>
                                        <th colspan="" >Module's Name</th>
                                        <th colspan="" >Module's Description</th>
                                        <th width="50px"></th>
                                
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
                                            <td style="width:500px" >
                                                <input name="card_heading[]" id="card_heading_{{ $detail->id ?? '' }}" type="text" class="form-control card_heading" tabindex="1"  value="{{ $detail->card_heading ?? '' }}" placeholder="Card Heading" required>        
                                            </td>  
                                            <td style="width:500px">
                                                <input name="card_description[]" id="card_description_{{ $detail->id ?? '' }}" type="text" class="form-control card_description" tabindex="1"  value="{{ $detail->card_description ?? '' }}" placeholder="Card Description" required>        
                                            </td>  
                                            <td style="width: 150px;">
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

                            <div class=" col-md-3 row m-2">
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
        $('#table_body').append('<tr id="appendRowNew_'+count+'" ><td class="serialWidth">'+parseInt(count + 1)+')</td><td colspan="1"><input name="card_heading[]" id="card_heading_new_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control card_heading" placeholder="Card Heading" required>        </td><td colspan="1"><input name="card_description[]" id="card_description_new_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control card_description" placeholder="Card Description" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
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
    	  url: baseurl + '/admin/productDeleteSingle',
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
