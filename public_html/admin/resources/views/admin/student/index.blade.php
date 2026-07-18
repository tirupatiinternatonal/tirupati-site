@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')


<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; View Client 
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/student/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>Add</a>
                               
                            </div>
                        </div>

                      <div class="table-responsive mb-4 p-2">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                        <tr role="row">
                                            <th>Sr</th>
                                            <th>Name</th>
                                            <th>Phone no</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Date</th>
                                            <th>Pin</th>
                                            <th>Logo</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                          @if(!empty($data))
                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$value['name'] ?? ''}}</td>
                                             <td>{{$value['f_mobile'] ?? ''}}</td>
                                             <td>{{$value['email'] ?? ''}}</td>
                                             <td>{{$value['city'] ?? ''}}</td>
                                             <td>{{$value['state'] ?? ''}}</td>
                                             <td>{{$value['country'] ?? ''}}</td>
                                             <td>{{$value['date'] ?? ''}}</td>
                                             <td>{{$value['pin'] ?? ''}}</td>
                                             <td>
                                              @if($value->photo )                                    
                                    <img src="{{ env('IMAGE_SHOW_PATH').'student/'.$value['photo'] }}" class="img-fluid" style="width: 15%; height: 55px;" alt="{{$value->photo}}">
                               @else
                                    <img src="{{asset('image/ff.png')}}" class="img-fluid" style="width: 15%;height: 30px;" alt="avatar.png">
                                @endif</td>
                                   
                                            <td>
                                                 @if($value->status==1)
                                              
                                                	<button data-toggle="modal"  data-id="{{ $value->id }}" data-name="Active" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light student_status " style ="display:inline">Active</button>
                                             
               							    	@else
               								  
                                                	<button data-toggle="modal" data-id="{{ $value->id }}" data-name="Inactive" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light student_status" style ="display:inline">Inactive</button>
                                               
            								    @endif
                                                
                                            </td>
                                            <td class="d-flex">
                                            <a  href="{{ route('admin.student.show',$value->id)  }}" data-id="{{$value->id}}"class=" text-danger btn-xs ml-3" title="Show"><i class="	fa fa-search"></i></a>
                                                <a href="{{  route('admin.student.edit',$value->id)  }}" class=" text-success btn-xs ml-3" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
    
										
												{!! Form::open(['method' => 'POST','route' => ['admin.student.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
												<a   data-id="{{$value->id}}"  data-location="countries"  class="user_delete text-danger btn-xs ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
												{!! Form::close() !!}
                                            </td>
                                           
                                        </tr>
                                         @endforeach
                            
                            @endif
                                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content bg_color">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ __('Delete Data On Database') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ url('admin/student/destroy')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" />
                    
                    <h5 class="text-white">
                        {{ __(' Are you sure you want to delete this data......') }}?
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                        data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                        {{ __('yes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


    
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
</form>
        </div>
    </div>
</div>
  <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


 $('#close,#close1').click(function(){
       $('#id01').hide()
   })
   
  $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
    </script>
    
<script>
    $('.student_status').click(function() {
    var student_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#student_id').val(student_id); 
   $('#exampleModalCenter').modal('show');
  } );
</script>
<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection
