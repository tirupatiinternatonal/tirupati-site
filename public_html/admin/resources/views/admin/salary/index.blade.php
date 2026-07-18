@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@php
$getuser = getuser();

@endphp
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; Staff Salary Details 
                                
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/salaryCreate')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>Add</a>
                               
                            </div>
                        </div>
                            <form  class="eye_hide" action="{{ url('admin/salary') }}" method="post" >
                 @csrf 
				<div class="row p-2">
              
                    <div class="col-md-2">    
								
                                <label for="category_id">From Date </label>
              			<input class="form-control"  type="date" name="frome_date" id="frome_date"  value="{{ $search['frome_date']  ?? ''}}">

                                                                 
                            </div>
                    <div class="col-md-2">    
								
                                <label for="category_id">To Date </label>
              			<input class="form-control"  type="date" name="to_date" id="to_date"  value="{{ $search['to_date'] ?? '' }}">

                                                                 
                            </div>
                    <div class="col-md-2">    
								
                                <label for="category_id">Users Name </label>
                                <select class="form-control input1" id="name" name="name">
                                <option value="{{ $search->name ?? '' }}">Select </option>
                                @if(!empty($getuser)) 
                    
                      @foreach($getuser as $getuser)
                       <option value="{{ $getuser->id ?? ''}}" {{ ($getuser->id == $search['name'] ??  old('name')) ? 'selected' : '' }}>{{ $getuser->name ?? ''}}</option>
                      @endforeach
                @endif
                     
                            </select>
                                                                 
                            </div>
                
                    <div class="col-md-2">    
								
                                <label for="category_id">Status </label>
                                <select class="form-control input1" id="pay_status" name="pay_status" value="{{ $search['pay_status'] ?? '' }}">
                                <option value="">Select </option>
                                <option value="1" {{ ( 1 == $search['pay_status'] ??  old('pay_status')) ? 'selected' : '' }}>Pay </option>
                                <option value="0" {{ ( 0 == $search['pay_status'] ??  old('pay_status')) ? 'selected' : '' }}>Unpay </option>
                               
                     
                            </select>
                                                                 
                            </div>
                             
                        
                           
                        <div class="col-md-2">
                            <label></label>
                    	    <button type="submit" class="btn btn-primary mt-3 text-center" style="margin-bottom:5%;">Search</button>
                    	</div>
						</div>
						</form>
					
                <div class="table-responsive mb-4 p-3">
                    <table id="datatable" class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr> 
                                            <th>Sr.no</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Salary</th>
                                            <th>Per Day Amount</th>
                                            <th>Total Amount</th>
                                            <th>Absent</th>
                                            <th>Present</th>
                                            <th>Holiday</th>
                                            <th>Double Shift</th>
                                            <th>Half Day</th>
                                            <th>Salary Day</th>
                                            <th>Incentive</th>
                                            <th>Pay Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                          @if(!empty($data))
                                            @php
                                                $i=1;
                                              $total_amount = 0;
                                            @endphp
                                  @foreach($data as $key => $value)
                                        <tr>
                                           @php
                                           $total_amount +=$value['total_amount'];
                                           @endphp
                                            <td>{{$i++}}</td>
                                            <td>{{$value['date'] ?? ''}}</td>
                                            <td>{{$value['user_name'] ?? ''}}</td>
                                            <td>{{$value['basic_amt'] ?? ''}}</td>
                                            <td>{{$value['per_day_amt'] ?? ''}}</td>
                                             <td>{{$value['total_amount'] ?? ''}}</td>
                                              <td>{{$value['absent'] ?? ''}}</td>
                                              <td>{{$value['present'] ?? ''}}</td>
                                              <td>{{$value['holiday'] ?? ''}}</td>
                                          
                                             <td>{{$value['double_shift'] ?? ''}}</td>
                                              <td>{{$value['half_day'] ?? '0'}}</td>
                                             <td>{{$value['salary_day'] ?? ''}}</td>
                                             <td>{{$value['incentive'] ?? ''}}</td>
                                             <td>
                                                 @if(!empty($value['pay_status']))
                                               <button type="button" class="btn btn-success"><span class="badge ">Pay</span></button>
                                                @else
                                                <button type="button" class="btn btn-danger"><span class="badge">UnPay</span></button>

                                                @endif
                                             </td>
                                             
                                            
                                            <td class="d-flex">
                                            <a  href="{{ route('admin.salary.show',$value->id)  }}" data-id="{{$value->id}}"class=" text-danger btn-xs ml-3" title="Show Details"><i class="	fa fa-search"></i></a>
                                            <a  href="{{ route('admin.salary.print',$value->user_id)  }}" data-id="{{$value->id}}"class=" text-success btn-xs ml-3" title="Print"><i class="	fa fa-print"></i></a>
                                            &nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;
                                               <a class="px-2 text-primary mybutton mt-1" data-id="{{ $value->id }}" data-total-amount="{{ $value->total_amount }}" id="mymodal" data-toggle="tooltip" data-target="#Modal_id"  data-placement="top" title="Amc Reminder"><i class="fa fa-rupee font-size-18" onclick="open_modal();"></i></a>
                                              
										
											
                                            </td>
                                           
                                        </tr>
                                         @endforeach
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="9"> {{$total_amount}}</td>
                                    </tr>
                            @endif
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
            
            {!! Form::hidden('status_name',null,array('id'=>'status_name','class'=>'form-control' )) !!} 
           {!! Form::hidden('student_id',null,array('id'=>'student_id','class'=>'form-control' )) !!} 
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
</form>
        </div>
    </div>
</div>  



<div class="modal fade" id="theModal" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content model_poj" style="margin-left: -25%;width: 150%;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title ">User Pay</h4>
          <button type="button" class="close" onclick="hide_modal();">X</button>

 </div>

      <!-- Modal body -->
      
          <form action="{{ route('admin.salary.pay') }}" method="post">
              	 @csrf
                <input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="">
                <input type="hidden" class="form-control" id="pay_status" name="pay_status" value="1">

             <div class="row m-2">
                <div class=" col-md-12 title"></div>
                <div class="col-md-4">
            		<div class="form-group">
            			<label>Total Amount</label>
            			<input type="text" class="form-control" id="total_amount" name="total_amount"  value="{{$value['total_amount'] ?? ''}}">
            	    </div>
            	</div>                
                <div class="col-md-4">
            		<div class="form-group">
            			<label> Date</label>
            			<input type="date" class="form-control" id="user_pay_date" name="user_pay_date" value="{{date('Y-m-d') ?? ''}}">
            	    </div>
            	</div>                
                <div class="col-md-4">
            		<div class="form-group">
            			<label>Pay Amount</label>
            			<input type="text" class="form-control" id="user_pay_amt" name="user_pay_amt"  value="">

            		
            	    </div>
            	</div>                
              
            	</div>
           
 
            <center>
         <div class="col-md-12 pb-4">
            <button type="submit" class="btn btn-primary text-white">Pay</button>
   </div>
         </center>
       </form>

    </div>
  </div>
</div>
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
	$(".mybutton").click(function(){
	    var pay_id = $(this).data('id');
		$("#id").val(pay_id);
		 var total_amount = $(this).data('total-amount');
		$("#total_amount").val(total_amount);
		
	})
</script>



<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection
