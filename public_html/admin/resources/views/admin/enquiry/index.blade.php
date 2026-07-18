@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')






<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; View Enquiry
                                
                            </h3>
                            
                            <div class="card-tools">
                                <a href="{{url('admin/enquiry/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>Add</a>
                               
                            </div>
                        </div>
                        
                        
                        <div class="card">
            <div class="card-body">
                 {!! Form::open(array('method'=>'get')) !!}
                <div class="row mb-2">
                    
                        
                          @if(\Auth::user()->role_id == 1) 
                    <div class="col-md-2">
                        <select class="form-control" id="user_id" name="user_id" >
                			<option value="">Select</option>
                		    @if(!empty(getuser())) 
                                          @foreach(getuser() as $type1)
                		
                                     <option value="{{ $type1->id ?? ''  }}" {{ ( $type1['id'] == old('id')) ? 'selected' : ''   }}>{{ $type1['name'] ?? ''  }}</option>
                                  @endforeach
                              @endif
                			
                            </select> 
                        </div>
                   @endif
                    <div class="col-md-2 ">
                        <select class="form-control rounded  border-1" name="responce_status_id"  >
                                         
                             <option value="">--Responce Select--</option>
                                             @if(!empty($responce_status)) 
                                                  @foreach($responce_status as $views)
                                                     <option value="{{ $views->id ?? ''  }}" <?php if (isset($_GET['responce_status_id']) && !empty($_GET['responce_status_id'])){ echo ($views['id'] == $_GET['responce_status_id']) ? 'selected' : '' ;} ?> >{{ $views->name ?? ''  }}</option>
                                                  @endforeach
                                              @endif
                                            
                                        </select>
                            
                        </select>
                        </div>
                    
                    <div class="col-md-2">
                            
                                 <input value="{{$_GET['enquiry_date']  ?? ''}}" type="date" class="form-control rounded  border-1" name="enquiry_date">
                            
                        </div>
                        <div class="col-md-2">
                           
							   <input value="{{ $_GET['enquiry_end_date']  ?? ''}}" type="date" class="form-control rounded  border-1"  name="enquiry_end_date">
                            
                        </div>
                    <div class="col-md-2 float-md-right ">
                            <input value="<?php if (isset($_GET['mobile']) && !empty($_GET['mobile'])){ echo $_GET['mobile'];}?>" type="text" class="form-control rounded  border-1" placeholder="Mobile Number" name="mobile">
                        
                        </div>
                        
                    <div class="col-md-2">
                      <div class="input-group form-inline float-md-right">
      
      <div class="input-group-append">
       <button class="input-group-text btn btn-light waves-effect" type="submit"style="border: none;background-color: #834597;color: #fff;height: 29px;
margin-left: -14px;">
                            <i class="fa fa-search"></i>
                            </button>
                            
                            
      </div>
      <div class="card-tools">
                                <a href="{{url('admin/enquiry')}}" class="btn btn-warning text-white btn-sm filltter"><i
                                        class="fa fa-filter"></i>Clear Filter</a>
                               
                            </div>
    </div>
    
                       </div>
                     <!--  <div class="col-md-2 float-md-right">
                            <a href="{{ route('admin.enquiry.create') }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i> Add New</a>
                        </div>-->

                    
                </div>
                 {!! Form::close() !!}
                <!-- end row -->
                        
                   
               
                <!-- end row -->
                <div class="table-responsive mb-4 mt-2">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                        <thead>
                            <tr>                              
                           
                             <th scope="col"> Sr.No</th>  
                              <th>Time</th>
                            <th scope="col">User Name</th> 
                            <th class="colm_set"> Name</th>                           
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>                                
                            <th scope="col">Status</th> 
                            <th scope="col">Action</th>
                           
                            
                          <!--  <th scope="col" style="width: 200px;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                        @foreach ($data as $key => $FetchData)
                    

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ date('d-m-y h:i A',strtotime($FetchData['created_at'])) }} </td>
                                <td>{{$FetchData['User']['name'] ?? '' }} </td>
                                <td style="width: 367px !important;">{{ $FetchData->name ??''  }}</td>                                   
                                <td><a href="tel:+91-{{ $FetchData->mobile }}"> {{ $FetchData->mobile }}</a></td>                                 
                                <td>{{ $FetchData->email }}</td>                                 
                                <!--<td>{{ $FetchData->address }}</td>-->                                 
                                <td>
                                    
                                              <select class="form-control work_status" name="status" data-id="{{$FetchData->id ??''}}" >
                                         
                                             <option value="">--Select--</option>
                                             @if(!empty($responce_status)) 
                                                  @foreach($responce_status as $view)
                                                  
                                                     <option value="{{ $view->id ?? ''  }}" {{ ( $view['id'] == $FetchData['responce_status_id']) ? 'selected' : '' }}>{{ $view->name ?? ''  }}</option>
                                                  @endforeach
                                              @endif
                                            
                                        </select>
                                      
                                </td>                                 
                                                           
                                <td style="width: 156px !important;">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item" >
                                            <a href="{{ route('admin.enquiry.show',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ route('admin.enquiry.edit',$FetchData->id) }}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            	
												 <a   data-id="{{$FetchData->id}}"  data-location="countries"  class="user_delete text-danger  ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                               {!! Form::open(['method' => 'DELETE','route' => ['admin.enquiry.destroy', $FetchData->id]]) !!}                                              
                                            {!! Form::close() !!}
												
										     
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
            <form action="{{ route('admin.enquiry.destroy')}}" method="post">
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Give Message</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           {!! Form::open(array('route' => 'admin.enquiry.status','method'=>'POST','id'=>'create','files' => true)) !!}
           {!! Form::hidden('status',null,array('id'=>'status','class'=>'form-control' )) !!} 
           {!! Form::hidden('enquiry_id',null,array('id'=>'update_id','class'=>'form-control')) !!} 
          <div class="row">
                   <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Date</label>
                    
                       {!! Form::date('date',date('Y-m-d'),array('placeholder' => 'Date','class'=>'form-control')) !!} 
                  </div>
                </div> 
                 <div class="col-lg-12">
                      <div class="form-group">
                    <label for="address">Reminder date</label>
                     <input  type="datetime-local" class="form-control" placeholder="Reminder Date" name="reminder_date">
                        
      
                     </div>
                </div> 
          
                   <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Message</label>
                       {!! Form::textarea('message',null,array('placeholder' => 'Message','class'=>'form-control')) !!}  
                  </div>
                </div>
               
               
               </div>   
      </div>
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    
          {!! Form::close() !!}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>


<script>
    $(".work_status").on("change", function(){
        var id = $(this).data("id");
        var status = $(this).val();
       $("#status").val(status); 
       $("#update_id").val(id); 
       
  $('#exampleModalCenter').modal('show');
        
    }); 
    
    
      
  
   
     $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
   
 
</script>
<style>
.filltter{
    margin-left: 7px;
height: 30px;
}

    .table-nowrap td, .table-nowrap th {
    white-space: normal;
}
.table td, .table th {
    padding: 3px;
    vertical-align: top;
    border-top: 1px solid #f5f6f8;
}
.colm_set{
    width: 14%;
}
</style>
@endsection