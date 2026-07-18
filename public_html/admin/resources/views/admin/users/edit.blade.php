@extends('admin.layouts.app')
@section('title')
Update User
@endsection
@php
$sidebar = DB::table('sidebars')->get();
$sidebar_sub_menu = DB::table('sidebar_sub_menus')->get();

@endphp

@section('content')
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Edit Users</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/users') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i> back</a>
                                <a href="{{url ('admin/users') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                                <!--<a href="https://www.school.rukmanisoftware.com/account_dashboard" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                            </div>

                        </div>
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addproduct-accordion" class="custom-accordion">

                                    <div id="addproduct-billinginfo-collapse" class="collapse show"
                                        data-parent="#addproduct-accordion">
                                        <div class="p-4 border-top">
                                            <div class="row">
                                              
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Role <span class="required"
                                                                style="color:red;">*</span></label>
                                                        <select class="form-control" name="role_id" id="role_id">
                                                            <option value="">select</option>
                                                            @if(!empty(getRole()))
                                                            @foreach(getRole() as $role)
                                                            <option value="{{ $role->id ?? ''  }}" {{ ($role['id'] == $user['role_id']) ? 'selected' : '' }}>{{$role->name ?? '' }}</option>
                                                            @endforeach
                                                            @endif


                                                            @error('role_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="name">Name <span class="required"
                                                                style="color:red;">*</span></label>
                                                        {!! Form::text('name', null, array('class' =>
                                                        'form-control','placeholder' => 'Name')) !!}
                                                        @if ($errors->has('name'))
                                                        <span class="error text-danger">{{ $errors->first('name')
                                                            }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="manufacturerbrand">Email <span class="required"
                                                                style="color:red;">* User Name</span></label>
                                                        {!! Form::text('email', null, array('class' =>
                                                        'form-control','placeholder' => 'Email')) !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile <span class="required"
                                                                style="color:red;">*</span></label>
                                                        {!! Form::text('mobile', null, array('class' =>
                                                        'form-control','placeholder' => 'Mobile','maxlength'=>10,
                                                        'onkeypress'=>'return isNumber(event)')) !!}
                                                        @if ($errors->has('mobile'))
                                                        <span class="error text-danger">{{ $errors->first('mobile')
                                                            }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!--  <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="username">User Name <span class="required" style="color:red;">*</span></label>
                                                                        {!! Form::text('username', null, array('class' => 'form-control','placeholder' => 'User Name')) !!}
                            											@if ($errors->has('username'))
                                    									<span class="error text-danger">{{ $errors->first('username') }}</span>
                                            							@endif
                                                                    </div>
                                                                </div>
                                                                -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="dob">DOB <span class="required"
                                                                style="color:red;">*</span></label>
                                                        {!! Form::date('dob', null, array('class' =>
                                                        'form-control','placeholder' => 'DOB')) !!}
                                                        @if ($errors->has('dob'))
                                                        <span class="error text-danger">{{ $errors->first('dob')
                                                            }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="name">Password <span class="required"
                                                                style="color:red;">*</span></label>
                                                        {!! Form::password('password', array('class' =>
                                                        'form-control','placeholder' => 'Password')) !!}
                                                        @if ($errors->has('password'))
                                                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="required">Upload Image</label>
                                                        <input type="file" class="form-control" name="photo">
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="address">Address <span class="required"
                                                                style="color:red;">*</span></label>
                                                        <textarea id="address" name="address" placeholder="Address"
                                                            class="form-control">{{old('address',$user['address']) ?? ''}}</textarea>
                                                        <!-- {!! Form::text('address', null, array('class' => 'form-control','placeholder' => 'Address')) !!}-->
                                                        @if ($errors->has('address'))
                                                        <span class="error text-danger">{{ $errors->first('address')
                                                            }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="status">Status</label><br>
                                                        <input class="mt-2" value="1" name="status" type="checkbox"
                                                            id="switch1" switch="none" style="width:45px" checked />
                                                        <label for="switch1" data-on-label="Active"
                                                            data-off-label="Inactive"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Sidebar Permission <span class="required"
                                                                style="color:red;">*</span></label>
                                                        @if(!empty($sidebar))
                                                        @foreach($sidebar as $sidebar)
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="sidebar_id[]"
                                                                class="custom-control-input custom-control-input-primary custom-control-input-outline checkbox {{ ( $sidebar->id == 4) ? 'chkPassport' : '' }} "
                                                                type="checkbox" id="{{ $sidebar->id ?? '' }}"
                                                                value="{{ $sidebar->id ?? '' }}">
                                                            <label for="{{ $sidebar->id ?? '' }}"
                                                                class="custom-control-label pointer">{{ $sidebar->name
                                                                ?? '' }}</label>
                                                        </div>
                                                        @endforeach
                                                        @endif

                                                        @error('sidebar_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group" id="webSetting" style="display:none">
                                                        <label>Web Settings </label>
                                                        @if(!empty($sidebar_sub_menu))
                                                        @foreach($sidebar_sub_menu as $sidebar_sub_menu)
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="sub_menu_id[]"
                                                                class="custom-control-input custom-control-input-primary custom-control-input-outline checkbox"
                                                                type="checkbox"
                                                                id="id_{{ $sidebar_sub_menu->id ?? '' }}"
                                                                value="{{ $sidebar_sub_menu->id ?? '' }}">
                                                            <label for="id_{{ $sidebar_sub_menu->id ?? '' }}"
                                                                class="custom-control-label pointer">{{
                                                                $sidebar_sub_menu->name ?? '' }}</label>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>&nbsp;</label>
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" id="select_all" name="" value="4"
                                                                class="checkbox chkPassport">
                                                            <label for="select_all">Select All</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col text-center">
                                <button type="submit" class="btn btn-success btn-lg pl-3 pr-3 mt-3 mb-3 "><i
                                        class="uil uil-file-alt mr-1"></i> Save</button>
                            </div>
                        </div>


                    </div>


                </div>


            </div>


            <!-- end row -->
            {!! Form::close() !!}
        </div>
    </section>
</div>

@endsection