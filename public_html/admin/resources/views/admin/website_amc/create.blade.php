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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Add AMC.</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/website_amc')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>

{!! Form::open(array('route' =>'admin.website_amc.store' ,'method'=>'POST','id'=>'create','files' => true)) !!}
<div class="row m-3">
    <div class="col-xl-12">
            <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif    -->
        <div class="row">
            
           
            <div class="col-lg-3">
                  <div class="form-group">
                        <label>Name<span style="color:red;">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                       
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                   <div class="col-lg-3">
                <div class="form-group">    
                    
                    <label>Owner mobile no.<span style="color:red;">*</span></label>
                 <input type="text" class="form-control @error('mobile') is-invalid @enderror @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Owner mobile no" value="{{old('mobile')}}" maxlength ="10">
                 @error('mobile')
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="mobile">Email</label>
                    {!! Form::text('email',null,array('placeholder' => 'Email','class'=>'form-control')) !!} 
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="link">Website link</label>
                    {!! Form::text('website_link',null,array('placeholder' => 'Website link','class'=>'form-control')) !!} 
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="link">Website Name</label>
                    {!! Form::text('website_name',null,array('placeholder' => 'Website Name','class'=>'form-control')) !!} 
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="amaount">Amount</label>
                    <!--{!! Form::number('amount',null,array('placeholder' => 'Amount','class'=>'form-control')) !!} -->
                    <input type="text"  class="form-control" id="amount" name="amount" onkeypress="javascript:return isNumber(event)"  placeholder="Amount" value="{{old('amount')}}">
                    
                </div>
            </div>
             <div class="col-lg-3">
                <div class="form-group">
                    <label for="name">User name</label>
                    {!! Form::text('user_name',null,array('placeholder' => 'User name','class'=>'form-control')) !!} 
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="Password">Password</label>
                    <!--{!! Form::text('password',null,array('placeholder' => 'password','class'=>'form-control')) !!} -->
  <input type="text"  class="form-control" id="pass_word" name="pass_word"  placeholder="Password" value="{{old('pass_word')}}" >
                                                                                                 
                    
                </div>
            </div>
            <div class="col-lg-3">
                 <div class="form-group">
                <label class="control-label">Website type<span class="required"></span></label> 
                <select name="website_type" id="website_type" class="form-control ">
                <option value="Online" >Select Website</option>
                <option value="Online" {{ ( 'Online' == old('website_type')) ? 'selected' : '' }}>Online</option>
                <option value="Offline" {{ ( 'Online' == old('website_type')) ? 'selected' : '' }}>Offline</option>
                                          
                </select>
              </div>
            </div>
            
      
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="date">Registration date</label>
                    <!--{!! Form::date('registration_date',null,array('placeholder' => 'Registration date','class'=>'form-control')) !!}-->
                    <input type="date" class="form-control" id="registration_date" name="registration_date" placeholder="registration_date" value="{{date('Y-m-d') ?? ''}}">
                </div>
            </div>
              <div class="col-lg-3">
                <div class="form-group">
                    <label for="emc_date">E.M.C date</label>
                    {!! Form::date('emc_date',null,array('placeholder' => 'E.M.C date','class'=>'form-control')) !!} 
                </div>
            </div>
           

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="amount">A.M.C amount</label>
                    <!--{!! Form::text('amc_amount',null,array('placeholder' => 'A.M.C amount','class'=>'form-control')) !!} -->
                    <input type="text"  class="form-control" id="amc_amount" name="amc_amount" onkeypress="javascript:return isNumber(event)"  placeholder="A.M.C amount" value="{{old('amc_amount')}}">
                </div>
            </div>
             <div class="col-md-12">
            <div class="row">
               
                    <div class="col-md-3">
                <div class="form-group">
                <label for="inputPhoto">Upload photo</label>
                                 
                <input id="thumbnail" class="form-control mt-1" type="file" name="photo">
                </div>
            </div>
             <div class="col-md-3">
                   <label for="plan_details">Plan details</label>
                  <textarea class=" form-control" rows="5" id="plan_details" name="plan_details" value="">{{old('plan_details')}}</textarea>
                  
            </div>
                </div>
            
            
           
            
        </div>
        </div>
        
        <div class="row">
                     <div class="row m-6">
                                <div class="col-md-4 mt-2 ml-3">
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
                            
                      <!--                    <div class="col-lg-6">  
                <div class="form-group">
                  <label for="name">Status</label>                  
                </div>
                <div class="form-group">
                  <input value="1"  name="status" type="checkbox" id="switch1" switch="none" checked/>
                  <label for="switch1" data-on-label="Active"
                  data-off-label="Inactive"></label>
                </div>
              </div>  -->
            </div>  
            
            <div class="row text-center">
                <div class="col-md-12">
                    <button class="btn btn-primary text-white">Submit</button>
                </div>
            </div>
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
<!--@section('script')
<script src="{{ URL::asset('assets/libs/dropify/dropify.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/dropify.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
//First upload
 var firstUpload = new FileUploadWithPreview('myFirstImage')
 //Second upload
 var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection-->
@endsection
