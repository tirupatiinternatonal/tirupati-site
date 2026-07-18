@extends('admin.layouts.app')

 @section('content')

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                                Response Status') }}
                            </h3>
                            <!--<div class="card-tools">-->
                            <!--    <a href="{{url('admin/branch/create')}}" class="btn btn-warning text-white btn-sm"><i-->
                            <!--            class="fa fa-plus"></i>{{ __('Add') }}</a>-->
                            <!--    <a href="{{url('admin/branch/create')}}" class="btn btn-warning text-white btn-sm"><i-->
                            <!--            class="fa fa-arrow-left"></i>{{ __('Back') }}</a>-->
                            <!--</div>-->
                        </div>
 {!! Form::open(array('route' => 'admin.responce_status.store','method'=>'POST','files' => true)) !!}
<div class="row m-4">
    <div class="col-md-4 col-12">
        <label for="name">Responce status name</label>
        {!! Form::text('name',null,array('placeholder' => 'Responce status name','class'=>'form-control ')) !!}
    </div>
    <div class="col-md-6 col-12">
        <label for="color">Colors</label>
        <input type="color" id="color" name="color" class="form-control w-25">
       <!-- {!! Form::text('name',null,array('placeholder' => 'Responce status name','class'=>'form-control w-25')) !!}-->
    </div>
</div>
<br>
<div class="row text-center">
    <div class="col-md-12 col-12">
        <button type="sumbit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
<br>
<div class="row">
    <div class="col-lg-12">
       
            <div class="card-body">
                <div class="table-responsive mb-4">
                        <!--        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">-->
                        <!--            <thead>-->
                        <!--                <tr role="row">-->
                        <!--        <th scope="col">-->
                        <!--            <a href="http://rukmanisoftware.com/admin/admin/enquiry?sort=id&amp;direction=desc">ID</a>-->
                        <!--            <i class="fas fa-sort"></i></th>-->
                        <!--        <th scope="col">Name</th>-->
                        <!--        <th scope="col">@sortablelink('status','Status')</th>  -->
                        <!--        <th scope="col" style="width: 200px;">Action</th>-->
                        <!--    </tr>-->
                        <!--</thead>-->
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
<th>ID</th>
<th>Name</th>
<th>Status</th>
<th>Action</th>
                                        </tr>
                                    </thead>
                        <tbody>
                         @foreach ($data as $key => $FetchData)	
                            <tr>
                                <td>{{$FetchData['id'] ?? ''}}</td>
                                <td>{{$FetchData['name'] ?? ''}}</td>
                                <td>
									@if($FetchData->status==1)
									<span data-id="{{$FetchData->id}}" data-status="0" class="task_status btn btn-success btn-sm btn-soft-success waves-effect waves-light">Active</span>
									@else
									<span data-id="{{$FetchData->id}}" data-status="1" class="task_status btn btn-danger btn-sm btn-soft-danger waves-effect waves-light">Inactive</span>
									@endif									
									</td>
                                <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.responce_status.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                            </li>
											
											<!--<li class="list-inline-item">-->
           <!--                                     <a href="{{ route('admin.responce_status.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>-->
           <!--                                 </li>-->
                                           
             <!--                              <li class="list-inline-item">										        -->
										
												 <!--<a   data-id="{{$FetchData->id}}"  data-location="countries"  class="user_delete text-danger  ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>-->
             <!--                                  {!! Form::open(['method' => 'DELETE','route' => ['admin.responce_status.destroy', $FetchData->id]]) !!}                                              -->
             <!--                               {!! Form::close() !!}-->
             <!--                               </li>-->
                                             <li class="list-inline-item">										        
										
												
												 <a   data-id="{{$FetchData->id}}"  data-location="countries"  class="user_delete text-danger  ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                               {!! Form::open(['method' => 'DELETE','route' => ['admin.responce_status.destroy', $FetchData->id]]) !!}                                              
                                            {!! Form::close() !!}
                                            </li>
                                           
											
                                        </ul>
                                    </td>
                                </tr>
                     @endforeach
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

<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content bg_color">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ __('Delete Data On Database') }}</h4>
                <button type="button" class="btn-close" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('admin.responce_status.destroy')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" />
                    
                    <h5 class="text-white">
                        {{ __(' Are you sure you want to delete this data......') }}?
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                        data-dismiss="modal">
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             {!! Form::open(array('route' => 'admin.responce_status.status','method'=>'POST','id'=>'create','files' => true)) !!}
            {!! Form::hidden('status',null,array('id'=>'status1','class'=>'form-control' )) !!} 
            {!! Form::hidden('id',null,array('id'=>'id1','class'=>'form-control')) !!} 
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
     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    
      </div>
    </div>
  </div>
</div>

 <script>

 
   
  $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
    </script>


    <script>
        $(".task_status").on("click", function(){
                var id = $(this).data("id");
                var status = $(this).data("status");
            
                $("#status1").val(status); 
                $("#id1").val(id); 
                $('#exampleModalCenter').modal('show');
        }); 
</script>
@endsection