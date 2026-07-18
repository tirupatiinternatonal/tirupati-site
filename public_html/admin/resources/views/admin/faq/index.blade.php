@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                                Faq') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/faq/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                                <a href="{{url('admin/faq/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-arrow-left"></i>{{ __('Back') }}</a>
                            </div>
                        </div>

                        <div class="row m-2">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr</th>
                                            <th>Image</th>
                                            <th>Module Name</th>
                                           
                                            <th>Title</th>
                                            <th>YouTube URL</th>
                                            <th>Module Description</th>
                                            <!--<th>Descreption</th>-->
                                            <!--<th>Descreption Image</th>-->
                                            
                                           <!-- <th>status</th>-->
                                            <th>Action</th>
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
                                             <td>
                                                @if($value->photo )                                    
                                                <img src="{{ env('IMAGE_SHOW_PATH').'faq/'.$value['photo'] }}" class="img-fluid" style="width: 45%; height: 55px;" alt="{{$value->photo}}">
                                                @else
                                                    <img src="{{('https://test-tirupati.tirupati-international.in/admin/public/assets/user.png')}}" class="img-fluid" style="width: 45%;height: 55px;" alt="avatar.png">
                                                @endif
                                            </td>
                                               <td>{{$value['page_name'] ?? ''}}</td>
                                            
                                            <td>{{$value['title'] ?? ''}}</td>
                                            <td>{{$value['url'] ?? ''}}</td>
                                            <td>{{$value['modul_descreption'] ?? ''}}</td>
                                            <!--<td>{{ $value->descreption ?? ''}} </td>-->
                                            <!-- <td>-->
                                            <!--    @if($value->descreptionimage)                             -->
                                            <!--    <img src="{{ env('IMAGE_SHOW_PATH').'descreptionimage/'.$value['descreptionimage'] }}" class="img-fluid" style="width: 45%; height: 55px;" alt="{{$value->descreptionimage}}">-->
                                            <!--    @else-->
                                            <!--        <img src="{{('https://test-tirupati.tirupati-international.in/admin/public/assets/user.png')}}" class="img-fluid" style="width: 45%;height: 55px;" alt="avatar.png">-->
                                            <!--    @endif-->
                                            <!--</td>-->
                                         
                                            
                                           <!--  <td>
                                                 @if($value->status==1)
                                              
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Active" class="btn btn-success btn-sm btn-soft-success waves-effect waves-light sa-params faq_status" style ="display:inline">Active</button>
                                             
               								@else
               								  
                                                	<button data-toggle="modal" data-target="#Modal_id" data-id="{{ $value->id }}" data-name="Inactive" class="btn btn-danger btn-sm btn-soft-danger waves-effect waves-light faq_status" style ="display:inline">Inactive</button>
                                               
            								@endif
                                                
                                            </td>-->
                                            <td class="d-flex">
                                                <a href="{{  route('admin.faq.edit',$value->id)  }}" class=" text-success btn-xs ml-3" title="Edit Notification"><i
                                                        class="fa fa-edit"></i></a>
                                            <!--    <a data-id="{{$value->id}}"  data-location="countries"  class="user_delete text-danger btn-xs ml-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-trash-o"></i></a>-->
                                            <!--{!! Form::open(['method' => 'DELETE','route' => ['admin.faq.destroy', $value->id]]) !!}                                              -->
                                            <!--{!! Form::close() !!}-->
                                            
                                            
                                            {!! Form::open(['method' => 'POST','route' => ['admin.faq.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
												<a   data-id="{{$value->id}}"  data-location="countries"  class="user_delete text-danger btn-xs ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
												{!! Form::close() !!}
                                              
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
            <form action="{{ url('admin/faq/destroy')}}" method="post">
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


<!--<div class="modal" id="Modal_id1">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content bg_color">-->
            <!-- Modal Header -->
<!--            <div class="modal-header">-->
<!--                <h4 class="modal-title text-white">{{ __('Delete Data On Database') }}</h4>-->
<!--                <button type="button" class="btn-close" data-dismiss="modal">-->
<!--                    <i class="fa fa-times" aria-hidden="true"></i>-->
<!--                </button>-->
<!--            </div>-->
            <!-- Modal body -->
<!--            <form action="{{ url('admin/faq/destroy') }}" method="get">-->
<!--                @csrf-->
<!--                <div class="modal-body">-->
<!--                    <input type="hidden" id="user_id" name="user_id" />-->
                    
<!--                    <h5 class="text-white">-->
<!--                        {{ __(' Are you sure you want to delete this data......') }}?-->
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

<script>
    $('.faq_status').click(function() {
    var faq_id = $(this).data('id'); 
    var status_name = $(this).data('name');
  
    $('#status_name').val(status_name); 
  $('#faq_id').val(faq_id); 
  } );
  
//   var tbody = $('table tbody');
// tbody.html($('tr',tbody).get().reverse());


    $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
</script>



<!-- The Modal -->
<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content bg_color">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white">{{ __('Change status') }}</h4>
                <button type="button" class="btn-close" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('admin.faq.status') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="faq_id" name="faq_id" />
                    <input type="hidden" id="status_name" name="status_name" />
                    <h5 class="text-white">
                        {{ __('Are you sure you want to change status') }}?
                    </h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                        data-dismiss="modal">
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
<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection