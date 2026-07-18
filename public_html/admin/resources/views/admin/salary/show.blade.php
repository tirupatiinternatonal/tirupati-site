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
                        <i class="fa fa-address-book-o"></i> &nbsp; View Staff Details
                     </h3>
                     <div class="card-tools">
                        <a href="{{url('admin/salary')}}" class="btn btn-warning text-white btn-sm"><i
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
                                           <tr>
                                 <td style="border-top: hidden;">
                                                @if($data->photo)
                                                    <img src="{{ env('IMAGE_SHOW_PATH').'student/'.$data['photo'] }}" class="img-fluid" style="width: 50%;border-radius: 50%;height: 100px;
                                                        border: 3px solid gray;
                                                height: 100px;" alt="{{$data->photo}}">
                                                @else
                                                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="width: 30%;" alt="avatar.png">
                                                @endif
                                            </td>
                                          
                                            </tr>
                                     <tr>
                                         <th>
                                             <h3><b>User Details</b></h3>
                                         </th>
                                         <th>
                                             <h3></h3>
                                         </th>
                                         <th>
                                             <h3 style="position: absolute;"><b>User Salary Details</b></h3>
                                         </th>
                                         <th>
                                             <h3></h3>
                                         </th>
                                      
                                         
                                     </tr>
                                          <tr class="">
                                             <th style="width: 20%;">Name</th>
                                             <td>{{$data['name'] ?? ''}}</td>
                                         
                                             <th style="width: 20%;">Salary</th>
                                             <td>{{$data['salary'] ?? ''}}</td>
                                          </tr>
                                          <tr class="">
                                             <th style="width: 20%;">DOB</th>
                                             <td>{{$data['user_dob'] ?? ''}}</td>
                                             <th style="width: 20%;">Pay Amount</th>
                                              <td>{{$data['user_pay_amt'] ?? ''}}</td>
                                            
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Mobile</th>
                                             <td>{{$data['user_mobile'] ?? ''}}</td>
                                          <th style="width: 20%;">Salary Day</th>
                                              <td>{{$data['salary_day'] ?? ''}}</td>
                                            
                                          </tr>
                                          <tr >
                                             <th style="width: 20%;">Email</th>
                                             <td>{{$data['user_email'] ?? ''}}</td>
                                          <th style="width: 20%;">Incentive</th>
                                              <td>{{$data['incentive'] ?? ''}}</td>
                                            
                                         
                                          <tr >
                                             <th style="width: 20%;">Month</th>
                                             <td>
                                                 @if($data['month_id'] == '1')
                                                 January
                                                 @elseif($data['month_id'] == '2')
                                                 February
                                                 @elseif($data['month_id'] == '3')
                                                 March
                                                 @elseif($data['month_id'] == '4')
                                                 April
                                                 @elseif($data['month_id'] == '5')
                                                 May
                                                 @elseif($data['month_id'] == '6')
                                                 June
                                                 @elseif($data['month_id'] == '7')
                                                 July
                                                 @elseif($data['month_id'] == '8')
                                                 August
                                                 @elseif($data['month_id'] == '9')
                                                 September
                                                 @elseif($data['month_id'] == '10')
                                                 October
                                                 @elseif($data['month_id'] == '11')
                                                 November
                                                 @elseif($data['month_id'] == '12')
                                                 December
                                                @endif
                                                 </td>
                                         <th style="width: 20%;">Present</th>
                                             <td>{{$data['present'] ?? ''}}</td>
                                            
                                          </tr>
                                         
                                        <tr >
                                             <th style="width: 20%;"></th>
                                             <td></td>
                                               <th style="width: 20%;">Absent</th>
                                              <td>{{$data['absent'] ?? ''}}</td>
                                         
                                            
                                         
                                          <tr >
                                        <tr >
                                             <th style="width: 20%;"></th>
                                             <td></td>
                                      
                                            
                                          <th style="width: 20%;">Holiday</th>
                                              <td>{{$data['holiday'] ?? ''}}</td>
                                          <tr >
                                     
                                          
                                      
                                       
                                      
                                         
                                    
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
      </div>
   </section>
</div>

    
@endsection