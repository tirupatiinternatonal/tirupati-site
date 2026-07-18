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
                        <i class="fa fa-address-book-o"></i> &nbsp; View Expanse
                     </h3>
                     <div class="card-tools">
                        <a href="{{url('admin/expense')}}" class="btn btn-warning text-white btn-sm"><i
                           class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                     </div>
                  </div>

                  <div class="card-body">
                     <div class="">
                        <div class="product-desc">
                           <div class="tab-content border border-top-0 p-4">
                              <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                 <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                       <tbody>
                                          @if(!empty($data))
                                         
                                          <tr class="">
                                             <th style="width: 20%;">User</th>
                                             <td>{{$data['user_id'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Expense Name</th>
                                             <td>{{$data['expense_name'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Date</th>
                                             <td>{{$data['date'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Quantity</th>
                                              <td>{{$data['quantity'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Rate</th>
                                              <td>{{$data['rate'] ?? ''}}</td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Attachment</th>
                                             <?php $image = URL::asset('public/uploads/expense/'.$data->image); ?>
                                            <td>
                                                @if($data->attachment)
                                                    <img src="{{ env('IMAGE_SHOW_PATH').'expense/'.$value['attachment'] }}" class="img-fluid" style="max-width:80px" alt="{{$value->attachment}}">
                                                @else
                                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                                                @endif
                                            </td>
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Amount</th>
                                              <td>{{$data['total_amt'] ?? ''}}</td>
                                          </tr>
                                      
                                          <tr >
                                             <th style="width: 20%;">Description</th>
                                              <td>{{$data['description'] ?? ''}}</td>
                                          </tr>
                                         
                                      
                                           
                                          
                                       </tbody>
                                 
                                       @endif
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
      </div>
   </section>
</div>


@endsection