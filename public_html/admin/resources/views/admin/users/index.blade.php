@extends('admin.layouts.app')
@section('title')
@lang('translation.User_List')
@endsection



@section('content')
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; View Users</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/users/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                            </div>

                        </div>
                         
                    	    </div>
                    	    
                        <div class="row m-2">
                            <div class="col-md-3">
                                <label>Status</label>
                                <select class="form-control mb-4" id="status_name" name="status_name" >
                                  <option value="1">Select</option>
                                  <option value="1">Active</option>
                                  <option value="2">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Roles</label>
                                <select class="form-control" name="role_id" id="role_id" >
                                      @if(!empty(getRole())) 
                                          @foreach(getRole() as $role)
                                             <option value="{{ $role->id ?? ''  }}" {{ ( $role['id'] == old('role_id')) ? 'selected' : '' }}>{{ $role->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                </select>
                            </div>
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                           
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                         
           	              @if(!empty($data))
                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $key => $FetchData)
									<td>{{ $FetchData->id ?? '' }}</td>		
									
								
									<td>{{ $FetchData->name ?? ''}}</td>									
									<td>{{ $FetchData->email ?? ''}}</td>									
									<td>{{ $FetchData->mobile ?? ''}}</td>									
									<td>{{ date('m/d/Y',strtotime($FetchData->created_at)) ?? ''}}</td>	
									<td>
                                        <button  data-id="{{ $FetchData->id }}" data-name="{{$FetchData->status==0 ? '1' : '0'}}" class="{{$FetchData->status==0 ? 'btn btn-success' : 'btn btn-danger'}} btn-sm btn-soft-success waves-effect waves-light sa-params user_status" style ="display:inline">{{$FetchData->status==0 ? 'Acitve' : 'Inactive'}}</button>
               						</td>
									
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.users.show',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="uil uil-search font-size-18"></i></a>
                                            </li>
											
											<li class="list-inline-item">
                                                <a href="{{ route('admin.users.edit',$FetchData->id) }}" class="px-2 text-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">										        
										        <a  data-id="{{$FetchData->id}}"  data-location="users"  class="user_delete px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
												{!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $FetchData->id],'style'=>'display:inline','class'=>'sa-params'.$FetchData->id.'']) !!}												
												{!! Form::close() !!}
											
                                            </li>
											
                                        </ul>
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
    <!-- end row -->
     </div>
    </section>
</div>


<div class="modal" id="Modal_id1">
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
            <form action="{{ route('admin.users.destroy')}}" method="post">
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
    $('.user_status').click(function() {
    var user_id = $(this).data('id'); 
    var status_name = $(this).data('name');

    $('#status_name1').val(status_name); 
  $('#user_id1').val(user_id); 
  $('#Modal_id').modal("show"); 
  
  } );
  
  
   $('#close,#close1').click(function(){
       $('#id01').hide()
   })
  $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id1").modal("show");
      
   })
</script>
<!-- The Modal -->
<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content bg_color">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ __('Change status') }}</h4>
                <button type="button" class="btn-close" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('admin.users.status') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="user_id1" name="user_id" />
                    <input type="hidden" id="status_name1" name="status_name" />
                    <h5 class="text-white">
                        {{ __('Are you sure you want to change status') }}?
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



@endsection