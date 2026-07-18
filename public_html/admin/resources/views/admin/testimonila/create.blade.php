@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')


@php
$getCountry = getCountry();
$getcitie = getCity();
$getstate = getState();
@endphp
<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Add Testimonial
</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/testimonila') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.testimonila.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                 <div class="form-group col-md-3">
                                       <label for="imge">Logo</label>
                                        {!! Form::file('photo',array('class' => 'form-control mt-2','id'=>'photo' ,'required')) !!}
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Dr. Name</label>
                                              <input type="text" class="form-control mt-2" name="dr_name"
                                                id="dr_name" placeholder="Enter Dr. Name" required>
                                        @error('dr_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Hospital Name</label>
                                              <input type="text" class="form-control mt-2" name="hospital_name"
                                                id="hospital_name" placeholder="Enter Hospital Name" required>
                                        @error('hospital_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                              <input type="text" class="form-control mt-2" name="email"
                                                id="email" placeholder="Enter Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile">Mobile No.</label>
                                              <input type="text" class="form-control mt-2" name="mobile"
                                                id="mobile" placeholder="Enter Mobile No." maxlength="10" onkeypress="javascript:return isNumber(event)" required>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" class="form-control" name="address" Placeholder="Address" rows="4" cols="50"></textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Remark </label>
                                        <!--<input type="text" class="form-control mt-2" name="remark"-->
                                        <!--        id="remark" placeholder="Enter Remark" required>-->
                                         <textarea name="remark" id="remark" class="form-control mt-2" required placeholder="Enter Remark"></textarea>
                                              
                                        @error('remark')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Ratting  </label>
                                                <select name="ratting" id="ratting" class="mt-2 form-control @error('ratting') is-invalid @enderror" required>
                                            <option value="">Give Your Valuable Ratting</option>
                                            <option value="1">⭐</option>
                                                <option value="2">⭐⭐</option>
                                                <option value="3">⭐⭐⭐</option>
                                                <option value="4">⭐⭐⭐⭐</option>
                                                <option value="5">⭐⭐⭐⭐⭐</option>
                                        </select>
                                        @error('ratting')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                       <div class="form-group">
                                              <label for="Username">Conutry </label>
                                              <select name="country" id="country_id" class="mt-2 form-control @error('country') is-invalid @enderror" >
                                                @if(!empty($getCountry))
                                    		    @foreach ($getCountry as $Country)
                                    		      	<option value="{{ $Country->id }}" {{ ( $Country->id == old('country')) ? 'selected' : '' }}>{{$Country->name}}</option>
                                    		   @endforeach
                                    		   @endif
                                              </select>
                                              
            
                                      </div>
                                </div>
                                <div class="col-md-3">
                                       <div class="form-group">
                                              <label for="Username">State </label>
                                              <select name="state" id="state_id" class="mt-2 form-control @error('state') is-invalid @enderror" >
                                                @if(!empty($getstate))
                                    		    @foreach ($getstate as $state)
                                    		      	<option value="{{ $state->id }}" {{ ( $state->id == old('state')) ? 'selected' : '' }}>{{$state->name}}</option>
                                    		   
                                    		   @endforeach
                                    		   @endif
                                              </select>
                                              
            
                                      </div>
                                </div>
                                
                                <div class="col-md-3">
                                       <div class="form-group">
                                              <label for="Username">City </label>
                                              <select name="city" id="city_id" class="mt-2 form-control @error('city') is-invalid @enderror" >
                                                @if(!empty($getcitie))
                                    		    @foreach ($getcitie as $City)
                                    		      	<option value="{{ $City->id }}" {{ ( $City->id == old('city')) ? 'selected' : '' }}>{{$City->name}}</option>
                                    		   @endforeach
                                    		   @endif
                                              </select>
                                              
            
                                      </div>
                                </div>
                               
                               
                            </div>
                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
    </section>
</div>


<style>
    .Label_top{
        margin-top: 25px;
    }
     .action_container {
            display: flex;
            gap: 5px;
        }
        .add-row {
            text-align: center;
        }
</style>
 <link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
     function isNumber(evt){
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            
                 return true;
            }
</script>
@endsection










