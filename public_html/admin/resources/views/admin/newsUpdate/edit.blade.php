@extends('admin.layouts.app')

@section('title')
    @lang('translation.Dashboard')
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-bank"></i> &nbsp; Edit News & Update

                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/newsUpdate') }}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>
                        </div>
                     {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.newsUpdate.update', $data->id]]) !!}
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="post">Title</label>
                                        <input type="text" class="form-control mt-2" name="title" id="title"  value="{{ old('title') ?? $data['title'] }}" placeholder="Enter Title" required>
                                        @error('post')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="post">Reference No.</label>
                                        <input type="num" class="form-control mt-2" name="reference" id="reference"  value="{{ old('reference') ?? $data['reference'] }}" placeholder="Enter Reference No." required>
                                        @error('reference')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control mt-2" name="date" id="date"  value="{{ old('date') ?? $data['date'] }}" placeholder="Enter date" required>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputPhoto">Upload photo</label>
                                        <input type="file" id="thumbnail" class="form-control mt-2" name="photo" value="{{ $data['photo'] ?? ''}}" accept="image/*">
                                            
                                        <div class="form-group col-md-4">
                                            <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                            
                                            <input type="hidden" class="form-control" name="scrimage" value="{{old('photo') ?? $data['photo'] }}" id="scrimage">
                                            
                                            <img src="{{ env('IMAGE_SHOW_PATH').'newsUpdate/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}" value="{{old('photo') ?? $data['photo'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control ckeditor mt-2" id="description" placeholder="Description" name="description" rows="4" cols="50" required>{{ old('description') ?? $data['description'] }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                

                               

                            <div class=" col-md-12 row m-2">
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
    .opwidhead option:disabled{
       background-color: #ddd;
  color: #000;
  font-weight: bold;
    }
</style>


    <style>
.table-bordered thead td, .table-bordered thead th {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 10px;
}
.table td {
  border-bottom-width: 2px;
  padding: 2px 0px 2px 2px;
}
.select2-container--default .select2-selection--multiple{
    
    border-bottom-right-radius: 0px !important;
    border-top-right-radius: 0px !important;
}

    </style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




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
