@extends('admin.layouts.app')
@section('title')
@lang('translation.User_List')
@endsection
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
@section('content')
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; View AMC</h3>
                            <div class="card-tools">
                                <a href="" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                            </div>

                        </div>
                         
                    	    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table id="example1" class="table table-centered table-nowrap mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID
                                   </th>
                             
                                <!--<th scope="col">@sortablelink('user','User')</th>-->
                                  <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Website Name</th>
                                <th scope="col">mobile no</th>
                                 <th scope="col">A.M.C Amount</th>
                                 <th scope="col">E.M.C Date</th>
                                 <!--<th scope="col">Reminder Amount</th>-->
                                 <!--<th scope="col">Reminder Date</th>-->
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($data as $key => $FetchData)
                        @php
                        $re = getLestreminder($FetchData['id'])
                        @endphp
                            <tr>
                                <td>{{ $FetchData->id }} </td>
                                <td>
                               <!-- @if($FetchData->photo)
                                                                                   
                                    <img src="{{ env('IMAGE_SHOW_PATH').'AMC/'.$FetchData['photo'] }}" class="img-fluid" style="width: 85%; height: 55px;" alt="{{$FetchData->image}}">
                                @else
                                    <img src="{{asset('image/blank.png')}}" class="img-fluid" style="width: 79%; height: 64px;" alt="avatar.png">
                                @endif-->
                                
                              
                            @if($FetchData->photo)
                             <img src="{{ env('IMAGE_SHOW_PATH').'AMC/'.$FetchData['photo'] }}" class="img-fluid" style="width: 100%; height: 55px;" alt="not found">
                            @else
                                    <img src="{{asset('image/user.png')}}" class="img-fluid" style="width: 15%;height: 30px;" alt="avatar.png">
                           
                            @endif
                            
                    
                                
                                </td>
                                <td>{{ $FetchData->name }} </td>
                                <td>{{ $FetchData->website_name }}</td>
                                <td>{{ $FetchData->mobile }}</td>
                                <td>{{ $FetchData->amc_amount }}</td>
                                <td>{{ $FetchData->emc_date }}</td>
                                 <!--<td>{{ $re['amount'] ?? ''  }}</td>
                                <td>{{ $re['date'] ?? '' }}</td>-->

                              
                               		<td>
								  @if($FetchData->status==1)
                                              
                                    	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $FetchData->id }}" data-name="Active" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light amc_status" style ="display:inline">Active</button>
                                 
   								@else
   								  
                                    	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $FetchData->id }}" data-name="Inactive" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light amc_status" style ="display:inline">Inactive</button>
                                   
								@endif
                                                        							
									</td>
                     
                                 <td>
                                        <ul class="list-inline mb-0" style="width: 121%;">
                                           
                                                <a href="{{ route('admin.website_amc.show',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search font-size-18"></i></a>
                                          
                                                <a href="{{ route('admin.website_amc.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                                
                                                <a href="{{url('admin/invoice')}}/{{$FetchData->id}}" class="px-2 text-primary mybutton" data-id="{{ $FetchData->id }}" id="mymodal" data-toggle="tooltip" data-target="#Modal_id"  data-placement="top" title="Amc Invoice"><i class="fa fa-diamond font-size-18" ></i></a>
                                               <a  class="px-2 text-primary mybutton" data-id="{{ $FetchData->id }}" id="mymodal" data-toggle="tooltip" data-target="#Modal_id"  data-placement="top" title="Amc Reminder"><i class="fa fa-comment font-size-18" onclick="open_modal();"></i></a>

                                            </li>
											
										
                                        </ul>
                                    </td>
                                
                                
                                
                            </tr>
                               @endforeach
                             
                            
                           
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
    <!-- end row -->
     </div>
    </section>
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
              {!! Form::open(array('route' => 'admin.webamc.status','method'=>'POST','id'=>'create','files' => true)) !!}
            {!! Form::hidden('status_name',null,array('id'=>'status_name','class'=>'form-control' )) !!} 
           {!! Form::hidden('webamc_id',null,array('id'=>'webamc_id','class'=>'form-control' )) !!} 
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


<div class="modal fade" id="theModal" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content model_poj">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title ">AMC Reminder</h4>
          <button type="button" class="close" onclick="hide_modal();">X</button>

 </div>

      <!-- Modal body -->
      <form action="{{ route('admin.AmcDetails') }}" method="post">
              	 @csrf
                <input type="hidden" class="form-control" id="web_amc_id" name="web_amc_id" placeholder="web_amc_id" value="">

             <input type=hidden id="delete_id" name=delete_id>
             <div class="row m-2">
                <div class=" col-md-12 title"></div>
                <div class="col-md-5">
            		<div class="form-group">
            			<label>From Date</label>
            			<input type="date" class="form-control" id="from_date" name="from_date"  value="{{date('Y-m-d') ?? ''}}">
            	    </div>
            	</div>                
                <div class="col-md-5">
            		<div class="form-group">
            			<label>To Date</label>
            			<input type="date" class="form-control" id="to_date" name="to_date" value="{{date('Y-m-d') ?? ''}}">
            	    </div>
            	</div>                
                <div class="col-md-4">
            		<div class="form-group">
            			<label>Description</label>
            			<textarea id="description" name="description" rows="4" cols="50"></textarea>

            		
            	    </div>
            	</div>                
              
            	</div>
           
 
            <center>
         <div class="col-md-12 pb-4">
            <button type="submit" class="btn btn-primary text-white">Submit</button>
   </div>
         </center>
       </form>

    </div>
  </div>
</div>


<script>
	$(".mybutton").click(function(){
	    var amc_id = $(this).data('id');
		$("#web_amc_id").val(amc_id);
	})
</script>
<script>
    $('.amc_status').click(function() {
    var webamc_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#webamc_id').val(webamc_id); 
   $('#exampleModalCenter').modal('show');
  } );
</script>



<script type="text/javascript">
  function open_modal()
  {
    $('#theModal').modal('show');
  }
  function hide_modal()
  {
    $('#theModal').modal('hide');
  }
  
  
</script>

<style>
    .model_poj{
        width: 159%;
margin-left: -20%;
margin-top: 16%;
    }
</style>

											
@endsection