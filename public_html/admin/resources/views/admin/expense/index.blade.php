@extends('admin.layouts.app')

@section('title') @lang('translation.Dashboard')
@endsection @section('content')
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
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                                Expense') }}
                            </h3>
                            <div class="card-tools">
                                 <a href="{{url('admin/paid/index')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-rupee"></i> {{ __(' Paid') }}</a>
                                
                                <a href="{{url('admin/expense/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                                <a href="{{url('admin/expense/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                            </div>
                        </div>  
                    <form  class="eye_hide"  method="get" >
                 @csrf 
				<div class="row p-2">
              
                    <div class="col-md-2">    
								
                                <label for="frome_date">From Date </label>
              			<input class="form-control"  type="date" name="frome_date" id="frome_date"  value="<?php if (isset($_POST['form_date']) && !empty($_POST['form_date'])){ echo $_POST['form_date'];}?>">

                                                                 
                            </div>
                    <div class="col-md-2">    
								
                                <label for="to_date">To Date </label>
              			<input class="form-control"  type="date" name="to_date" id="to_date"  value="<?php if (isset($_POST['to_date']) && !empty($_POST['to_date'])){ echo $_POST['to_date'];}?>">

                                                                 
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
                           	    <button type="submit" class="btn btn-success mt-3 text-center" style="margin-bottom:5%;"> <a href="{{url('admin/expense')}}" class="text-white btn-sm">{{ __(' Refresh') }}</a></button>

                    	</div>
						</div>
						</form>
                        <div class="row m-2">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr No</th>
                                            <th>User</th>
                                            <th>Expense Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                          @if(!empty($data))

                                            @php
                                                $i=1;
                                               $total=0;
                                            @endphp
                                  @foreach($data as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$value['username'] ?? ''}}</td>
                                            <td>{{$value['expense_name'] ?? ''}}</td>
                                            <td>{{$value['date'] ?? ''}}</td>
                                            <td>{{$value['quantity'] ?? ''}}</td>
                                            <td>{{$value['rate'] ?? ''}}</td>
                                           <!-- <td>
                                                @if($value->attachment)
                                                    <img src="{{ env('IMAGE_SHOW_PATH').'expense/'.$value['attachment'] }}" class="img-fluid" style="max-width:80px" alt="{{$value->attachment}}">
                                                @else
                                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                                @endif
                                            </td>-->
                                            
                                            <td>{{$value['quantity']*$value['rate'] ?? ''}}</td>
                                            <!--<td>{{$value['description'] ?? ''}}</td>-->
                                            
                                            
                                            <!-- <td>
                                                 @if($value->status==1)
                                              
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Active" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light sa-params expense_status" style ="display:inline">Active</button>
                                             
               								@else
               								  
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Inactive" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light expense_status" style ="display:inline">Inactive</button>
                                               
            								@endif
                                                
                                            </td>-->
                                             <td>
                                                 @if($value['status'] == 0)
                                               <button type="button" class="btn btn-success"><span class="badge ">Pay</span></button>
                                                @else
                                                <button type="button" class="btn btn-danger"><span class="badge">UnPay</span></button>

                                                @endif
                                             </td>

                                            <td>
                                                
                                                
                                                 <a  href="{{ route('admin.expense.show',$value->id)  }}" data-id="{{$value->id}}"class=" text-danger btn-xs ml-3" title="Show"><i class="	fa fa-search"></i></a>
                                                
                                                <a href="{{  route('admin.expense.edit',$value->id)  }}" class=" text-success btn-xs ml-3" title="Edit Account"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{  route('admin.expense.destroy',$value->id)  }}"  data-id="{{$value->id}}"  data-location="countries"  class="px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['admin.expense.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}                                              
                                            {!! Form::close() !!}
                                              
                                            </td>
                                           
                                        </tr>
                                         @php
                                            $total += $value['quantity']*$value['rate'];
                                         @endphp
                                         @endforeach
                            
                            
                             
                             <tfoot>
                                        
                               
                                  <tr>
                                        <td class="text-white">Total</td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td></td> 
                                        <td> <b>Total Amount</b></td>
                                        <td> <b>₹ {{ $total ?? '' }}</b></td>
                                        <td></td>
                                        
                                      
                                  </tr>    
                              
                               
                            
                               
                            </tfoot>
                              @endif
                            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('.expense_status').click(function() {
    var expense_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#expense_id').val(expense_id); 
  } );
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
            <form action="{{ route('admin.expense.status') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="expense_id" name="expense_id" />
                    <input type="hidden" id="status_name" name="status_name" />
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
<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection