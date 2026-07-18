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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Edit Download Center</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/download_center') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                          {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.download_center.update', $data->id]]) !!}
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Category</label>
                                              <select name="category" id="category" class="mt-2 form-control @error('category') is-invalid @enderror" required>
                                               @if(!empty($routes))
                                                    @foreach ($routes as $route)
                                                        <option value="{{ $route->route }}" {{ ( $route->route == $data['category'] ? 'selected' : '' ) }}>{{ $route->category_name }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">Title</label>
                                              <input type="text" class="form-control mt-2" name="title"
                                                id="title" placeholder="Enter Title"value="{{old('title') ?? $data['title'] }}" required>
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
                                            <option value="png" {{ old('file_type', $data->file_type) == 'png' ? 'selected' : '' }}>PNG</option>
                                            <option value="jpeg" {{ old('file_type', $data->file_type) == 'jpeg' ? 'selected' : '' }}>JPEG or JPG</option>
                                            <option value="pdf" {{ old('file_type', $data->file_type) == 'pdf' ? 'selected' : '' }}>PDF</option>
                                            <option value="gif" {{ old('file_type', $data->file_type) == 'gif' ? 'selected' : '' }}>GIF</option>
                                            <option value="svg" {{ old('file_type', $data->file_type) == 'svg' ? 'selected' : '' }}>SVG</option>
                                            <option value="doc" {{ old('file_type', $data->file_type) == 'doc' ? 'selected' : '' }}>DOC and DOCX</option>
                                            <option value="html" {{ old('file_type', $data->file_type) == 'html' ? 'selected' : '' }}>HTML and HTM</option>
                                            <option value="xls" {{ old('file_type', $data->file_type) == 'xls' ? 'selected' : '' }}>XLS and XLSX</option>
                                            <option value="txt" {{ old('file_type', $data->file_type) == 'txt' ? 'selected' : '' }}>TXT</option>
                                            <option value="ppt" {{ old('file_type', $data->file_type) == 'ppt' ? 'selected' : '' }}>PPT or PPTX</option>
                                        </select>
                                    
                                        @error('file_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                             

                                
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto">Image<span class="text-danger">*</span></label>
                                       <input id="thumbnail" class="form-control mt-2" type="file" name="photo" value="{{ $data['photo'] ?? ''}}" accept="image/*" >
                                            
                                     <div class="form-group col-md-4">
                                       <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                       <img src="{{ env('IMAGE_SHOW_PATH').'download_center/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}" value="{{old('photo') ?? $data['photo'] }}">
                                     </div>
                                 </div>
                            </div>
                                    
                               
                                </div>
                                     <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success pl-3 pr-3">Update</button>
                                </div>
                            </div>
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
    .Label_top{
        margin-top: 25px;
    }
</style>
 <link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>

	<script>
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>

@endsection