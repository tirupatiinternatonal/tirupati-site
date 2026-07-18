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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Add Enquiry</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/enquiry')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                          {!! Form::open(array('route' => 'admin.enquiry.store','method'=>'POST','id'=>'create','files' => true)) !!}

          

                                    <div class="row m-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date<span style="color:red;">*</span></label>
                                          {!! Form::date('enquiry_date',date('Y-m-d'),array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Deepartment<span style="color:red;">*</span></label>
                                     {!! Form::select('deepartment_id',getDepartment(),[],array('class'=>'form-control')) !!}                                     </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name<span style="color:red;">*</span></label>
                                             {!! Form::text('name',null,array('placeholder' => 'Name','class'=>'form-control')) !!} 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile<span style="color:red;">*</span></label>
                                            {!! Form::number('mobile',null,array('placeholder' => 'Mobile','class'=>'form-control','maxlength' => 10 )) !!}
                                           <!-- <input type="text" class="form-control @error('mobile') is-invalid @enderror @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Name" value="{{old('mobile')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>-->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile-2<span style="color:red;">*</span></label>
                                             {!! Form::number('mobile_2',null,array('placeholder' => 'Mobile-2','class'=>'form-control','maxlength' => 10)) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email<span style="color:red;">*</span></label>
                                                 {!! Form::email('email',null,array('placeholder' => 'E-Mail','class'=>'form-control')) !!}  
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Address<span style="color:red;">*</span></label>
                                          {!! Form::textarea('address',null,array('placeholder' => 'Address','class'=>'form-control')) !!}  
                                    </div>
                                </div>
                                
                            </div>


                 
                            <div class="row m-2">
                                <div class="col-md-4 mt-2">
                                    <label for="switch1" data-on-label="Active" data-off-label="Inactive">Status</label>
                                    <div class="check-box mt-2">
                                     <input value="1"  name="status" type="checkbox" id="switch1" switch="none" checked/>
                                    </div>
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">Save</button>
                                </div>
                            </div>
                       {!! Form::close() !!}
       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

/*<script>
    function forceNumeric(){
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g,''));
}
$('body').on('propertychange input', 'input[type="number"]', forceNumeric);
</script>*/
@endsection