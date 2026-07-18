@extends('admin.layouts.app')
@section('title')  
@section('content')


 <div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp;View Task
                                
                            </h3>
                            
                          
                        </div>
                    
                                 <div class="table-responsive mb-4 p-3">
                                 <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">    
                                 <thead>
                                <tr>                              
								<th scope="col">ID</th>
								<th scope="col">User Name</th>								
								<th scope="col">Mobile</th>								
							
								<th scope="col">Last Updated</th>
							    <th scope="col" style="width: 200px;" class="pl-5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
						@php
						$i = 1;
						@endphp
							 @foreach ($data as $key => $FetchData)		
						
                                <tr>
                                   
									<td>{{ $i++ }}</td>									
									<td>{{ $FetchData->users_name }}</td>																		
									<td> {{ $FetchData->users_mobile }}</td>																		
																										
							
									<td>{{ date('d/m/Y h:i A',strtotime(($FetchData['created_at']))) }} </td>
                                  
                                    
                                     
                                            <td >
                                            <a  href="{{ route('admin.task.show',$FetchData->user_id)  }}" class=" text-danger btn-xs ml-3" title="Show"><i class="	fa fa-search"></i></a>
                                              
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
              {!! Form::open(array('route' => 'admin.task.status','method'=>'POST','id'=>'create','files' => true)) !!}
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
        $(".task_status").on("click", function(){
                var id = $(this).data("id");
                var status = $(this).data("status");
                $("#status1").val(status); 
                $("#id1").val(id); 
                $('#exampleModalCenter').modal('show');
        }); 
</script>
    <!-- end row -->
@endsection