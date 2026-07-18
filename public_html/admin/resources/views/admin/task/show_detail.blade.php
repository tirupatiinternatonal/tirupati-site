@extends('admin.layouts.app')

@section('title') @lang('translation.Dashboard')
@endsection @section('content')
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">  
                    <div class="card card-outline card-orange"> 
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                                Task Details') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('https://rukmanisoftware.com/admin2/admin/task/3') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                                        
                              </div>
                            </div>
                            <div class="row m-2">
                            <div class="col-12">
                         <table id="example1" class="table table-bordered table-striped dataTable dtr-inlin">
                                            <thead>
                                       
                                                <tr>
                                                         <th> Date </th>
								                         <th>Task Name</th>
								                         <th>Assign By</th>
								                         <th>To Assign</th>
								                         <th>Task Attachment</th>
								                         <th>Task Status</th>
								             
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
                                                       
                                                        <input   type="hidden" name="assign_id_by[]"id="assign_id_by__{{$key}}">
                                                        <input type="hidden" name="assign_name_by[]"id="task_assign_by_name_{{$key}}">
                                                       @php
                                                    
                                                        $employee_id = array();
                                                        
                                                            if($data['assign_by_id'] > 0){ 
                                                            $val = $data['assign_by_id'];
                                                            $employee_id = explode(',', $val);
                                                         }
                                                        
                                                        @endphp
                                                        
                                                      <select class="js-example-tokenizer form-control assigned_by " {{\Auth::user()->role_id != 1 ? 'disabled' : ''}} id="_{{$key}}" multiple="multiple">
                                                     
                                                      
                                                        @foreach($taskDetails as $item)
                                                         @php
                                                       
                                                      
                                                         @endphp
                                                        <option value="{{$item->id.'@'.$item->assign_by_name}}"  @if(in_array($item->id,$employee_id)) selected="" @endif>{{$item->assign_by_name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="taskid[]" value="{{$data->id ?? ''  }}">
                                                        <input type="hidden" name="to_assign_id[]"id="task_assign_id_{{$key}}">
                                                        <input type="hidden" name="to_assign_name[]"id="task_assign_name_{{$key}}"> 
                                                        <input type="hidden" name="to_assign_new_id[]"id="task_assign_id_new_{{$key}}">
                                                        <input type="hidden" name="to_assign_new_name[]"id="task_assign_name_new_{{$key}}"> 
                                                        
                                               
                                                       @php
                                                        $getRole = getRole($data['role_id']);
                                                        $employee_id = array();
                                                        
                                                            if($data['to_assign_id'] > 0){ 
                                                            $val = $data['to_assign_id'];
                                                            $employee_id = explode(',', $val);
                                                         }
                                                         
                                                        @endphp
                                                        
                                                      <select data-task_id="{{$data->id}}" class="js-example-tokenizer form-control select2 " {{$data->assign_by_id == Auth()->id()  ? '' : 'disabled'}} id="{{$key}}" multiple="multiple">
                                                     
                                                      
                                                        @foreach($getRole as $item)
                                                         @php
                                                        $getAssignedRole = getAssignedRole($item['id']);
                                                         @endphp
                                                        <option value="{{$item->id.'@'.$item->name}}"  @if(in_array($item->id,$employee_id)) selected="" @endif>{{$item->name}}</option>
                                                          @endforeach
                                                        </select>
                                                    </td>
                                               
                                                   <td>
                                                       
                                                <img style="width: 47%;height: 89px;"  src="<?php echo env('IMAGE_SHOW_PATH').'task_docs/'.$data->task_attachment; ?>"  class="attechment avatar-md rounded-circle">  
                                                        
                                                       
                                                   </td>
                                                    <td>
                                                        
                                                         @if(\Auth::user()->role_id == 1)
                                                  
                                                {{$data->task_status == 1 ? 'Completed' : 'Pending'}}
                                                   
                                                    @else
                                                 <select class="form-control task_status" data-task_id="{{$data->id}}"  >
                                                 <option value="0" {{$data->task_status == 0 ? 'selected' : ''}}>Pending</option>
                                                 <option value="1" {{$data->task_status == 1 ? 'selected' : ''}}>Completed</option>
                                                        
                                                    </select> 
                                                    
                                                    </td> 

                                                </tr>
                                         
                                            </tbody>
                                            </table>
                                             @endif
                                             @endforeach
                                            
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </section>
                                                </div>
  <button style="visibility:hidden" data-toggle="modal" data-target="#myModelTwo" class="attach" ></button>
        <script type="text/javascript">
    
 
    $('.js-example-tokenizer').select2();
   
   
$(".select2").on("change", function(){
  
var id = $(this).attr("id");
//alert($('#'+id).val());
var value = $('#'+id).val();
var task_id = $(this).data("task_id");


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
  
  if($(this).val() == "")
  {
      
  }else
  {
      
  
     $.ajax({
                type: "POST",
                url: "/admin/admin/task_reassigned",
                data: {
        '_token': '{{ csrf_token() }}',
        task_id: task_id,
        assign_id: $("#task_assign_id_"+id).val(),
        assign_name: $("#task_assign_name_"+id).val()
               },
            
                success: function(response) {
                     location.reload(true);
                  
                }
            });
  }


}); 


$(".select3").on("change", function(){
  

var id = $(this).attr("id");

//alert($('#'+id).val());
var value = $('#'+id).val();
var task_id = $('#'+id).data("task_id");

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
  
  if($(this).val() == "")
  {
      
  }else
  {
      
  
     $.ajax({
                type: "POST",
                url: "/admin/admin/task_reassigned",
                data: {
        '_token': '{{ csrf_token() }}',
        task_id: task_id,
        assign_id: $("#task_assign_id_"+id).val(),
        assign_name: $("#task_assign_name_"+id).val()
               },
            
                success: function(response) {
                     location.reload(true);
                  
                }
            });
  }

}); 


$(".attechment").on("click", function(){
    
   var value =  $(this).attr("src");
    $('.attach').trigger('click');
    $('#attached_docs').attr('src',value);
       
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



  
    <!-- end row -->
<style>
    .table-nowrap td, .table-nowrap th {
    white-space: inherit;
}

</style>    


@endsection