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
<i class="fa fa-code"></i> &nbsp; {{ __('View Software Updates') }}
</h3>

<div class="card-tools">
<a href="{{ url('admin/software_updates/create') }}" class="btn btn-warning text-white btn-sm">
<i class="fa fa-plus"></i> {{ __('Add') }}
</a>
</div>

</div>



{!! Form::open(['method'=>'get']) !!}

<div class="row m-2">

<div class="col-md-3">

<label>Release Date</label>

<input 
type="date"
class="form-control mb-3"
name="release_date"
value="{{ request('release_date') }}"
>

</div>


<div class="col-md-3">

<label class="text-white">Search</label><br>

<button type="submit" class="btn btn-success">
Search
</button>

</div>

</div>

{!! Form::close() !!}



<div class="col-12">

<table id="example1" class="table table-bordered table-striped">

<thead>

<tr>
<th>Sr</th>
<th>Version</th>
<th>Release Date</th>
<th>Release Type</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

@if(!empty($data))

@php $i = 1; @endphp

@foreach($data as $value)

<tr>

<td>{{ $i++ }}</td>

<td>{{ $value->version }}</td>

<td>{{ $value->release_date }}</td>

<td>{{ $value->release_type }}</td>


<td>

@if($value->status == 1)

<button
type="button"
data-toggle="modal"
data-target="#Modal_id"
data-id="{{ $value->id }}"
data-name="Active"
class="btn btn-success btn-sm software_status"
>
Active
</button>

@else

<button
type="button"
data-toggle="modal"
data-target="#Modal_id"
data-id="{{ $value->id }}"
data-name="Inactive"
class="btn btn-danger btn-sm software_status"
>
Inactive
</button>

@endif

</td>


<td>

<a
href="{{ url('admin/software_updates/'.$value->id.'/edit') }}"
class="btn btn-primary btn-sm"
>
<i class="fa fa-edit"></i>
</a>

</td>

</tr>

@endforeach

@endif

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</section>

</div>



<!-- STATUS MODAL -->

<div class="modal" id="Modal_id">

<div class="modal-dialog">

<div class="modal-content bg_color">

<div class="modal-header">

<h4 class="modal-title text-white">
Change status
</h4>

<button type="button" class="btn-close" data-dismiss="modal">
<i class="fa fa-times"></i>
</button>

</div>


<form id="statusForm" method="post">

@csrf

<div class="modal-body">

<input type="hidden" id="software_id" name="software_id"/>
<input type="hidden" id="status_name" name="status_name"/>

<h5 class="text-white">
Are you sure you want to change status?
</h5>

</div>


<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">
Close
</button>

<button type="submit" class="btn btn-danger">
Yes
</button>

</div>

</form>

</div>

</div>

</div>



<script>

$(document).on('click','.software_status',function(){

var id = $(this).data('id');
var status_name = $(this).data('name');

$('#status_name').val(status_name);
$('#software_id').val(id);

// dynamic route set
$('#statusForm').attr('action',"{{ url('admin/software_updates/status') }}/"+id);

});

</script>

@endsection