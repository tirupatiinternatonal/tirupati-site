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
                                                    <th scope="row" style="width: 20%;">Title</th>
                                                    <td>{{ $FetchData->title ?? '' }}</td>
                                                </tr>
												
												<tr>
                                                    <th scope="row" style="width: 20%;">Task Details</th>
                                                    <td> {{ $FetchData->task_details ?? ''}}</td>
                                                </tr>
												
											
											
											
												
												<tr>
                                                    <th scope="row" style="width: 20%;">Task Date</th>
                                                    <td>{{ date('m/d/Y',strtotime($FetchData->task_date ?? '')) }}</td>
                                                </tr>										
												<tr>
                                                    <th scope="row" style="width: 20%;">Task End Date</th>
                                                    <td>{{ date('m/d/Y',strtotime($FetchData->task_end_date ?? '')) }}</td>
                                                </tr>										
                                               <tr>
                                                    <th >Task Point</th>
                                                   
                                                </tr>
                                                
                                                
                                           
                                          {!! Form::open(array('route' => 'admin.task.assign','method'=>'POST','id'=>'create','files' => true)) !!}
                                            <tbody>
                                              <tr>
                                                    <th scope="col">@sortablelink('id','ID')</th>
								                    <th scope="col">@sortablelink('task_name', 'Task Name')</th>
								                      <th scope="col">@sortablelink('assigned_by', 'Assign By')</th>
								                      <th scope="col">@sortablelink('to_assign', 'To Assign')</th>
								                      <th scope="col">@sortablelink('status','Current Status') </th>
                                                    
                                                </tr>
                                                	<thead>
                                                @php
                                                $i = 1;
                                                @endphp
                                                @foreach ($taskDetails as $key => $data)
                                                <tr>
                                                    <th scope="row" style="width: 20%;">{{$i++}}</th>
                                                    <td>{{$data->task_name ?? ''  }}</td>
                                                     <td>
                                                       
                                                        <input type="hidden" name="assign_id_by[]"id="assign_id_by__{{$key}}">
                                                        <input type="hidden" name="assign_name_by[]"id="task_assign_by_name_{{$key}}">
                                                       @php
                                                        $getRole = getRole($FetchData['roles_id']);
                                                        $employee_id = array();
                                                        
                                                            if($data['assign_by_id'] > 0){ 
                                                            $val = $data['assign_by_id'];
                                                            $employee_id = explode(',', $val);
                                                         }
                                                        
                                                        @endphp
                                                        
                                                      <select class="js-example-tokenizer form-control assigned_by " {{\Auth::user()->role_id != 1 ? 'disabled' : ''}} id="_{{$key}}" multiple="multiple">
                                                     
                                                      
                                                        @foreach($getRole as $item)
                                                         @php
                                                       
                                                        $getAssignedRole = getAssignedRole($item['id']);
                                                         @endphp
                                                        <option value="{{$item->id.'@'.$item->name}}"  @if(in_array($item->id,$employee_id)) selected="" @endif>{{$item->name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="taskid[]" value="{{$data->id ?? ''  }}">
                                                        <input type="hidden" name="to_assign_id[]"id="task_assign_id_{{$key}}">
                                                        <input type="hidden" name="to_assign_name[]"id="task_assign_name_{{$key}}">
                                                       @php
                                                        $getRole = getRole($FetchData['roles_id']);
                                                        $employee_id = array();
                                                        
                                                            if($data['to_assign_id'] > 0){ 
                                                            $val = $data['to_assign_id'];
                                                            $employee_id = explode(',', $val);
                                                         }
                                                         
                                                        @endphp
                                                        
                                                      <select class="js-example-tokenizer form-control select2 " {{\Auth::user()->role_id != 1 ? 'disabled' : ''}} id="{{$key}}" multiple="multiple">
                                                     
                                                      
                                                        @foreach($getRole as $item)
                                                         @php
                                                        $getAssignedRole = getAssignedRole($item['id']);
                                                         @endphp
                                                        <option value="{{$item->id.'@'.$item->name}}"  @if(in_array($item->id,$employee_id)) selected="" @endif>{{$item->name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                    									@if($data->task_status==1)
                    									<span  class=" btn btn-success btn-sm btn-soft-success waves-effect waves-light"> Completed</span>
                    									@else
                    								<span  class=" btn btn-danger btn-sm btn-soft-danger waves-effect waves-light">Pending</span>
                    									@endif						
                    									</td>
                                                </tr>
                                                @endforeach
                                                
												<tr>
                                                    <th scope="row">
														<a class="btn btn-dark waves-effect waves-light" href="{{ route('admin.task.index') }}"><i class="uil-arrow-left"></i> Back</a>
														<!--<a class="btn btn-success waves-effect waves-light" href="{{ route('admin.task.edit',$FetchData->id) }}"><i class="uil-pen"></i> Edit</a>-->
<!--                                                            <input class="btn btn-success waves-effect waves-light" type="submit" value="Submit">
-->														</th>
                                                   
                                                </tr>
                                                
                                           
                                            <input type="hidden" name="task_detail_id"value="{{$FetchData->id}}" > 
                                           	{!! Form::close() !!}
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
    </div>
  
        <script type="text/javascript">
 
 
    $('.js-example-tokenizer').select2();
   
   
$(".select2").on("change", function(){
  
var id = $(this).attr("id");
//alert($('#'+id).val());
var value = $('#'+id).val();

$("#task_assign_id_"+id).val($('#'+id).val());
var value2  = $("#task_assign_id_"+id).val();
  var arr = value2.split(',');
  var space=",";
  for(i=0; i<arr.length; i++)
  {
       var arr2 = arr[i].split('@');
       if(i==0)
       {
       $("#task_assign_id_"+id).val("");
              $("#task_assign_name_"+id).val("");
       space="";
           
       }else
       {
            space=",";
       }
       
       $("#task_assign_id_"+id).val($("#task_assign_id_"+id).val()+space+arr2[0]);
       $("#task_assign_name_"+id).val($("#task_assign_name_"+id).val()+space+arr2[1]);
  }

}); 


$(".assigned_by").on("change", function(){
  
var id = $(this).attr("id");

//alert($('#'+id).val());
var value = $('#'+id).val();

$("#assign_id_by_"+id).val($('#'+id).val());
var value2  = $("#assign_id_by_"+id).val();

  var arr = value2.split(',');
  var space=",";
  for(i=0; i<arr.length; i++)
  {
       var arr2 = arr[i].split('@');
       if(i==0)
       {
       $("#assign_id_by_"+id).val("");
              $("#task_assign_by_name"+id).val("");
       space="";
           
       }else
       {
            space=",";
       }
       
       $("#assign_id_by_"+id).val($("#assign_id_by_"+id).val()+space+arr2[0]);
       $("#task_assign_by_name"+id).val($("#task_assign_by_name"+id).val()+space+arr2[1]);
  }

}); 


</script>
<style>


    .table-nowrap td, .table-nowrap th {
    white-space: inherit;
}
</style>
    <!-- end row -->
@endsection