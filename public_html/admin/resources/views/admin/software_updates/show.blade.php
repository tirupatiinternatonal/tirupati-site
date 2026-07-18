@extends('admin.layouts.app')

@section('title')
    Software Updates
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content pt-3">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12 col-md-12">

                    <div class="card card-outline card-orange">

                        <div class="card-header bg-primary">

                            <h3 class="card-title">
                                <i class="fa fa-code"></i> &nbsp; {{ __('View Software Update') }}
                            </h3>

                            <div class="card-tools">
                                <a href="{{url('admin/software_updates')}}" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                                </a>
                            </div>

                        </div>



                        <div class="card-body">

                            <div class="mt-4">

                                <div class="product-desc">

                                    <div class="tab-content border border-top-0 p-4">

                                        <div class="tab-pane fade show active">

                                            <div class="table-responsive">

                                                <table class="table table-nowrap mb-0">

                                                    <tbody>

                                                        @if(!empty($data))

                                                            <tr>
                                                                <th style="width:20%">Version</th>
                                                                <td>{{$data['version'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">Release Date</th>
                                                                <td>{{$data['release_date'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">Release Type</th>
                                                                <td>{{$data['release_type'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">New Features</th>
                                                                <td>{{$data['new_features'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">Improvements</th>
                                                                <td>{{$data['improvements'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">Bug Fixes</th>
                                                                <td>{{$data['bug_fixes'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th style="width:20%">Security Updates</th>
                                                                <td>{{$data['security_updates'] ?? ''}}</td>
                                                            </tr>

                                                            <tr>

                                                                <th style="width:20%">Status</th>

                                                                <td>

                                                                    @if($data->status==1)

                                                                        <button class="btn btn-success btn-sm">
                                                                            Active
                                                                        </button>

                                                                    @else

                                                                        <button class="btn btn-danger btn-sm">
                                                                            Inactive
                                                                        </button>

                                                                    @endif

                                                                </td>

                                                            </tr>

                                                        @endif

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection