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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Create student</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/student') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                                <!--<a href="https://www.school.rukmanisoftware.com/account_dashboard" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                            </div>

                        </div>






                        <form id="quickForm" action="{{route('admin.student.store')}}"  method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror @error('name') is-invalid @enderror mt-1" id="name" name="name" placeholder=" Name" value="{{old('name')}}" required>
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
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror @error('mobile') is-invalid @enderror mt-1" id="mobile" name="mobile" placeholder="91+" value="{{old('mobile')}}"maxlength="10" onkeypress="javascript:return isNumber(event)" required>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email<span style="color:red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror @error('email') is-invalid @enderror mt-1" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
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
                                        <label>Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('mother_name') is-invalid @enderror @error('mother_name') is-invalid @enderror mt-1" id="mother_name" name="mother_name" placeholder="Mother Name" value="{{old('mother_name')}}">
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
                                        <input type="text" class="form-control @error('address') is-invalid @enderror @error('address') is-invalid @enderror mt-1" id="address" name="address" placeholder="Address" value="{{old('address')}}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
       -->
                                <div class="form-group col-md-4">
                                  <label for="inputPhoto">Upload photo<span class="text-danger">*</span></label>
                                 
                                  <input id="thumbnail" class="form-control mt-1" type="file" name="photo">
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
        </div>
    </section>
</div>
<script type="text/javascript">
    function isNumber(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
</script>
  

@endsection