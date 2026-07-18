@extends('admin.layouts.app')

 @section('content')
<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp; Edit Response Status</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/responce_status') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
  {!! Form::model($FetchData, ['method' => 'PATCH','files' => true,'route' => ['admin.responce_status.update', $FetchData->id]]) !!}
<div class="row m-4 mb-4" >
    <div class="col-md-4 col-12">
        <label for="name">Responce status name</label>
        {!! Form::text('name',null,array('placeholder' => 'Responce status name','class'=>'form-control ')) !!}
    </div>
    <div class="col-md-6 col-12">
        <label for="color">Color</label>
        {!! Form::color('color',null,array('placeholder' => 'Color','class'=>'form-control w-25')) !!}
    </div>
</div>

<br>
<div class="row text-center mb-4">
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