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
                                <i class="fa fa-bank"></i> &nbsp; Edit Career JD

                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/career_jd') }}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                     {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.career_jd.update', $data->id]]) !!}
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="post">Post Apply</label>
                                        <input type="text" class="form-control mt-2" name="post" id="post"  value="{{ old('post') ?? $data['post'] }}" placeholder="Enter Post Apply" required>
                                        @error('post')
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
                                            
                                            <img src="{{ env('IMAGE_SHOW_PATH').'careerJD/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}" value="{{old('photo') ?? $data['photo'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="minimum_requirement">Minimum/Mandatory Requirements</label>
                                        <textarea class="form-control ckeditor mt-2" id="minimum_requirement" placeholder="Minimum/Mandatory Requirements" name="minimum_requirement" rows="4" cols="50" required>{{ old('minimum_requirement') ?? $data['minimum_requirement'] }}</textarea>
                                        @error('minimum_requirement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="addon_requirement">Addon Requirments</label>
                                        <textarea class="form-control ckeditor mt-2" id="addon_requirement" placeholder="Addon Requirments" name="addon_requirement" rows="4" cols="50" required >{{ old('addon_requirement') ?? $data['addon_requirement'] }}</textarea>
                                        @error('addon_requirement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="offers">Offers & Pakcages</label>
                                        <textarea class="form-control ckeditor mt-2" id="offers" placeholder="Offers & Pakcages" name="offers" rows="4" cols="50" required>{{ old('offers') ?? $data['offers'] }}</textarea>
                                        @error('offers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="job_description">Job Description</label>
                                        <textarea class="form-control ckeditor mt-2" id="job_description" placeholder="Job Description" name="job_description" rows="4" cols="50" required>{{ old('job_description') ?? $data['job_description'] }}</textarea>
                                        @error('job_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                

                               

                            <div class=" col-md-12 row m-2">
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
<link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


	<script>
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>

@endsection
