@extends('admin.layouts.app')
@section('title')
@lang('translation.User_List')
@endsection
@php
//dd($_POST);
@endphp


@section('content')

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bar-chart"></i> &nbsp; View Staff Attendance</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/attendance/create')}}" class="btn btn-warning text-white btn-sm"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
                            </div>
                        </div>
                        <form id="quickForm" action="{{url('admin/attendance')}}" method="post">
                        @csrf 
                    <div class="row m-2">
                        <div class="col-md-2">
                			<div class="form-group">
                			    <label>Select Month</label>
                			 <select id="month" name="month" class="form-control">
                				  <option value=''>--Select Month--</option>
                                    <option  value="1" {{  ( !empty($_POST['month']) && $_POST['month'] == "1")  ? 'selected' : '' }}>Janaury</option>
                                    <option value='2' {{ ( !empty($_POST['month']) && $_POST['month'] == "2")  ? 'selected' : '' }}>February</option>
                                    <option value='3' {{ ( !empty($_POST['month']) && $_POST['month'] == "3")  ? 'selected' : '' }}>March</option>
                                    <option value='4' {{ ( !empty($_POST['month']) && $_POST['month'] == "4")  ? 'selected' : '' }}>April</option>
                                    <option value='5' {{ ( !empty($_POST['month']) && $_POST['month'] == "5")  ? 'selected' : '' }}>May</option>
                                    <option value='6' {{ ( !empty($_POST['month']) && $_POST['month'] == "6")  ? 'selected' : '' }}>June</option>
                                    <option value='7' {{ ( !empty($_POST['month']) && $_POST['month'] == "7")  ? 'selected' : '' }}>July</option>
                                    <option value='8' {{ ( !empty($_POST['month']) && $_POST['month'] == "8")  ? 'selected' : '' }}>August</option>
                                    <option value='9' {{ ( !empty($_POST['month']) && $_POST['month'] == "9")  ? 'selected' : '' }}>September</option>
                                    <option value='10' {{ ( !empty($_POST['month']) && $_POST['month'] == "10")  ? 'selected' : '' }}>October</option>
                                    <option value='11' {{ ( !empty($_POST['month']) && $_POST['month'] == "11")  ? 'selected' : '' }}>November</option>
                                    <option value='12' {{ ( !empty($_POST['month']) && $_POST['month'] == "12")  ? 'selected' : '' }}>December</option>
                                    </select> 
                		    </div>
                		</div>       
                        <div class="col-md-4">
                			<div class="form-group">
                				<label>Search By name</label>
                				<input type="text" class="form-control" id="name" name="name" value="" placeholder="Search By name">
                		    </div>
                		</div> 
                        <div class="col-md-1 ">
                             <label for="" class="text-white">Search</label>
                    	    <button type="submit" class="btn btn-success">Search</button>
                    	</div>
	
                    </div>
                </form>
                        <div class="row m-2">
                           
                            <div class="col-12">
                                <table id="example11" class="table table-bordered table-responsive table-striped dataTable dtr-inline">
                                    <thead>
                                    @php
                                        $monthDate =$totel_month_day;
                                    @endphp                                        
                                        <tr role="row">
                                            <th>Sr.No</th>
                                            <th style="padding-right: 128px;">Name</th>
                                            @for($day=1;$day <= $monthDate;$day++)
                                            <th class="text-center">{{$day}}</th>
                                            @endfor
                                            <th>Total Atten.</th>
                                        </tr>
                                    </thead>

                                    <tbody class="">
           	                            @if(!empty($allStaff))
                                            @php
                                                $i=1;
                                            @endphp
                                        @foreach($allStaff as $key => $item)
                                        <tr>
        									<td>{{ $i++ }}</td>		
        									<td>{{ $item->name ?? ''}}</td>									
                                            @if(isset($data[$item['id']]))
                                                @php
                                                    $teach_att = $data[$item['id']];
                                                @endphp
                                                @for($day=01;$day <= $monthDate;$day++)
                                                    @php
                                                        $loop_date = sprintf("%02d",$day);
                                                        $date =$curr_yrs.'-'.$curr_mnt.'-'.$loop_date;
                                                    @endphp
                        
                                                    @if(isset($data[$item['id']][$date]))
                          
                                                    <td class="text-center">
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 1)
                                                            <span class="btn btn-xs btn-success w-75">P</span>
                                                        @endif
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 2)
                                                            <span class="btn btn-xs btn-danger w-75">A</span>
                                                        @endif
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 3)
                                                            <span class="btn btn-xs btn-info w-75">W</span>
                                                        @endif
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 4)
                                                            <span class="btn btn-xs btn-warning w-75">Hf</span>
                                                        @endif
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 5)
                                                            <span class="btn btn-xs btn-dark w-75">H</span>
                                                        @endif
                                                        @if($AttStatus[$data[$item['id']][$date]['attendance_status_id']]['id'] == 11)
                                                            <span class="btn btn-xs btn-secondary w-75">DS</span>
                                                        @endif
                                                    </td>
                                                    @else
                                                        <td class="text-center">- </td>
                                                    @endif
                       
                                                    @php
                                                        $dateCu = !empty($search['date']) ? date('m', strtotime($search['date'])) : date("m");
                                                    @endphp
                                                @endfor
                                                <th>{{$totel_month_day}}/{{staffAtten($item['id'],$dateCu)['P']}}</th>
                                            @endif
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 text-right">
                                <span class="btn btn-xs btn-success">&nbsp;P&nbsp;</span> Present &nbsp; <span class="btn btn-xs btn-danger">&nbsp;A&nbsp;</span> Absent&nbsp; <span class="btn btn-xs btn-warning">Hf</span> Half-day &nbsp; <span class="btn btn-xs btn-dark">&nbsp;H&nbsp;</span> Holiday  &nbsp; <span class="btn btn-xs btn-info">&nbsp;W&nbsp;</span> Work From Home &nbsp; <span class="btn btn-xs btn-secondary">&nbsp;DS&nbsp;</span> Double Shift
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection