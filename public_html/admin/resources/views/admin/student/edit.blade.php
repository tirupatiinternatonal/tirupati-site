

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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp;Student</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/student') }}" class="btn btn-warning  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>

                        </div>
                       {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.student.update', $data->id]]) !!}
                           @csrf
                            <div class="row m-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror @error('name') is-invalid @enderror mt-1" id="name" name="name" placeholder=" Name" value="{{old('name') ?? $data['name'] }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mobile<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('f_mobile') is-invalid @enderror @error('f_mobile') is-invalid @enderror mt-1" id="phone_no" name="phone_no" placeholder="phone no" value="{{old('f_mobile') ?? $data['f_mobile'] }}">
                                        @error('f_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email<span style="color:red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror @error('email') is-invalid @enderror mt-1" id="email" name="email" placeholder="Email" value="{{old('email') ?? $data['email'] }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('date') is-invalid @enderror @error('date') is-invalid @enderror mt-1" id="date" name="date" placeholder="Running days" value="{{old('date')}}">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror @error('city') is-invalid @enderror mt-1" id="city" name="city" placeholder="city" value="{{old('city')}}">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror @error('state') is-invalid @enderror mt-1" id="state" name="state" placeholder="state" value="{{old('state')}}">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror @error('country') is-invalid @enderror mt-1" id="country" name="country" placeholder="country" value="{{old('country')}}">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                               <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DOB<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror @error('dob') is-invalid @enderror mt-1" id="dob" name="dob" placeholder="DOB" value="{{old('dob') ?? $data['dob'] }}">
                                        @error('dom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Aadhar<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('aadhar') is-invalid @enderror @error('aadhar') is-invalid @enderror mt-1" id="aadhar" name="aadhar" placeholder="Offer Name" value="{{old('aadhar') ?? $data['aadhar'] }} "maxlength="12" onkeypress="javascript:return isNumber(event)">
                                        @error('aadhar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('father_name') is-invalid @enderror @error('father_name') is-invalid @enderror mt-1" id="father_name" name="father_name" placeholder="Father Name" value="{{old('father_name') ?? $data['father_name'] }}">
                                        @error('father_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Father Mobile<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('father_mobile') is-invalid @enderror @error('father_mobile') is-invalid @enderror mt-1" id="father_mobile" name="father_mobile" placeholder="Father Mobile" value="{{old('father_mobile') ?? $data['father_mobile'] }}">
                                        @error('father_mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('mother_name') is-invalid @enderror @error('name') is-invalid @enderror mt-1" id="mother_name" name="mother_name" placeholder="Mother Name" value="{{old('mother_name') ?? $data['mother_name'] }}">
                                        @error('mother_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror @error('address') is-invalid @enderror mt-1" id="address" name="address" placeholder="Address" value="{{old('address') ?? $data['address'] }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>-->
                                <div class="form-group col-md-4">
                                  <label for="inputPhoto">Upload photo<span class="text-danger">*</span></label>
                                 
                                  <input id="thumbnail" class="form-control mt-1" type="file" name="photo">

                                  </div>
                                  
                                <div class="form-group col-md-4">
                                    <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                    <img src="{{ env('IMAGE_SHOW_PATH').'student/'.$data['photo'] }}" class="img-fluid" style="width: 30%;" alt="{{$data->photo}}">
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
                                    <button type="submit" class="btn btn-success pl-3 pr-3">Update</button>
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
@endsection