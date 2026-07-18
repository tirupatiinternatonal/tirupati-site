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
                        <i class="fa fa-address-book-o"></i> &nbsp; {{ __(' AMC Reminder View') }}
                     </h3>
                     <div class="card-tools">
                        <a href="{{url('admin/website_amc')}}" class="btn btn-warning text-white btn-sm"><i
                           class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                     </div>
                  </div>

    
          
                <div class="card-body">
                 
                    <div class="mt-4">                        
                        <div class="product-desc">								
                           
                                        
                                     
                                         <table class="table table-nowrap mb-0">
                                            <tbody>
                                          
                                        		<tr>
                                                    <th scope="row" style="width: 20%;">Sr No</th>
                                                    <th scope="row" style="width: 20%;">From Date</th>
                                                    <th scope="row" style="width: 20%;">To Date</th>
                                                    <th scope="row" style="width: 20%;">Description</th>
                                                    <th scope="row" style="width: 20%;">Action</th>

                                                </tr> 
                                             
												@if(!empty($data)) 
										
    							            	@php 
                								    $i=1 
                								@endphp 
                						
            								@foreach ($data as $item)
												<tr>
                                                	<td>{{ $i++ }}</td>
									            	<td>{{ $item['from_date'] ?? '' }}</td>
									            	<td>{{ $item['to_date'] ?? '' }}</td>
									            	<td>{{ $item['description'] ?? '' }}</td>
									            	<td>
                                                     <a  class="px-2 text-primary mybutton editBtn" data-from_date="{{$item->from_date}}"data-id="{{$item->id}}" data-description="{{$item->description}}" data-to_date="{{$item->to_date}}" data-web_amc_id="{{$item->web_amc_id}}" data-id="{{ $FetchData->id }}" id="mymodal" data-toggle="tooltip" data-target="#Modal_id"  data-placement="top" title="Edit Amc Reminder"><i class="fa fa-pencil-square-o font-size-18" onclick="open_modal();"></i></a>

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
         </div>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="modal fade" id="theModal" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content model_poj">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title ">Edit AMC Reminder</h4>
          <button type="button" class="close" onclick="hide_modal();">X</button>

 </div>

      <!-- Modal body -->
      <form action="{{ route('admin.AmcDetailsEdit') }}" method="post">
              	 @csrf
                 	<input type="hidden"  id="web_amc_id" name="web_amc_id"  value="">
                 	<input type="hidden"  id="id" name="id"  value="">

             <div class="row m-2">
                <div class=" col-md-12 title"></div>
                <div class="col-md-5">
            		<div class="form-group">
            			<label>From Date</label>
            			<input type="date" class="form-control" id="from_date" name="from_date" placeholder="Date" value="">
            	    </div>
            	</div>                
                <div class="col-md-5">
            		<div class="form-group">
            			<label>To Date</label>
            			<input type="date" class="form-control" id="to_date" name="to_date" placeholder="Date" value="">
            	    </div>
            	</div>                
                <div class="col-md-4">
            		<div class="form-group">
            			<label>Comment</label>
            			<textarea id="description" name="description" rows="4" cols="50"></textarea>

            		
            	    </div>
            	</div>                
              
            	</div>
           
 
            <center>
         <div class="col-md-12 pb-4">
            <button type="submit" class="btn btn-primary text-white">Update</button>
   </div>
         </center>
       </form>

    </div>
  </div>
</div>


<style>
    .model_poj{
        width: 159%;
margin-left: -20%;
margin-top: 16%;
    }
</style>
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

<script>
 	$(".editBtn").click(function(){
		var id = $(this).data('id');
		var web_amc_id = $(this).data('web_amc_id');
		var from_date = $(this).data('from_date');
		var to_date = $(this).data('to_date');
		var description = $(this).data('description');
	

		$("#id").val(id);
		$("#web_amc_id").val(web_amc_id);
		$("#from_date").val(from_date);
		$("#to_date").val(to_date);
		$("#description").val(description);
	
	})   
</script>
<script>
    $('.amc_status').click(function() {
    var amc_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#webamc_id').val(webamc_id); 
   $('#exampleModalCenter').modal('show');
  } );
</script>

@endsection