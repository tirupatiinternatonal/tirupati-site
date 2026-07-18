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
                            <h3 class="card-title"><i class="fa fa-image"></i> &nbsp;Edit Document</h3>
                            <div class="card-tools">
                        <a href="{{url ('admin/document') }}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> View</a>
                     </div>
                  </div>
                  {!! Form::model($data, ['method' => 'PATCH','files' => true,'route' => ['admin.document.update', $data->id]]) !!}
                  @csrf
                 <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="border px-4 pt-2 pb-3" method="POST" action="{{route('admin.document.store')}}" enctype="multipart/form-data">
                    @csrf
                      <input id="status" type="hidden" name="status" placeholder="status"  value="{{old('label_name') ?? $data['status'] }}" class="form-control @error('label_name') is-invalid @enderror ">
                    <div class="form-group">
                        <label for="inputTitle" class="col-form-label">Label</label>
                        <input id="label_name" type="text" name="label_name" placeholder="label"  value="{{old('label_name') ?? $data['label_name'] }}" class="form-control @error('label_name') is-invalid @enderror ">
                        @error('label_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      
                        <div class="form-group col-md-4">
                            <label for="inputPhoto">Upload photo<span class="text-danger">*</span></label>
                         
                            <input id="thumbnail" class="form-control mt-1" type="file" name="photo">
                                    
                            <div class="form-group col-md-4">
                                <label for="inputPhoto"><span class="text-danger"></span></label><br>
                                <input type="hidden" class="form-control" name="scrimage" value="{{old('photo') ?? $data['photo'] }}" id="scrimage">
                                <!--<img src="{{ env('IMAGE_SHOW_PATH').'document/'.$data['photo'] }}" class="img-fluid" style="width: 100%;" alt="{{$data->photo}}">-->
                                @if(Str::contains($data->photo, ['.pdf','.PDF']))
                                    <a href="{{ env('IMAGE_SHOW_PATH').'document/'.$data->photo }}" target="_blank">
                                        View PDF
                                    </a>
                                @else
                                    <img src="{{ env('IMAGE_SHOW_PATH').'document/'.$data->photo }}" style="width:100%">
                                @endif

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


