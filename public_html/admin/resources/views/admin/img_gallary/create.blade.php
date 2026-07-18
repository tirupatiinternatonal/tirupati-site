@extends('admin.layouts.app')
@section('content')


<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-image"></i> &nbsp; Add Gallery</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/event_gallery') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>
                                <!--<a href="{{url ('admin/event_gallery') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                                <!--<a href="https://www.school.rukmanisoftware.com/account_dashboard" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                            </div>
   </div>
   <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('admin.event_gallery.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="inputTitle" class="col-form-label">Event Name</label>
                      <input id="event_name" type="text" name="event_name" placeholder="Event Name"  value="" class="form-control  @error('event_name') is-invalid @enderror ">
                      @error('event_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select name="type" id= "type"  class="form-control  @error('type') is-invalid @enderror ">
                                            <option value="1">Interior</option>
                                             <option value="2">Exterior</option>
                                              <option value="3">Celebration</option>
                                               <option value="4">Culture</option>
                                                <option value="5">Certificate & Rewards</option>
                                                <option value="6">Our Team</option>
                                                <option value="7">Events</option>
                                                <option value="8">Work Site</option>
                                                <option value="9">Office Decorum</option>
                                        </select>
                      </div>
                      
                      <div class="form-group col-md-6">
                         <label for="imge">Image</label>
                         
                   {!! Form::file('photo',array('class' => 'form-control','id'=>'photo')) !!}
                                   
                            </div>
                            <div class="form-group col-md-6">
                                         <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                              <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">Save</button>
                                </div>
                            </div>

                </form>
            </div>
        </div>
   </div>
</div>
</div>
</div>
</div>

@endsection