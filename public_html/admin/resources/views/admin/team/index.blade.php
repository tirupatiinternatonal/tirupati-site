@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')
<style>
    .fixed_item{
        position:sticky !important;
        right:-8px;
        background-color:white;
        z-index:111;
        box-shadow: -6px 2px 6px #cecece;
    }
</style>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                                Team') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/team/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                            </div>
                        </div>

                        <div class="row m-2">
                            <div class="col-12 table-responsive ">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr</th>
                                            <th>Employee Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                            <th>Photo</th>
                                            <!--<th>Facebook profile</th>-->
                                            <!--<th>Linkedin profile</th>-->
                                            <!--<th>Twitter profile</th>-->
                                            <!--<th>Instagram profile</th>-->
                                            <th>Status</th>
                                             <th>Leadership Status</th>
                                            <th class="fixed_item">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="product_list_show">
                                          @if(!empty($data))
                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{$i++}}</td>
                                             
                                            <td>{{$value['employee_name'] ?? ''}}</td>
                                            <td>{{$value['mobile'] ?? ''}}</td>
                                            <td>{{$value['email'] ?? ''}}</td>
                                            <td>{{$value['position'] ?? ''}}</td>
                                            
                                            <td>
                                                
                                                   @if($value->photo )                                    
                                    <img src="{{ env('IMAGE_SHOW_PATH').'Team/'.$value['photo'] }}" class="img-fluid" style="width: 70px; height: 60px;" alt="{{$value->photo}}">
                               @else
                                    <img src="{{asset('image/ff.png')}}" class="img-fluid" style="width: 15%;height: 30px;" alt="avatar.png">
                                @endif
                                            </td>
                                            <!--<td>{{$value['facebook_profile'] ?? ''}}</td>-->
                                            <!--<td>{{$value['linkedin_profile'] ?? ''}}</td>-->
                                            <!--<td>{{$value['twitter_profile'] ?? ''}}</td>-->
                                            <!--<td>{{$value['instagram_profile'] ?? ''}}</td>-->
                                            
                                            <td>
                                                 @if($value->status==1)
                                              
                                                <button data-toggle="modal" data-target="#statusModal" data-id="{{ $value['id'] ?? '' }}" style="display: grid;" class="w-85 btn btn-success btn-sm userStatus" data-status="0">Active</button>
                                             
               								@else
               								  
                                                <button data-toggle="modal" data-target="#statusModal" data-id="{{ $value['id'] ?? '' }}" style="display: grid;" class="w-85 btn btn-danger btn-sm userStatus" data-status="1">Inactive</button>
                                               
            								@endif
                                                
                                            </td>
                                            <td>
                                                @if($value['leadership_id'] == 1)
                                                    <p style="text-align:center">Yes</p>
                                                @else
                                                   <p style="text-align:center">No</p>
                                                @endif
                                                </td>
                                            
                                            
                                            
                                            
                                            
                                                  <td class="fixed_item"> 
                        <div class="flex_centered">
                           <a href="{{  route('admin.team.edit',$value->id)  }}" class=" text-success btn-xs ml-3" title="Edit Account"><i
                                                        class="fa fa-edit"></i></a>
                                                        
                                            	{!! Form::open(['method' => 'POST','route' => ['admin.team.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
												<a   data-id="{{$value->id}}"  data-location="countries"  class="user_delete text-danger btn-xs ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
												{!! Form::close() !!}
                        </div>
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
        </div>
    </section>
</div>

 <script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


 $('#close,#close1').click(function(){
       $('#id01').hide()
   })
   
  $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
    </script>
    
    
    <script>
    $(document).ready(function(){
        
        $('.statusDrop').change(function(){
           var status = $(this).val(); 
            $('#status_id').val(status);
            $('#id').val($(this).data('id'));
            $('#statusModal').modal('show');
        });
        $('.userStatus').click(function(){
            var status = $(this).data('status');
            $('#status_id').val(status);
            $('#id').val($(this).data('id'));
        });
    });
</script>

<!--<script>-->
<!--    $('.event_status').click(function() {-->
<!--    var event_id = $(this).data('id'); -->
<!--    var status_name = $(this).data('name');-->
  
<!--    $('#status_name').val(status_name); -->
<!--  $('#event_id').val(event_id); -->
<!--  } );-->
<!--    $('.user_delete').click(function(){-->

<!--      $("#user_id").val($(this).data('id'))-->
<!--      $("#Modal_id1").modal("show");-->
      
<!--   })-->
<!--</script>-->


<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content bg_color">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ __('Delete Event On Database') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ url('admin/team/destroy')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" />
                    
                    <h5 class="text-white">
                        {{ __(' Are you sure you want to delete this data......') }}?
                    </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                        data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                        {{ __('yes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="statusModal">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">
      <div class="modal-header">
        <h4 class="modal-title text-white">Change Status Conformation</h4>
        <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="{{ url('admin/teamStatus') }}" method="post">
            @csrf
      <div class="modal-body">
          <input type="hidden" id="status_id" name="status_id">
          <input type="hidden" id="id" name="id">
          <h5 class="text-white">Are you sure you want to Change Status ?</h5>
           
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" >Close</button>
            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
         </div>
       </form>
    </div>
  </div>
</div>






<!-- The Modal -->
<!--<div class="modal" id="Modal_id">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content bg_color">-->
            <!-- Modal Header -->
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title text-white">{{ __('Change status') }}</h4>-->
<!--                <button type="button" class="btn-close" data-dismiss="modal">-->
<!--                    <i class="fa fa-times" aria-hidden="true"></i>-->
<!--                </button>-->
<!--            </div>-->

            <!-- Modal body -->
<!--            <form action="{{ route('admin.event_gallery.status') }}" method="post">-->
<!--                @csrf-->
<!--                <div class="modal-body">-->
<!--                    <input type="hidden" id="event_id" name="event_id" />-->
<!--                    <input type="hidden" id="status_name" name="status_name" />-->
<!--                    <h5 class="text-white">-->
<!--                        {{ __('Are you sure you want to change status') }}?-->
<!--                    </h5>-->
<!--                </div>-->

<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"-->
<!--                        data-dismiss="modal">-->
<!--                        {{ __('Close') }}-->
<!--                    </button>-->
<!--                    <button type="submit" class="btn btn-danger waves-effect waves-light">-->
<!--                        {{ __('yes') }}-->
<!--                    </button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection


