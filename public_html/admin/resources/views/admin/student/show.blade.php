@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')
<div class="content-wrapper">
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-12">
               <div class="card card-outline card-orange">
                  <div class="card-header bg-primary">
                     <h3 class="card-title">
                        <i class="fa fa-address-book-o"></i> &nbsp; View Student
                     </h3>
                     <div class="card-tools">
                        <a href="{{url('admin/student')}}" class="btn btn-warning text-white btn-sm"><i
                           class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                     </div>
                  </div>

                  <div class="card-body">
                     <div class="">
                        <div class="product-desc">
                           <div class="tab-content border border-top-0 p-4">
                              <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                 <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                       <tbody>
                                          @if(!empty($data))
                                         
                                          <tr class="">
                                             <th style="width: 20%;">Name</th>
                                             <td>{{$data['name'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Mobile</th>
                                             <td>{{$data['mobile'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Email</th>
                                             <td>{{$data['email'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">DOB</th>
                                              <td>{{$data['dob'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Aadhar</th>
                                              <td>{{$data['aadhar'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Father Name</th>
                                              <td>{{$data['father_name'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Father Mobile</th>
                                              <td>{{$data['father_mobile'] ?? ''}}</td>
                                          </tr>
                                      
                                          <tr >
                                             <th style="width: 20%;">Mother Name</th>
                                              <td>{{$data['mother_name'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Address</th>
                                              <td>{{$data['address'] ?? ''}}</td>
                                          </tr>
                                      
                                           <tr >
                                             <th style="width: 20%;">Photo</th>
                                             <?php $image = URL::asset('public/uploads/student/'.$data->image); ?>
                                            <td>
                                                @if($data->photo)
                                                    <img src="{{ env('IMAGE_SHOW_PATH').'student/'.$data['photo'] }}" class="img-fluid" style="width: 30%;" alt="{{$data->photo}}">
                                                @else
                                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="width: 30%;" alt="avatar.png">
                                                @endif
                                            </td>
                                          </tr>
                                           <tr >
                                             <th style="width: 20%;">Status</th>
                                                <td>
                                                 @if($data->status==1)
                                              
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $data->id }}" data-name="Active" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light student_status" style ="display:inline">Active</button>
                                             
               								@else
               								  
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $data->id }}" data-name="Inactive" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light student_status" style ="display:inline">Inactive</button>
                                               
            								@endif
                                                
                                            </td>
                                          </tr>
                                          
                                       </tbody>
                                 
                                       @endif
                                    </table>
                                    
                                 </div>
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

     <!--  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Status Change</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              {!! Form::open(array('route' => 'admin.student.status','method'=>'POST','id'=>'create','files' => true)) !!}
            {!! Form::hidden('status_name',null,array('id'=>'status_name','class'=>'form-control' )) !!} 
           {!! Form::hidden('student_id',null,array('id'=>'student_id','class'=>'form-control' )) !!} 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Do you really want to change the status ?
            </div>
        </div>
    </div> 
      </div>
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Yes</button>
         {!! Form::close() !!}
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
    
      </div>
    </div>
  </div>
</div>
<script>
    $('.student_status').click(function() {
    var student_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#student_id').val(student_id); 
   $('#exampleModalCenter').modal('show');
  } );
</script>-->
@endsection