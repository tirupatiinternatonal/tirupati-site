@extends('admin.layouts.app')
@section('title')
@lang('translation.User_List')
@endsection



@section('content')

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-calendar-check-o"></i> &nbsp; Add Staff Attendance</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/attendance')}}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> {{ __('View') }}</a>
                            </div>
                        </div>
                        <form action="{{ route('admin.attendance.create') }}" method="post">
                            @csrf
                        <div class="row m-2">
                            <div class="col-md-4">
                                <label class="">Search By Keywords</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ex. Name, Mobile, Email, Father name etc." value="{{$_POST['name'] ?? ''}}">
                            </div>
                            <div class="col-md-1">
                                <label class="text-white">Search</label>
                                <button type="submit" id="search" class="btn btn-warning text-white">Search</button>
                            </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.attendance_store') }}" method="post">
                            @csrf
                        <div class="row m-2">
                            <div class="col-md-3">
                                <label class="text-danger">Date*</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
                            </div>                            
                            <div class="col-12">
                                <table id="" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>

                                    <tbody class="">
           	                            @if(!empty($data))
                                            @php
                                                $i=1;
                                            @endphp
                                        @foreach($data as $staff)
                                            <input type="text" id="staff_id" name="staff_id[]" class="d-none" value="{{ $staff->id ?? '' }}">
                                        <tr>
        									<td>{{ $i++ }}</td>		
        									<td>{{ $staff->name ?? '' }}</td>									
        									<td>{{ $staff->email ?? '' }}</td>	
        									<td>{{ $staff->mobile ?? '' }}</td>
                                            <td>
                                                <select class="form-control" id="attendance_status_id" name="attendance_status_id[]" >
                                                    @if(!empty($attendanceStatus))
                                                    @foreach($attendanceStatus as $status)
                                                        <option value="{{ $status->id ?? '' }}">{{ $status->name ?? '' }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-warning text-white">Submit Attendance</button>
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