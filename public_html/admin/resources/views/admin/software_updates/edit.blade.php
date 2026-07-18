@extends('admin.layouts.app')

@section('title') 
    Software Updates 
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
                                <i class="fa fa-code"></i> &nbsp; Software Updates
                            </h3>

                            <div class="card-tools">
                                <a href="{{url ('admin/software_updates_list') }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>

                        </div>


                        {!! Form::model($data, ['method' => 'PATCH','route' => ['admin.software_updates.update', $data->id]]) !!}
                        @csrf


                        <div class="row m-2">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        Version<span style="color:red;">*</span>
                                    </label>

                                    <input 
                                        type="text" 
                                        class="form-control mt-1" 
                                        name="version"
                                        value="{{old('version') ?? $data['version']}}"
                                    >
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        Release Date<span style="color:red;">*</span>
                                    </label>

                                    <input 
                                        type="date" 
                                        class="form-control mt-1" 
                                        name="release_date"
                                        value="{{old('release_date') ?? $data['release_date']}}"
                                    >
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Release Type</label>

                                    <select name="release_type" class="form-control mt-1">

                                        <option value="Major" {{ $data->release_type == 'Major' ? 'selected' : '' }}>
                                            Major
                                        </option>

                                        <option value="Minor" {{ $data->release_type == 'Minor' ? 'selected' : '' }}>
                                            Minor
                                        </option>

                                        <option value="Patch" {{ $data->release_type == 'Patch' ? 'selected' : '' }}>
                                            Patch
                                        </option>

                                    </select>

                                </div>
                            </div>

                        </div>



                        <div class="row m-2">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Features</label>

                                    <textarea name="new_features" class="form-control mt-1">
{{old('new_features') ?? $data['new_features']}}
                                    </textarea>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Improvements</label>

                                    <textarea name="improvements" class="form-control mt-1">
{{old('improvements') ?? $data['improvements']}}
                                    </textarea>
                                </div>
                            </div>

                        </div>



                        <div class="row m-2">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bug Fixes</label>

                                    <textarea name="bug_fixes" class="form-control mt-1">
{{old('bug_fixes') ?? $data['bug_fixes']}}
                                    </textarea>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Security Updates</label>

                                    <textarea name="security_updates" class="form-control mt-1">
{{old('security_updates') ?? $data['security_updates']}}
                                    </textarea>
                                </div>
                            </div>

                        </div>



                        <div class="row m-2">

                            <div class="col-md-4 mt-2">

                                <label>Status</label>

                                <div class="check-box mt-2">
                                    <input 
                                        value="1" 
                                        name="status" 
                                        type="checkbox" 
                                        {{ $data->status == 1 ? 'checked' : '' }}
                                    />
                                </div>

                            </div>

                        </div>



                        <div class="row m-2">

                            <div class="col-md-12 text-center">

                                <button type="submit" class="btn btn-success pl-3 pr-3">
                                    Update
                                </button>

                            </div>

                        </div>


                        {!! Form::close() !!}


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection