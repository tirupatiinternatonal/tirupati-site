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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Add Career JD</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/career_jd') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.career_jd.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="post">Post Apply</label>
                                        <input type="text" class="form-control mt-2" name="post" id="post" placeholder="Enter Post Apply" required>
                                        @error('post')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                       <label for="imge">Image</label>
                                        {!! Form::file('photo',array('class' => 'form-control mt-2','id'=>'photo')) !!}
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="minimum_requirement">Minimum/Mandatory Requirements</label>
                                        <textarea class="form-control ckeditor mt-2" id="minimum_requirement" placeholder="Minimum/Mandatory Requirements" name="minimum_requirement" rows="4" cols="50" required></textarea>
                                        @error('minimum_requirement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="addon_requirement">Addon Requirments</label>
                                        <textarea class="form-control ckeditor mt-2" id="addon_requirement" placeholder="Addon Requirments" name="addon_requirement" rows="4" cols="50" required></textarea>
                                        @error('addon_requirement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="offers">Offers & Pakcages</label>
                                        <textarea class="form-control ckeditor mt-2" id="offers" placeholder="Offers & Pakcages" name="offers" rows="4" cols="50" required></textarea>
                                        @error('offers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="job_description">Job Description</label>
                                        <textarea class="form-control ckeditor mt-2" id="job_description" placeholder="Job Description" name="job_description" rows="4" cols="50" required></textarea>
                                        @error('job_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>


@endsection










