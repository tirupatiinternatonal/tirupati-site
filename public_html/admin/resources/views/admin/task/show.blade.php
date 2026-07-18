@extends('admin.layouts.app')

@section('title') @lang('translation.Dashboard')
@endsection @section('content')
@php
$sidebar = DB::table('tasks')->get();
@endphp

                    <div class="content-wrapper">
                    <section class="content pt-3">
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                    <div class="card-header bg-primary">
                    <h3 class="card-title">
                    <i class="fa fa-address-book-o"></i>  &nbsp;View Task
                    </h3>
                    <div class="card-tools">
                    <a href="{{ url('https://rukmanisoftware.com/admin2/admin/task') }}" class="btn btn-warning text-white btn-sm"><i
                    class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                    </div>
                           
                </div>
                <div class="card-body">
                <div class="row" >
                         
                        <div class="col-md-8">
                    {!! Form::open(array('method'=>'get')) !!}
                        <div class="row">
                        
                        <div class="col-md-3">
                                 <input value="{{$_GET['task_date'] ?? '' }}" type="date" class="form-control rounded bg-light border-0" name="task_date">
                        </div>
                        <div class="col-md-3">
							    <input value="{{ $_GET['task_end_date'] ?? ''}}" type="date" class="form-control rounded bg-light border-0"  name="task_end_date">
							    
                        </div>
						 <div class="col-md-3">
							    <select class="form-control " name="task_status">
							        <option value=""  >Select Status</option>
                                    <option value="0" <?php if (isset($_GET['task_status']) && !empty($_GET['task_status']))  ( $_GET['task_status'] == 0) ? 'selected' : ''  ?> > Pending </option>
                                    <option value="1"<?php if (isset($_GET['task_status']) && !empty($_GET['task_status']))  ( $_GET['task_status'] == 1) ? 'selected' : ''  ?> >Completed</option>
                                    </select>
                        </div>
                           
                           
						<div class="form-inline float-md-right mb-3">
							
							
						<button class="btn btn-light waves-effect" type="submit">
						<i class="fa fa-search"></i>
						</button>
							
						</div>
							
                        </div>
                        {!! Form::close() !!}
                         </div>
                        <div class="col-md-4">
                        <button data-toggle="modal" data-target="#myModal"class="btn btn-success waves-effect waves-light"><i class="fa fa-plus"></i> Add New</button>
                            
                         <a class="btn btn-danger waves-effect ml-2" href="{{url('admin/task/')}}/{{$FetchData['id'] ?? ''}}">
						 <i class="fa fa-refresh">&nbsp;Refresh!</i>
							</a>
                            </div>
                    </div>
                    </div>
                    <div class="col-12">
                           
                              <div class="table-responsive mb-4 p-3">
                                 <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">       
                                 <thead>
                                <tr> 
                                                    <th>Date</th>
								                    <th>Task Name</th>
                                                    <th>Action</th>
                                                </tr>
                                     </thead>
                                                 
                                       <tbody class="product_list_show">
                                                @php
                                                $i = 1;
                                              
                                                @endphp
                                                
                                                @foreach ($taskDetails as $key => $data)
                                                <tr>
                                                    <td>{{$data->created_at ?? ''  }}</td>
                                                    <td>{{$data->task_name ?? ''  }}</td>
                                                    
                                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a  href="{{ url('admin/show_detail') }}/{{$data->user_id}}/{{date('Y-m-d', strtotime($data->created_at))}}"  class=" px-2 text-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-search font-size-18"></i></a>
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
                                </section>
                                </div>
    
  <button style="visibility:hidden" data-toggle="modal" data-target="#myModelTwo" class="attach" ></button>
        <script type="text/javascript">
    


$(".attechment").on("click", function(){
    
   var value =  $(this).attr("src");
    $('.attach').trigger('click');
    $('#attached_docs').attr('src',value);
       
});




  $(document).on('change', '.task_status', function(e) {
            e.preventDefault();
            //console.log("hello");
           
           
           
        
            $.ajax({
                type: "POST",
                url: "/admin/admin/task_status_submit",
                data: {
        '_token': '{{ csrf_token() }}',
        task_id: $(this).data("task_id"),
        status: $(this).val()
               },
            
                success: function(response) {
                     location.reload(true);
                  
                }
            });
        });

</script>


<!-- model -->
<div class="modal" id="myModelTwo" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
       
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="attached_docs" src=""style="width:100%">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
    <!-- end row -->
<style>
    .table-nowrap td, .table-nowrap th {
    white-space: inherit;
}

</style>    
   
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       {!! Form::open(array('route' => 'admin.task.assignUpdate','method'=>'POST','id'=>'create','files' => true)) !!}
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
              <input name="user_id" type="hidden" value="{{\Auth::user()->id}}">
              <div class="col-lg-12">
                  <div class="form-group">
                      
                    <label for="add_task">Assign By</label>
                       <select class="form-control  "  id="" name="assign_by_id">
                           <option value="1" >select</option>
                            @foreach($sidebar as $item)                            
                            <option value=""  >{{$item->title ?? ''}}</option>
                              @endforeach
                        </select>  
                 
                  </div>
                </div>
                   <div class="col-lg-12">
                  <div class="form-group">
                      @php
                       $getRole = getRole(2);
                      @endphp
                    <label for="add_task">User Name</label>
                       <select class="form-control  "  id="" name="to_assign_id">
                            @foreach($getRole as $item1)
                            @if(\Auth::user()->id == $item1['id'])
                            <option value="{{$item1['id']}}"  >{{$item1['name'] ?? ''}}</option>
                            @endif
                              @endforeach
                        </select>  
                 
                  </div>
                </div> 
                
                   <div class="col-lg-12">
                  <div class="form-group">
                      <label for="task_name">Task Name</label>
                        <textarea class="form-control"type="text" id= "task_name" name="task_name"placeholder="Task Name"></textarea>
                  </div>
                </div> 
                   <div class="col-lg-12">
                  <div class="form-group">
                      <label for="task_attachment">Task Attachment</label>
                        <input class="form-control"type="file" id= "task_attachment" name="task_attachment"placeholder="Task Attachment">
                  </div>
                </div> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  
</div>


@endsection