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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Edit Department</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/enquiry') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
  {!! Form::model($FetchData, ['method' => 'PATCH','files' => true,'route' => ['admin.department.update', $FetchData->id]]) !!}
<div class="row p-3">
    <div class="col-md-12 col-12">
        <label for="name">Department Name</label>
        {!! Form::text('name',null,array('placeholder' => 'Department Name','class'=>'form-control w-25')) !!}
    </div>
</div>
<br>
<div class="row text-center pb-3">
    <div class="col-md-12 col-12">
        <button type="sumbit" class="btn btn-primary">Submit</button>
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