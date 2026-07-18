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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; View Invoice</h3>
                            <div class="card-tools">
                               
                                <a href="{{url('admin/index')}}/{{$id}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                             
                            </div>

                        </div>
                         
                    	    </div>
                    	    
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive mb-4">
                                <table id="example1" class="table table-centered table-nowrap mb-0 ">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr.No</th>
                                            <th>Patment Type</th>
                                            <th>Amount</th>
                                            <th> Date</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                         
           	                      @if(!empty($data))
                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $key => $FetchData)
									<td>{{ $FetchData->id ?? '' }}</td>		
									<td>{{ $FetchData->payment_type ?? ''}}</td>	
									<td> {{ $FetchData->amount ?? ''}} </td>									
									<td> {{ $FetchData->date ?? ''}} </td>									
									<td> {{ $FetchData->description ?? ''}} </td>									
														
									
									
                                    
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
    </div>
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