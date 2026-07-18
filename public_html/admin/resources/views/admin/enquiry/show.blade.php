@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')



<div class="content-wrapper">
   <section class="content pt-3">
      <div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
             <h3 class="card-title">
                                <i class="fa fa-history"></i> &nbsp; History
                                
                            </h3>
            <div class="card-body">
                <div class="mt-4">                        
                    <div class="product-desc">                              
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                <div class="table-responsive">
                                  

                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 20%;">Name</th>
                                                <td>{{$FetchData->name ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 20%;">Mobile</th>
                                                <td>{{$FetchData->mobile ?? ''}}</td>
                                            </tr>
                                            <tr>
                                               <th scope="row" style="width: 20%;">Email</th>
                                                <td>{{$FetchData->email ?? ''}}  </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 20%;">Address</th>
                                                <td>{{$FetchData->address ?? ''}}  </td>
                                            </tr>
                                             
                                        </tbody>
                                        </table>
                              <table class="table table-nowrap mb-0">           
                                        <thead>
                            <tr>                              
                           
                             <!--<th scope="col"> Sr.No</th>  -->
                              <th scope="col" style="width:232px;"> Message</th>  
                            <th scope="col">date</th> 
                             <th scope="col">Reminder date</th>                        

                            <th scope="col">Status</th> 
                           
                            
                           
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                        @foreach ($FetchDetail as $key => $Fetch_detail)
                    

                            <tr>
                                <!--<td>{{ $i++ }}</td>-->
                                <td>{{ $Fetch_detail->message }}</td>
                                <td>{{ date('d-m-Y h:i A',strtotime($Fetch_detail->created_at)) }} </td>
                                <td>@if(!empty($Fetch_detail->reminder_date)){{ date('d-m-Y h:i A',strtotime($Fetch_detail->reminder_date)) }} @endif</td>
                                                              
                                                                 
                                                     
                                <td>
                                 
                                             @if(!empty($responce_status)) 
                                                  @foreach($responce_status as $view)
                                                  @if($view['id'] == $Fetch_detail['status'])
                                                   <p style="color:{{$Fetch_detail->color}}">{{ $view->name ?? ''  }}</p>
                                                     @endif
                                                  @endforeach
                                              @endif
                                            
                                        </select>
                                    
                                      
                                </td>                                 
                                                           
                                
                            </tr>
                        @endforeach
                         <tr>
                                                <th scope="row">
                                                    <a class="btn btn-dark waves-effect waves-light" href="{{ route('admin.enquiry.index') }}"><i class="uil-arrow-left"></i> Back</a>
                                                </th>
                                                <th scope="row">
                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Status</a>
                                                  </th>
                                                 
                                            </tr>
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
    </div>
</div>
    <!-- end row -->
    
    <style>
        th{
            padding: 7px!important;
        }
    </style>
    
    
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Give Message</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           {!! Form::open(array('route' => 'admin.enquiry.status','method'=>'POST','id'=>'create','files' => true)) !!} 
          <div class="row">
                         <input type="hidden" name="enquiry_id" value="{{$FetchData['id']}}">

               <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Status</label>
                    <select class="form-control work_status" name="status" >
                                         
                                             <option value="">--Select--</option>
                                              
                                                                                                    
                                               @if(!empty($responce_status)) 
                                                  @foreach($responce_status as $view)
                                                 
                                                   <option value="{{$view->id}}">{{$view->name}}</option>
                                                     
                                                  @endforeach
                                              @endif       
                                                                                                                                            
                                        </select>
                       
                  </div>
                </div> 
                   <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Date</label>
                    
                       {!! Form::date('date',date('Y-m-d'),array('placeholder' => 'Date','class'=>'form-control')) !!} 
                  </div>
                </div> 
                 <div class="col-lg-12">
                      <div class="form-group">
                    <label for="address">Reminder date</label>
                     <input  type="datetime-local" class="form-control" placeholder="Reminder Date" name="reminder_date">
                        
      
                     </div>
                </div> 
          
                   <div class="col-lg-12">
                  <div class="form-group">
                    <label for="address">Message</label>
                       {!! Form::textarea('message',null,array('placeholder' => 'Message','class'=>'form-control')) !!}  
                  </div>
                </div>
               
               
               </div>   
      </div>
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    
          {!! Form::close() !!}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>


@endsection