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
                            <h3 class="card-title"><i class="fa fa-image"></i> &nbsp;Edit Team</h3>
                            <div class="card-tools">
                        <a href="{{url ('admin/team') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>
                     </div>
                  </div>
                  {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.team.update', $data->id]]) !!}
                  @csrf
                 <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('admin.team.store')}}" enctype="multipart/form-data">
                    @csrf
                    
                      
                      <div class="row m-2">
                            <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Employee name</label>
                                                <input id="employee_name" type="text" name="employee_name" placeholder="Employee Name"   value="{{old('employee_name') ?? $data['employee_name'] }}" class="form-control  @error('employee_name') is-invalid @enderror ">
                                                
                                      </div>
                                </div>
                                
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Position</label>
                                                 <input id="position" type="text" name="position" placeholder="position"   value="{{old('position') ?? $data['position'] }}" class="form-control  @error('position') is-invalid @enderror ">
                                                
                                      </div>
                                </div>
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Mobile</label>
                                                 <input id="mobile" type="text" name="mobile" placeholder="Enter Mobile Number"   value="{{old('mobile') ?? $data['mobile'] }}" class="form-control  @error('mobile') is-invalid @enderror ">
                                                
                                      </div>
                                </div>
                                <div class="col-md-3">
                                       <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Email</label>
                                                 <input id="email" type="text" name="email" placeholder="Enter Email "   value="{{old('email') ?? $data['email'] }}" class="form-control  @error('email') is-invalid @enderror ">
                                                
                                      </div>
                                </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                          <label for="inputTitle" class="col-form-label">Facebook Profile</label>
                                             <input id="facebook_profile" type="text" name="facebook_profile" placeholder="Facebook Profile"  value="{{old('facebook_profile') ?? $data['facebook_profile'] }}" class="form-control  @error('facebook_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                            <label for="inputTitle" class="col-form-label">Linkedin Profile</label>
                                           <input id="linkedin_profile" type="text" name="linkedin_profile" placeholder="Linkedin Profile"   value="{{old('linkedin_profile') ?? $data['linkedin_profile'] }}" class="form-control  @error('linkedin_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Twitter Profile</label>
                                             <input id="twitter_profile" type="text" name="twitter_profile" placeholder="Twitter Profile"   value="{{old('twitter_profile') ?? $data['twitter_profile'] }}" class="form-control  @error('twitter_profile') is-invalid @enderror ">
                                     </div>
                               </div>
                              <div class="col-md-3">
                                     <div class="form-group">
                                             <label for="inputTitle" class="col-form-label">Instagram Profile</label>
                                             <input id="instagram_profile" type="text" name="instagram_profile" placeholder="Instagram Profile "   value="{{old('instagram_profile') ?? $data['instagram_profile'] }}" class="form-control  @error('instagram_profile') is-invalid @enderror ">
                                      @error('employee_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                               </div>
                               	<div class="col-md-3">
									<div class="form-group">
										<label>LeaderShip</label>
											<select class="form-control  " id="leadership_id" name="leadership_id"  style="margin-top:13px">
                                                 <option value="1" {{ (1 == $data['leadership_id'] ? 'selected' : '' ) }}>Yes</option>
                                                 <option value="0" {{ (0 == $data['leadership_id'] ? 'selected' : '' ) }}>No</option>
                                             </select>
									</div>
                             
                            </div>
                            	<div class="col-md-3">
                                    <label>Photo</label>
                                    <div class="form-control" style="margin-top:13px">
                                        <input type="file" name="photo" id="photo"  value="{{ $data['photo'] }}" accept="image/png, image/jpg, image/jpeg" />
                                    </div>
                                    @if(!empty($data['photo']))
                                        <div style="margin-top: 10px;">
                                            <img src="{{ env('IMAGE_SHOW_PATH').'Team/'.$data['photo'] }}" alt="Current Photo" width="60px" height="60px">
                                        </div>
                                    @endif
                                </div>

                           
                                
                            
                 
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Update </button>
                     </div>
                 
                  {!! Form::close() !!}
                      </div>
                      
                    
                        
                </form>
            </div>
            
            
            
        </div>


               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<script>
    
$(document).ready(function() {
 $('#trColor tr').click(function() {
   $(this).css('backgroundColor', '#6639b5c4');
  $( this ).siblings().css( "background-color", "white" );
});
    
    count=0;
      $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
    $(document).on("click", "#clonebtn", function() {
       count++;
        //we select the box clone it and insert it after the box
        $('#box2').addClass('rowTr')
        $('#box2').clone().appendTo('#table_body')
       $('.rowTr').last().addClass('rowTr1')
       //  $('#box2').find('#removerow').addClass("buttondel")
          
   
        // $('.buttondel').css('visibility', 'visible')
      
         $( ".removeprodtxtbx" ).eq( count ).css( "display", "block" );
         $( ".addmoreprodtxtbx" ).eq( count ).css( "display", "none" );
         $( ".pay_amt" ).eq( count ).val("");
          
    });
    
    $(document).on("click", "#removerow", function() {
        $(this).parents("#box2").remove();
        $('#removerow').focus();
        count--;
    });
    
      $(document).on("click", "#closeModal", function() {
$( "tr" ).remove( ".rowTr1" );
 $( ".pay_amt" ).val("");
 $( "#pay_amt" ).val("");
count=0;
    });
    
    
    
    
   
});
</script>

<script>
   
    function calculateAmount(value,row_id) {
       
        var quantity = $('#quantity_'+row_id).val();
        var rate = $('#rate_'+row_id).val();
    
        var amount = quantity * rate;
    
        $('#amount_'+row_id).val(amount);
        calculateSum();
    };    
 function calculateSum() {
        var sum = 0;
        $(".amount").each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
        });
    
        $("#total_amt").val(sum.toFixed(2));
    }
        
</script>
@endsection


