@extends('admin.layouts.app')

@section('title') @lang('translation.Dashboard')

@endsection @section('content')
@php
$getuser = getuser();

@endphp
<div class="content-wrapper uper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-rupee"></i> &nbsp; Paid Expanse</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/expense') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>
                        </div>

            <form  class="eye_hide"  method="get" >
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
                            <label></label>
                    	    <button type="submit" class="btn btn-primary mt-3 text-center" style="margin-bottom:5%;">Search</button>
                    	      <button type="submit" class="btn btn-success mt-3 text-center" style="margin-bottom:5%;"> <a href="{{url('admin/paid/index')}}" class="text-white btn-sm">{{ __(' Refresh') }}</a></button>
                    	</div>
						</div>
						</form>
                           
                
                
                <form id="quickForm" action="{{route('admin.expense.store')}}"   method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="row m-2">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    
                                    <thead>
                                        <tr role="row">
                                            <th></th>
                                            <th>User</th>
                                            <th>Expense Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <!--<th>Attachment</th>-->
                                            <th>Amount</th>
                                            <th></th>
                                            <!--<th>Description</th>-->
                                            <!--<th>Status</th>-->
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">

                                            @php
                                                $i=1;
                                                $total = 0;
                                            @endphp
                                            
                                          @if(!empty($data))
                                   
                                  @foreach($data as $value)
                                        <tr>
                                           <td>
                                                 @if($value->status==1)
                                              
                                                <input type="checkbox" id="paid_status" name="paid_status" value="1">
                                             
               								@else
               								  
                                                	<input type="checkbox" id="paid_status" name="paid_status" value="0" checked>
                                               
            								@endif
                                                
                                            </td>
                                            <td>{{$value['name'] ?? ''}}</td>
                                            <td>{{$value['expense_name'] ?? ''}}</td>
                                            <td>{{$value['date'] ?? ''}}</td>
                                            <td>{{$value['quantity'] ?? ''}}</td>
                                            <td>{{$value['rate'] ?? ''}}</td>
                                           
                                            
                                            <td>{{$value['total_amt'] ?? ''}}</td>
                                            <!--<td>{{$value['description'] ?? ''}}</td>-->
                                            <td></td>
                                            
                    <!--                         <td>-->
                    <!--                             @if($value->status==1)-->
                                              
                    <!--                            	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Paid" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light sa-params expense_status" style ="display:inline">Paid</button>-->
                                             
               					<!--			@else-->
               								  
                    <!--                            	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Unpaid" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light expense_status" style ="display:inline">Unpaid</button>-->
                                               
            								<!--@endif-->
                                                
                    <!--                        </td>-->
                                            
                                            <!--<td>-->
                                                
                                                
                                            <!--     <a  href="{{ route('admin.expense.show',$value->id)  }}" data-id="{{$value->id}}"class=" text-danger btn-xs ml-3" title="Show"><i class="	fa fa-search"></i></a>-->
                                                
                                            <!--    <a href="{{  route('admin.expense.edit',$value->id)  }}" class=" text-success btn-xs ml-3" title="Edit Account"><i-->
                                            <!--            class="fa fa-edit"></i></a>-->
                                            <!--    <a href="{{  route('admin.expense.destroy',$value->id)  }}"  data-id="{{$value->id}}"  data-location="countries"  class="px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>-->
                                            <!--{!! Form::open(['method' => 'DELETE','route' => ['admin.expense.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}                                              -->
                                            <!--{!! Form::close() !!}-->
                                              
                                            <!--</td>-->
                                           
                                        </tr>
                                        @php
                                    $total += $value['total_amt'];
                                @endphp
                               
                                         @endforeach
                            
                            @endif
                                    </tbody>
                                    
                                    <tfoot>
                                        <td><b>Total Amount </b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                       <td></td>
                                        
                                        <td> </td>
                                        <td > <b>₹ = {{ $total ?? '' }}</b></td>
                                             
                                             <td>
                                                    <button type="submit" class="btn btn-success btn-sm pl-3 pr-3">Paid</button>

                                             </td>
                                    </tfoot>
                                     
                                </table>
                            </div>
                        </div> 
                </form>
                
                
                
                
                 </div>
                    </div>
                </div>
                
            </div>
            </section>
        </div>
    
        <script>
           
        </script>


<script>
    $('.expense_status').click(function() {
    var expense_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#expense_id').val(expense_id); 
  } );
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