@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; View Inventery  </h3>
					<div class="card-tools">
					    
					     <a href="{{url('admin/inventery/create')}}" class="btn btn-warning text-white btn-sm"  ><i class="fa fa-plus"></i> Add </a> 
					     <a href="{{url('invantory_dashboard')}}" class="btn btn-warning text-white btn-sm"  ><i class="fa fa-arrow-left"></i> Back </a> 
			          
			           <!-- @if(Session::get('role_id') !== 3)
			            <a href="{{url('')}}" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i> Back</a> 
			            @endif-->
			        </div>
			        
				</div>   
				
                <div class="row m-2">
                 <div class="col-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                  <tr role="row">
                      <th>S.NO.</th>
                           <th>Company</th>
                            <th> Item Name</th>
                            <th>Quantity Stock</th>
                             <th>Amount</th>
                            <th>Total Amount</th>
                            <th>Available Stock</th>
                            <th>Date </th>
                          
                            <th>Action</th>
                        
                    </tr>
                             
                      
                  </thead>
                 <tbody class="product_list_show">
                                          @if(!empty($data))

                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $value)
                                        <tr>
                                            <td>{{$value['id'] ?? ''}}</td>
                                            <td>@if($value['company'] == 1)
                                                    Rukmani
                                                    @else ($value['company'] == 2)
                                                    Tirupati 
                                                    @endif</td>
                                            
                                            <td>{{$value['item_name'] ?? ''}}</td>
                                            <td>{{$value['quantity_stock'] ?? ''}}</td>
                                            <td>{{$value['amount'] ?? ''}}</td>
                                            <td>{{$value['total_amount'] ?? ''}}</td>
                                            <td>{{$value['available_stock'] ?? ''}}</td>
                                            <td>{{$value['date'] ?? ''}}</td>

                                            
                                            <td>
                                              
                                                <li class="list-inline-item">	
                                                  <a href="{{  route('admin.inventery.edit',$value->id)  }}" class=" text-success btn-xs ml-3"
                                                        title="Edit Account"><i class="fa fa-edit"></i></a> </li>
                                               <li class="list-inline-item">										        
										        <a  data-id="{{$value->id}}"  data-location="users"  class="user_delete px-2 text-danger sa-params" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
												{!! Form::open(['method' => 'DELETE','route' => ['admin.inventery.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
												{!! Form::close() !!}
											
                                            </li>
                                              
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
    </section>
</div>

<div class="modal" id="Modal_id1">
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
            <form action="{{ route('admin.inventery.destroy')}}" method="post">
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




<script>
   
  
  
   $('#close,#close1').click(function(){
       $('#id01').hide()
   })
  $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id1").modal("show");
      
   })
</script>
<!-- The Modal -->

<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection 