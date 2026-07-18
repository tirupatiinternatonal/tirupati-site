@extends('admin.layouts.app')

@section('title')
    @lang('translation.Dashboard')
@endsection

@section('content')
@php
$getCountry = getCountry();
$getcitie = getCity();
$getstate = getState();
//dd($getcitie);
//dd($routes);
@endphp


<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-bank"></i> &nbsp; Edit Testimonial

                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/testimonila') }}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>
                        </div>

                        {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.testimonila.update', $data->id]]) !!}
                            <div class="row m-2">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto">Image <span class="text-danger">*</span></label>
                                        <input id="thumbnail" class="form-control mt-2" type="file" name="photo" value="{{ $data['photo'] ?? '' }}" accept="image/*">
                                        <div class="form-group col-md-4 mt-2">
                                            <label for="inputPhoto"></label>
                                            <br>
                                            <img src="{{ env('IMAGE_SHOW_PATH').'testimonila/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{ $data->photo }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dr_name">Dr. Name</label>
                                        <input type="text" class="form-control mt-2" name="dr_name" id="dr_name" placeholder="Enter Dr. Name" value="{{ old('dr_name') ?? $data['dr_name'] }}" required>
                                        @error('dr_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="hospital_name">Hospital Name</label>
                                        <input type="text" class="form-control mt-2" name="hospital_name" id="hospital_name" placeholder="Enter Hospital Name" value="{{ old('hospital_name') ?? $data['hospital_name'] }}" required>
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
                                                id="email" placeholder="Enter Email" value="{{ old('email') ?? $data['email'] }}" required>
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
                                                id="mobile" placeholder="Enter Mobile No." value="{{ old('mobile') ?? $data['mobile'] }}" maxlength="10" onkeypress="javascript:return isNumber(event)" required>
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
                                        <textarea id="address" class="form-control" name="address" Placeholder="Address" rows="4" cols="50">{{ old('address') ?? $data['address'] }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="remark">Remark</label>
                                        <input type="text" class="form-control mt-2" name="remark" id="remark" placeholder="Enter Remark" value="{{ old('remark') ?? $data['remark'] }}" required>
                                        @error('remark')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row m-2">
                                   <div class="col-md-3">
                               <div class="form-group">
                                        <label for="file_type">Ratting</label>
                                        <select name="ratting" id="ratting" class="mt-2 form-control @error('ratting') is-invalid @enderror" required>
                                            <option value="">Give Your Valuable Ratting</option>
                                            <option value="1" {{ old('ratting', $data->ratting) == '1' ? 'selected' : '' }}>⭐</option>
                                            <option value="2" {{ old('ratting', $data->ratting) == '2' ? 'selected' : '' }}>⭐⭐</option>
                                            <option value="3" {{ old('ratting', $data->ratting) == '3' ? 'selected' : '' }}>⭐⭐⭐</option>
                                            <option value="4" {{ old('ratting', $data->ratting) == '4' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                                            <option value="5" {{ old('ratting', $data->ratting) == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                                        </select>
                                    
                                        @error('ratting')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" id="country_id" class="mt-2 form-control @error('country') is-invalid @enderror" required>
                                            @if(!empty($getCountry))
                                                @foreach ($getCountry as $Country)
                                                    <option value="{{ $Country->id }}" {{ ($Country->id == $data['country'] ? 'selected' : '') }}>
                                                        {{ $Country->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                 

                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select name="state" id="state_id" class="mt-2 form-control @error('state') is-invalid @enderror" required>
                                            @if(!empty($getstate))
                                                @foreach ($getstate as $state)
                                                    <option value="{{ $state->id }}" {{ ($state->id == $data['state'] ? 'selected' : '') }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select name="city" id="city_id" class="mt-2 form-control @error('city') is-invalid @enderror" required>
                                            @if(!empty($getcitie))
                                                @foreach ($getcitie as $City)
                                                    <option value="{{ $City->id }}" {{ ($City->id == $data['city'] ? 'selected' : '') }}>
                                                        {{ $City->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
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

<style>
    .Label_top {
        margin-top: 25px;
    }
</style>

<link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
<script src="{{ URL::asset('public/assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('public/assets/dropify.js') }}"></script>
<script src="{{ URL::asset('public/assets/dropify1.js') }}"></script>

<script>
     function isNumber(evt){
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            
                 return true;
            }
</script>

<script>
    CKEDITOR.editorConfig = function (config) {
        config.extraPlugins = 'confighelper';
    };
    CKEDITOR.replace('editor1');
</script>

@endsection
