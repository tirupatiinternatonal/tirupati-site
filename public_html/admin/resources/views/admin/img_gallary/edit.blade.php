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
                            <h3 class="card-title"><i class="fa fa-image"></i> &nbsp;Edit Gallery</h3>
                            <div class="card-tools">
                        <a href="{{url ('admin/event_gallery') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>
                     </div>
                  </div>
                  {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.event_gallery.update', $data->id]]) !!}
                  @csrf
                 <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('admin.event_gallery.store')}}" enctype="multipart/form-data">
                    @csrf
                      <input id="status" type="hidden" name="status" placeholder="status"  value="{{old('event_name') ?? $data['status'] }}" class="form-control @error('event_name') is-invalid @enderror ">
                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Event Name</label>
                      <input id="event_name" type="text" name="event_name" placeholder="Event Name"  value="{{old('event_name') ?? $data['event_name'] }}" class="form-control @error('event_name') is-invalid @enderror ">
                      @error('event_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <select name="type" id= "type"  class="form-control  @error('type') is-invalid @enderror ">
                                            <option value="1" {{ ( '1' == $data['type'] ? 'selected' : '' ) }}>Interior</option>
                                             <option value="2" {{ ( '2' == $data['type'] ? 'selected' : '' ) }}>Exterior</option>
                                              <option value="3" {{ ( '3' == $data['type'] ? 'selected' : '' ) }}>Celebration</option>
                                               <option value="4" {{ ( '4' == $data['type'] ? 'selected' : '' ) }}>Culture</option>
                                                <option value="5" {{ ( '5' == $data['type'] ? 'selected' : '' ) }}>Certificate & Rewards</option>
                                                <option value="6" {{ ( '6' == $data['type'] ? 'selected' : '' ) }}>Our Team</option>
                                                <option value="7" {{ ( '7' == $data['type'] ? 'selected' : '' ) }}>Events</option>
                                                <option value="8" {{ ( '8' == $data['type'] ? 'selected' : '' ) }}>Work Site</option>
                                                <option value="9" {{ ( '9' == $data['type'] ? 'selected' : '' ) }}>Office Decorum</option>
                                        </select>
                      </div>
                      
                     <div class="form-group col-md-4">
                                  <label for="inputPhoto">Upload photo<span class="text-danger">*</span></label>
                                 
                                  <input id="thumbnail" class="form-control mt-1" type="file" name="photo">
                                            
                                  <div class="form-group col-md-4">
                                    <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                    <input type="hidden" class="form-control" name="scrimage" value="{{old('photo') ?? $data['photo'] }}" id="scrimage">
                                    <img src="{{ env('IMAGE_SHOW_PATH').'event/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}">
                                  </div>

                                  </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                             
                            </div>
                      <!--<div class="row m-2">
                                <div class="col-md-4 mt-2">
                                    <label for="switch1" data-on-label="Active" data-off-label="Inactive">Status</label>
                                    <div class="check-box mt-2">
                                     <input value="1"  name="status" type="checkbox" id="switch1" switch="none" checked/>
                                    </div>
                                   
                                </div>
                            </div>-->           
                                
                            
                 
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Update </button>
                     </div>
                 
                  {!! Form::close() !!}
                        
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


