@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')

<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Edit Enquiry</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/enquiry') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                {!! Form::model($FetchData, ['method' => 'PATCH','files' => true,'route' => ['admin.enquiry.update', $FetchData->id]]) !!}
                           @csrf

                        <div class="row m-2">
                    <div class="col-md-4">
                        <div class="form-group">
                      <label for="date">Date</label>
                       {!! Form::date('enquiry_date',null,array('class'=>'form-control')) !!}  
                  </div>
                </div> 
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="deepartment">Deepartment</label>
                       {!! Form::select('deepartments_id',getDepartment(),[],array('class'=>'form-control'))  !!}  
               </div>
                </div> 
                <div class="col-lg-4">
                  <div class="form-group">
                      <label for="name">Name</label>
                       {!! Form::text('name',null,array('placeholder' => 'Name','class'=>'form-control')) !!} 
                  </div>
                </div>
          
                <div class="col-lg-4">
                  <div class="form-group">
                      <label for="mobile">Mobile</label>
                      {!! Form::number('mobile',null,array('placeholder' => 'Mobile','class'=>'form-control')) !!} 
                  </div>
                </div>
              
                   <div class="col-lg-4">
                  <div class="form-group">
                    <label for="mobile-2">Mobile-2</label>
                       {!! Form::number('mobile_2',null,array('placeholder' => 'Mobile-2','class'=>'form-control'))  !!} 
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e-mail">E-Mail</label>
                       {!! Form::email('email',null,array('placeholder' => 'E-Mail','class'=>'form-control')) !!}  
                  </div>
                  </div>
           
          
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="address">Address</label>
                       {!! Form::textarea('address',null,array('placeholder' => 'Address','class'=>'form-control')) !!}  
                  </div>
                </div>
                </div>


            <div class="row">
              <div class="col-lg-6">  
                <div class="form-group">
                  <label for="name">Status</label>                  
                </div>
                <div class="form-group">
                  <input value="1"  name="status" type="checkbox" id="switch1" switch="none" {{ ( $FetchData['status'] == 1) ? 'checked' : '' }} >
                  <label for="switch1" data-on-label="Active" data-off-label="Inactive"></label>
                </div>
              </div>                                                                      
            </div>
       <div class="row m-2">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success pl-3 pr-3">Update</button>
                </div>
            </div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

  </section>
</div>

@endsection
