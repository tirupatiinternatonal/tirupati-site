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
                            <h3 class="card-title"><i class="fa fa-balance-scale"></i> &nbsp;Edit AMC.</h3>
                            <div class="card-tools">
                                <a href="{{url('admin/website_amc')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                           
                            </div>

                        </div>

  {!! Form::model($FetchData, ['method' => 'PATCH','files' => true,'route' => ['admin.website_amc.update', $FetchData->id]]) !!}
    <div class="row">
        <div class="col-lg-12">
            <div id="addproduct-accordion" class="custom-accordion">
                <div class="">
                    <div id="addproduct-billinginfo-collapse" class="collapse show" data-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
							                          
                               <div class="row">
                                              
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Owner name <span class="text-danger required">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name',$FetchData['name'] ) ?? ''}}">
                       
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Owner mobile no. <span class="text-danger required">*</span></label>
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Owner mobile no" value="{{old('mobile',$FetchData['mobile'] ) ?? ''}}" maxlength ="10">
                                         @error('mobile')
                                           <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                     <div class="form-group">
                                         <label for="email">Email</label>
                                     {!! Form::text('email',null,array('placeholder' => 'Email','class'=>'form-control')) !!} 
                                        </div>
                                        </div>
                                        
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Website link <!--<span class="required">*</span>--></label>
                                            {!! Form::text('website_link', null, array('class' => 'form-control')) !!}
											<!--<span class="error website_link-error"></span>-->
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Website Name </label>
                                            {!! Form::text('website_name', null, array('class' => 'form-control')) !!}
											
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Amount</label>
                                           <!-- {!! Form::number('amount', null, array('class' => 'form-control')) !!}-->
										<input type="text"  class="form-control" id="amount" name="amount" onkeypress="javascript:return isNumber(event)"  placeholder="Amount" value="{{old('amount',$FetchData['amount'] ) ?? ''}}">
                                        </div>
                                    </div> 
                                    
                                       <div class="col-lg-3">
                                     <div class="form-group">
                                       <label for="name">User name</label>
                                         {!! Form::text('user_name',null,array('placeholder' => 'User name','class'=>'form-control')) !!} 
                                   </div>
                                </div> 
                                    
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                      <label for="Password">Password</label>
                                       {!! Form::text('pass_word',null,array('placeholder' => 'password','class'=>'form-control')) !!} 
                                       <!--<input type="text" class"form-control id="password" name="password" placeholder="Password"value={{old('password',$FetchData['password'] ) ?? ''}}>-->
                                </div>
                                </div>
                                     <div class="col-lg-3">
                                        <div class="form-group">
                                         <label class="control-label">Website type<span class="required"></span></label> 
                                           <select name="website_type" id="website_type" class="form-control ">
                                             <option value="Online" {{ ( 'Online' == $FetchData['website_type']) ? 'selected' : '' }}>Online</option>
                                             <option value="Offline" {{ ( 'Offline' == $FetchData['website_type']) ? 'selected' : '' }}>Offline</option>
                                                                 
                                     </select>
                                 </div>
                                </div>
            
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">Registration Date</label>
                                            <!--{!! Form::date('registration_date', null, array('class' => 'form-control')) !!}-->
                                            <input type="date" class="form-control" id="registration_date" name="registration_date" placeholder="registration_date"  value="{{old('registration_date',$FetchData['registration_date'] ) ?? ''}}">
											
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">E.M.C Date</label>
                                            {!! Form::date('emc_date', null, array('class' => 'form-control')) !!}
                                            
											
                                        </div>
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name">A.M.C Amount</label>
                                            <!--{!! Form::number('amc_amount', null, array('class' => 'form-control')) !!}-->
                                            <input type="text"  class="form-control" id="amc_amount" name="amc_amount" onkeypress="javascript:return isNumber(event)"  placeholder="A.M.C amount" value="{{old('amc_amount',$FetchData['amc_amount'] ) ?? ''}}">
											
                                        </div>
                                    </div> 
                                    
                                    
                                    <!--     <div class="col-md-3">
                                        <div class="form-group ml-3">
                    
                                        <label for="imge">Image</label>
                                       {!! Form::file('photo',array('class' => 'form-control','id'=>'photo')) !!}   
                                    </div>
                                    </div>-->
                                    <div class="col-md-3">
                                    <!--    <div class="form-group">
                                             @if($FetchData->photo)
                                                                                   
                                    <img src="{{ env('IMAGE_SHOW_PATH').'AMC/'.$FetchData['photo'] }}" class="img-fluid" style="width: 85%; height: 95px;" alt="{{$FetchData->image}}" {{old('image',$FetchData['photo'] ) ?? ''}}>
                                @else
                                    <img src="{{asset('image/blank.png')}}" class="img-fluid" style="width: 79%; height: 74px;" alt="avatar.png">
                                @endif
                                    </div> -->
                                    <div class="form-group">
                                    <label for="inputPhoto">Upload photo</label>
                                 
                                  <input id="thumbnail" class="form-control" type="file" name="photo" value="{{ old('photo') }}">
                                  </div>
                                    </div>
                                    <div class="col-md-3">
                                     @if($FetchData->photo)
                                <img src="{{ env('IMAGE_SHOW_PATH').'slider/'.$FetchData['photo'] }}" class="img-fluid" style="max-width:70%;height: 60px;" alt="{{$FetchData->photo}}">
                            @else
                                <img src="{{asset('image/blank.png')}}" class="img-fluid" style="max-width:100%;height: 60px;" alt="avatar.png">
                            @endif
                                     </div>
                                    <div class="col-md-3">
                                      <label for="Address">Plan Details</label>
                                        <textarea class=" form-control  @error('plan_details') is-invalid @enderror"  id="plan_details" name="plan_details">{{old('plan_details',$FetchData['plan_details'] ) ?? ''}}</textarea>
                                     </div>

                                 </div>
                                 
                                 
                                              
								<div class="row">                                  
									<div class="col-lg-6">  
    								  <label for="switch1" data-on-label="Active" data-off-label="Inactive">Status</label>
                                    <div class="check-box mt-2">
                                     <input value="1"  name="status" type="checkbox" id="switch1" switch="none" {{ ( $FetchData['status'] == 1) ? 'checked' : '' }} />
                                    </div>
                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
									</div>
					</div>	
	
			 <!--<button type="submit" class="btn btn-success"><i class="uil uil-file-alt mr-1"></i> Save</button>   -->         
    
                        </div>
                    </div>
                </div>
			</div>
			</div>
    </div>
    
	
	
    <div class="row">
       
   <div class="col-md-4">
    <ul class="nav nav-tabs">
    <li class="nav-item w-100">
                    
            <a class="nav-link active btn_Back w-100 m-0 text-center" id="open" data-toggle="tab"><b><i class="fa fa-history"></i> AMC. History <i class="fa fa-angle-down"></i></b></a>
            </li>
           </ul>
       <!--<button type="submit" class="btn btn-white w-100 h-100 mb-2"><b><i class="fa fa-history"></i> AMC. History <i class="fa fa-angle-down"></i></b></button> -->
    </div>
   <div class="col-md-4">
       <button type="submit" class="btn btn-success w-100 h-100 mb-2"><i class="fa fa-edit mr-1"></i>Edit</button> 
    </div>
   <div class="col-md-4">
       <a href="{{url('admin/website_amc')}}" class="btn btn-danger w-100 h-100 text-white"><i
                                                    class="fa fa-close mt-2"></i> Cancel</a>
    </div>
    </div>
    <!-- end row -->
	{!! Form::close() !!}
    <div class="row eye_hide m-0">
        @foreach ($WebsiteHistory as $history)
     <div class="col-md-12">  
    
        <h4>{{ date('Y-m-d', strtotime($history['updated_at'])) }} |Leads Group by {{Auth::user()->name}}</h4>    
        <p class=""><span class="mtl">Updates&nbsp;&nbsp;</span>
      
  <!-- </div>
     
                            
               <div class="col-md-8">   -->    
                        <!-- <p>{{ $history->emc_date }}</p>&nbsp;&nbsp;-->
                        
                         <span class="kit">@if(!empty($history['name'])) Name &nbsp;&nbsp;{{$history['name'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['mobile'])) Mobile No. &nbsp;&nbsp;{{$history['mobile'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['amount'])) Amount No. &nbsp;&nbsp;{{$history['amount'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['email'])) Email &nbsp;&nbsp;{{$history['email'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['password'])) Password &nbsp;&nbsp;{{$history['password'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['website_name'])) Website Name &nbsp;&nbsp;{{$history['website_name'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['website_link'])) Website Link &nbsp;&nbsp;{{$history['website_link'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         
                         <span class="kit">@if(!empty($history['user_name'])) User name &nbsp;&nbsp;{{$history['user_name'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['website_type'])) Website type &nbsp;&nbsp;{{$history['website_type'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['registration_date'])) Registration date &nbsp;&nbsp;{{$history['registration_date'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['emc_date'])) EMC date &nbsp;&nbsp;{{$history['emc_date'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['amc_amount'])) AMC Amount &nbsp;&nbsp;{{$history['amc_amount'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                         <span class="kit">@if(!empty($history['plan_details'])) Plan details &nbsp;&nbsp;{{$history['plan_details'] }} @endif</span>&nbsp;&nbsp;&nbsp;
                        </p>
                      
                   </div> 
                               
                         @endforeach
                  <hr>         
      </div>
      
  
    


                    </div>
                </div>
            </div>
             </section>
        </div>
   

<style>
    .kit{
       width: fit-content;
       background-image: linear-gradient(to bottom right, #3F51B5, #00C4B1);
       color: white;
    }
    .eye_hide{
        border: 1px solid #f0e6e6;
    }
    .mtl{
          font-size: 26px;
    }
    
</style>
<script>
    $(document).ready(function () {
        $("#open").click(function () {
            $(".eye_hide").toggle();
        });
       });
</script>


		
@endsection
@section('script')
 
     <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/dropify/dropify.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/dropify.js')}}"></script>
		<script type="text/javascript">
   // set default dates
var start = new Date();
// set end date to max one year period:
var end = new Date(new Date().setYear(start.getFullYear()+1));

$('#fromDate').datepicker({
    startDate : start,
    endDate   : end
// update "toDate" defaults whenever "fromDate" changes
}).on('changeDate', function(){
    // set the "toDate" start to not be later than "fromDate" ends:
    $('#toDate').datepicker('setStartDate', new Date($(this).val()));
}); 

$('#toDate').datepicker({
    startDate : start,
    endDate   : end
// update "fromDate" defaults whenever "toDate" changes
}).on('changeDate', function(){
    // set the "fromDate" end to not be later than "toDate" starts:
    $('#fromDate').datepicker('setEndDate', new Date($(this).val()));
});
</script>
<link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>

	<script>
	CKEDITOR.editorConfig = function (config) {
    config.extraPlugins = 'confighelper';
  };
  CKEDITOR.replace('editor1');

	</script>
@endsection

	


