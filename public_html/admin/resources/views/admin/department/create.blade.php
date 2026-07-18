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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Add Department </h3>
                            <div class="card-tools">
                               
                            </div>

                        </div>
 {!! Form::open(array('route' => 'admin.department.store','method'=>'POST','files' => true)) !!}
    <div class="row p-3">
    <div class="col-md-12 col-12">
        <label for="name">Department Name</label>
        {!! Form::text('name',null,array('placeholder' => 'Department Name','class'=>'form-control w-25')) !!}
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
   
                <div class="table-responsive mb-4 p-3">
                    <table id="datatable" class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($data as $key => $FetchData)	
                            <tr>
                                <td>{{$FetchData['id'] ?? ''}}</td>
                                <td>{{$FetchData['name'] ?? ''}}</td>
                                <td>
                                        <ul class="list-inline mb-0">
                                            
											
											<li class="list-inline-item">
                                                <a href="{{ route('admin.department.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                            </li>
                                           
                                            <li class="list-inline-item">										        
										  <!--      <a   data-id="{{$FetchData->id}}"  data-location="countries"  class="px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o font-size-18"></i></a>-->
												<!--{!! Form::open(['method' => 'DELETE','route' => ['admin.department.destroy', $FetchData->id],'style'=>'display:inline','class'=>'sa-params'.$FetchData->id.'']) !!}												-->
												<!--{!! Form::close() !!}-->
												
												 <a   data-id="{{$FetchData->id}}"  data-location="countries"  class="user_delete text-danger  ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                               {!! Form::open(['method' => 'DELETE','route' => ['admin.department.destroy', $FetchData->id]]) !!}                                              
                                            {!! Form::close() !!}
                                            </li>
                                           
											
                                        </ul>
                                    </td>
                                </tr>
                     @endforeach
                           
                </div>
         
    </div>
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
            <form action="{{ route('admin.department.destroy')}}" method="post">
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

@endsection