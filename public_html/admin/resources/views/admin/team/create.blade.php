@extends('admin.layouts.app')
@section('content')


<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-image"></i> &nbsp; Add Team Member</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/team') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>
                                <a href="{{url ('admin/team') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <!--<a href="https://www.school.rukmanisoftware.com/account_dashboard" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                            </div>
   </div>
   <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form  method="POST" action="{{route('admin.team.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-2">
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Employee name</label>
                                                <input id="employee_name" type="text" name="employee_name" placeholder="Employee Name"  value="" class="form-control  @error('employee_name') is-invalid @enderror " required>
                                                
                                      </div>
                                </div>
                                
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Position</label>
                                                 <input id="position" type="text" name="position" placeholder="position"  value="" class="form-control  @error('position') is-invalid @enderror " required>
                                                
                                      </div>
                                </div>
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Mobile</label>
                                                 <input id="mobile" type="text" name="mobile" placeholder="Enter Mobile Number"  value="" class="form-control  @error('mobile') is-invalid @enderror " required>
                                                
                                      </div>
                                </div>
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Email</label>
                                                 <input id="email" type="text" name="email" placeholder="Enter Email "  value="" class="form-control  @error('email') is-invalid @enderror ">
                                                
                                      </div>
                                </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                          <label for="inputTitle" class="col-form-label">Facebook Profile</label>
                                             <input id="facebook_profile" type="text" name="facebook_profile" placeholder="Facebook Profile"  value="" class="form-control  @error('facebook_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                            <label for="inputTitle" class="col-form-label">Linkedin Profile</label>
                                           <input id="linkedin_profile" type="text" name="linkedin_profile" placeholder="Linkedin Profile"  value="" class="form-control  @error('linkedin_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Twitter Profile</label>
                                             <input id="twitter_profile" type="text" name="twitter_profile" placeholder="Twitter Profile"  value="" class="form-control  @error('twitter_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Instagram Profile</label>
                                             <input id="instagram_profile" type="text" name="instagram_profile" placeholder="Instagram Profile "  value="" class="form-control  @error('instagram_profile') is-invalid @enderror ">
                                      @error('employee_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                               </div>
                               <div class="col-md-3">
                                     <div class="form-group">
                                             <label for="imge" class="col-form-label">Image</label>
                                           {!! Form::file('photo',array('class' => 'form-control','id'=>'photo')) !!}
                                     </div>
                               </div>
                                	<div class="col-md-3">
									<div class="form-group">
										<label>LeaderShip</label>
											<select class="form-control  " id="leadership_id" name="leadership_id" style="margin-top:13px">
                                                 <option value="1">Yes</option>
                                                 <option value="0">No</option>
                                             </select>
									</div>
								</div>
                               <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                              <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">Save</button>
                                </div>
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