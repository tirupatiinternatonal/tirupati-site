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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Edit Faq</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/faq') }}" class="btn bbtn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                          {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.faq.update', $data->id]]) !!}
                            <div class="row m-2">
                                <!--<div class="col-md-3">-->
                                <!--    <div class="form-group">-->
                                <!--        <label for="Username">Page Name</label>-->
                                <!--        <select name="page_name" id="page_name" class="mt-2 form-control @error('page_name') is-invalid @enderror"  >-->
                                <!--            @if(!empty($routes))-->
                                <!--                @foreach ($routes as $route)-->
                                <!--                    <option value="{{ $route->id }}" {{ ( $route->id == $data['page_name'] ? 'selected' : '' ) }}>{{ $route->page_name }}</option>-->
                                <!--                @endforeach-->
                                <!--            @endif-->
                                <!--        </select>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="page_name">Module Name</label>
                                        
                                             
                                        <select name="page_name" id="page_name" class="mt-2 form-control @error('page_name') is-invalid @enderror">
                                            
                                            @if(!empty($routes))
                                                @foreach ($routes as $route)
                                                    
                                                    @php
                                                    $op = "<option value='$route->id' ";
                                                    @endphp
                                                                
                                                        @if(!empty($pgdata))
                                                            @foreach ($pgdata as $pid)
                                                            
                                                                @if( $route->id == $pid->page_name )
                                                                    @php
                                                                    $op .= "disabled";
                                                                    @endphp
                                                                @endif
                                                                
                                                            @endforeach
                                                        @endif
                                                        
                                                        @if(!empty($data['page_name']))
                                                        
                                                            @if( $route->id == $data['page_name'] )
                                                            
                                                                @php
                                                                $op .= " selected";
                                                                @endphp
                                                                
                                                            @endif
                                                            
                                                        @endif
                                                    
                                                    @php
                                                    $op .= ">";
                                                    $op .= $route->page_name;
                                                    $op .= "</option>";
                                                    
                                                    echo $op;
                                                    
                                                    @endphp
                                            
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Title</label>
                                              <input type="text" class="form-control mt-2" name="title"
                                                id="title" placeholder="Title"value="{{old('title') ?? $data['title'] }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modul_descreption">Module Description</label>
                                        <textarea id="modul_descreption" class="form-control" name="modul_descreption" placeholder="Module Description" rows="3" cols="40">{{old('title') ?? $data['modul_descreption'] }}</textarea>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">YouTube URL</label>
                                              <input type="text" class="form-control mt-2" name="url"
                                                id="url" placeholder="YouTube URL"value="{{old('url') ?? $data['url'] }}">
                                        @error('url')
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
                                            
                                            <img src="{{ env('IMAGE_SHOW_PATH').'faq/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}" value="{{old('photo') ?? $data['photo'] }}">
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                           
                     
                            <div class="row m-2">
                                    <div class="col-md-6">
                                      <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                        <th colspan="" >Description Image</th>
                                        <th colspan="" >Old Image</th>
                                        <th width="50px"></th>
                                
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                       
                                        @if(!empty($dataDetail) && count($dataDetail) > 0)
                                            @php
                                                $i = 1;
                                                
                                            @endphp
                                        @foreach($dataDetail as $detail)
                                          <tr id="appendRow_{{ $detail->id ?? '' }}" >
                                              <input type="hidden" name="old_id[]"  value="{{ $detail->id ?? '' }}" >
                                            
                                            <td style="width:500px" >
                                                <input name="description[]" id="description_{{ $detail->id ?? '' }}" type="text" class="form-control description" tabindex="1"  value="{{ $detail->descreption ?? '' }}" placeholder="Card Heading" required>        
                                            </td>  
                                            <td style="width:500px">
                                                <input type="file" class="form-control mt-2" name="descriptionimage[]" id="descriptionimage">

                                            </td>  
                                            <td style="width:500px">
                                                <img src="{{ env('IMAGE_SHOW_PATH').'descreptionimage/'.$detail->descriptionimage }}" class="img-fluid" style="width: 80px;" alt="{{ $detail->descriptionimage }}" value="{{ $detail->descriptionimage }}">
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
                                        @else
                                        
                                        <tr id="appendRow_0">
                                            <td>
                                                <input name="description[]" id="description_0" type="text" class="form-control description" tabindex="1" placeholder="Card Heading" required>  
                                            </td>
                                            <td>
                                                <input type="file" class="form-control mt-2" name="descriptionimage[]" id="descriptionimage">
                                                <!--{!! Form::file('descriptionimage[]',array('class' => 'form-control mt-2','id'=>'descriptionimage')) !!}-->
                                            </td>
                                            <td style="width: 92px;">
                                                <div class="action_container">
                                                    <button type="button" class="btn btn-outline-primary" id="clonebtn"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-outline-danger  removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                   
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>
                     
                     
                     
                               
                            <div class="row m-2 mt-5">
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
    .Label_top{
        margin-top: 25px;
    }
</style>
 <link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>

	<script>
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>
	

<script>
$(document).ready(function() {
    count=0;
        // $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
        $(document).on("click", "#clonebtn", function() {
    count++;
        $('#table_body').append('<tr id="appendRowNew_'+count+'" ><td colspan="1"><input name="description[]" id="description_new_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control description" placeholder="Card Heading" required>        </td><td colspan="1"><input name="descriptionimage[]" id="descriptionimage_new_'+count+'" tabindex="1" tabindex="1" type="file" class="form-control descriptionimage" placeholder="Card Description" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
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
    	  url: baseurl + '/admin/descreptionDeleteSingle',
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