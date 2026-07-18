@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@php

//dd($routes);
@endphp
<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Download Center</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/download_center') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.download_center.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                <div class="col-md-3">
                                       <div class="form-group">
                                              <label for="Username">Category</label>
                                              <select name="category" id="category" class="mt-2 form-control @error('category') is-invalid @enderror" required>
                                                @if(!empty($routes))
                                    		    @foreach ($routes as $route)
                                    		      	<option value="{{ $route->route }}" {{ ( $route->route == old('category')) ? 'selected' : '' }}>{{$route->category_name}}</option>
                                    		   
                                    		   @endforeach
                                    		   @endif
                                              </select>
                                              
            
                                      </div>
                                </div>
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Title</label>
                                              <input type="text" class="form-control mt-2" name="title"
                                                id="title" placeholder="Enter Title" required>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                  <div class="col-md-3">
                                       <div class="form-group">
                                        <label for="file_type">File Type</label>
                                        <select name="file_type" id="file_type" class="mt-2 form-control @error('file_type') is-invalid @enderror" required>
                                            <option value="">Select a file type</option>
                                            <option value="png">PNG</option>
                                            
                                            <option value="jpeg">JPEG or JPG</option>
                                            <option value="pdf">PDF</option>
                                            <option value="gif">GIF</option>
                                            <option value="svg">SVG</option>
                                            <option value="doc">DOC and DOCX</option>
                                            <option value="html">HTML and HTM</option>
                                            <option value="xls">XLS and XLSX</option>
                                            <option value="txt">TXT</option>
                                            <option value="ppt">PPT or PPTX</option>
                                        </select>
                                        
                                        @error('file_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                
                                <div class="form-group col-md-3">
                                       <label for="imge">Image</label>
                                        {!! Form::file('photo',array('class' => 'form-control mt-2','id'=>'photo' ,'required')) !!}
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
@endsection










