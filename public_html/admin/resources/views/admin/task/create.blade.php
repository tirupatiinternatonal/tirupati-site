@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
  
@section('content')

@php
 
$date = date('Y-m-d');
$date2 = date('Y-m-d', strtotime("+3 day"));

@endphp

<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Add Taks</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/task')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                                             <a href="{{url('admin/task')}}" class="btn btn-warning text-white btn-sm"><i
                           class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                            </div>

                        </div>

          {!! Form::open(array('route' => 'admin.task.create','method'=>'post','id'=>'create','files' => true)) !!}
            <div class="row">
                <div class="col-lg-12" >
            <div id="addproduct-accordion" class="custom-accordion">
               
                    <div id="addproduct-billinginfo-collapse" class="collapse show" data-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
								@if (count($errors) > 0)
								<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
								</ul>
								</div>
								@endif                               
                                <div class="row">
                                    <div class="col-lg-4">
                                        
                                    <div class="form-group">
                                            <label class="control-label">Role <span class="required">*</span></label> 
                                            {!! Form::select('roles_id', $roles ?? '',[], array('class' => 'form-control ')) !!}
                                        </div>
                                    </div> 
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            {!! Form::text('title', null, array('class' => 'form-control','placeholder'=>'Title')) !!}
											<span class="error name-error"></span>
                                        </div>
                                    </div> 
                                    <div class="col-lg-4">
                                        
                                        <div class="form-group">
                                            <label for="name">Task Date</label>
                                            
                                            {!! Form::date('task_date', $date, array('class' => 'form-control','placeholder'=>'Task Date')) !!}
											<span class="error name-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        
                                        <div class="form-group">
                                            <label for="name">Task End Date</label>
                                            {!! Form::date('task_end_date', $date2, array('class' => 'form-control','placeholder'=>'Task End Date')) !!}
											<span class="error name-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        
                                        <div class="form-group">
                                            <label for="name">Attach Document</label>
                                            {!! Form::file('attach_docs', null, array('class' => 'form-control')) !!}
											<span class="error name-error"></span>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-12">
                                        
                                        <div class="form-group">
                                            <label for="name">Task Details </label>
                                            {!! Form::textarea('task_details', null, array('class' => 'form-control ckeditor')) !!}
											<span class="error name-error"></span>
                                        </div>
                                    </div>   
                                    <div class="col-md-12 mt-1">
                        <div class="form-group">
                             <table class="table table-bordered" style="border: none;" >
                                <thead>
                                    <tr>
                                      
                                      <th style="border: none;">
                                           <label style="color:red;"> Task Name</label>
                                          </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr class="tr_clone">
                                   
                                    <td style="border: none;">
                                        <div class="form-group">
                                            {!! Form::text('task_name[]', null, array('class' => 'form-control','placeholder'=>'Task Name')) !!}      
                                        </div>
                                    </td>                                   
                                    
                                    
                                
                                    </tr>
                                    	
                                 </tbody>
                 
                              </table>
                        </div>
                    </div>
                                </div>
								
								<div class="row">
                                  
										<div class="col-lg-6">  
										<div class="form-group">
										 <label for="name">Status</label>									
                                          
                                        </div>
                                        <div class="form-group">
										
										<input value="1"  name="status" type="checkbox" id="switch1" switch="none" checked/>
										<label for="switch1" data-on-label="Active"
										data-off-label="Inactive"></label>
                                          
                                        </div>
										</div>                                                                      
                                </div>
								    <div class="row mb-4">
        <div class="col text-right" style="margin-left: -44%;">
            <!--<a href="admin.task" class="btn btn-dark"> <i class="uil uil-arrow-left mr-1"></i> Back </a>-->
       
			 <button type="submit" class="btn btn-success mr-5 pl-2"><i class="uil uil-file-alt mr-1"></i> Save</button>            
        </div> <!-- end col -->
    </div> <!-- end row-->
	{!! Form::close() !!}
                        </div>
                    </div>
               
			</div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    <!-- end row -->


@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/dropify/dropify.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/dropify.js')}}"></script>
	<script src="{{URL::asset('assets/libs/ckeditor/ckeditor.js')}}"></script>
	<script>
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>
	<script type="text/javascript">
       $(document).on("click", ".addrow", function() {
    var frist_clild = $(".tr_clone").eq(0);
    var newelement= $(".tr_clone").eq(0).clone();
    var num = $('.tr_clone').length;
    var newNum = num;
    newelement.find('.upload_image_multi').each(function(i){
       $(this).attr('name','side_image['+newNum+'][]');
      
    });
    
    newelement.find( 'input' ).val( '' );
    $('.tr_clone').last().after(newelement);
    });
     
      $(document).on("click", ".removerow", function() {
             $(this).parents("tr").remove();
     }); 
     </script>
     
         <style>
        
.left_b_none
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
  background-image: url('https://admin.abizobindia.com/public/images/list_add.png');
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 16px;
  width: 16px;
}

.removeprodtxtbx {
  background-color: #FFFFFF;
  background-image: url('https://admin.abizobindia.com/public/images/delete2.png');
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 15px;
  margin-left: 5px;
  width: 16px;
}

.role_set {
    
    padding-left: 8%;
    padding-right: 3%;
}
    </style>
@endsection