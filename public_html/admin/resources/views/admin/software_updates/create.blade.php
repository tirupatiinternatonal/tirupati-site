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
                                <a href="{{url('admin/software_updates')}}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </div>

                        </div>

                        <form action="{{ route('admin.software_updates.store') }}" method="POST">
                            @csrf

                            <div class="row m-2">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Version<span style="color:red;">*</span></label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-1" 
                                            name="version" 
                                            placeholder="Version (Ex: v4.2.0)"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Release Date<span style="color:red;">*</span></label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-1" 
                                            name="release_date"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Release Type</label>
                                        <select class="form-control mt-1" name="release_type">
                                            <option value="Major">Major</option>
                                            <option value="Minor">Minor</option>
                                            <option value="Patch">Patch</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-2">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Features</label>
                                        <textarea name="new_features" class="form-control mt-1"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Improvements</label>
                                        <textarea name="improvements" class="form-control mt-1"></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-2">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bug Fixes</label>
                                        <textarea name="bug_fixes" class="form-control mt-1"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Security Updates</label>
                                        <textarea name="security_updates" class="form-control mt-1"></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row m-2">

                                <div class="col-md-4 mt-2">
                                    <label>Status</label>

                                    <div class="check-box mt-2">
                                        <input value="1" name="status" type="checkbox" checked/>
                                    </div>

                                </div>

                            </div>


                            <div class="row m-2">

                                <div class="col-md-12 text-center">

                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">
                                        Save
                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection