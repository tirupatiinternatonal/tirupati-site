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
                                <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View News & Update') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/newsUpdate/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                               
                            </div>
                        </div>

                        <div class="row m-2">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline text-center">
                                    <thead>
                                        <tr role="row">
                                            <th width="2%">Sr</th>
                                            <th width="10%">Title</th>
                                            <th width="10%">Reference No.</th>
                                            <th width="20%">Date</th>
                                            <th width="20%">Description</th>
                                            <th width="4%">Image</th>
                                            <th width="4%">Action</th>
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
                                        <td class="text-left">{{$value['title'] ?? ''}}</td>
                                        <td class="text-left">{{$value['reference'] ?? ''}}</td>
                                        <td class="text-left">{{ \Carbon\Carbon::parse($value['date'])->format('d-m-Y') ?? '' }}</td>
                                        <td class="text-left">{!! $value['description'] ?? '' !!}</td>
                                         <td>
                                                @if($value->photo )                                    
                                                <img src="{{ env('IMAGE_SHOW_PATH').'newsUpdate/'.$value['photo'] }}" class="img-fluid" style="width: 100px; height:100px" alt="{{$value->photo}}">
                                                @else
                                                    <img src="{{('https://test-tirupati.tirupati-international.in/admin/public/assets/user.png')}}" class="img-fluid" style="width: 100px;" alt="avatar.png">
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('admin.newsUpdate.edit',$value->id)  }}" class=" text-success  btn-xs ml-3" title="Edit Testimonila"><i
                                                        class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'GET','route' => ['admin.newsUpdate.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
												<a   data-id="{{$value->id}}"   class="user_delete text-danger btn-xs ml-3" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                <h4 class="modal-title text-white">{{ __('Delete News & Update On Database') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ url('admin/newsUpdate/destroy')}}" method="post">
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


<script>
    $('.user_delete').click(function(){

      $("#user_id").val($(this).data('id'))
      $("#Modal_id").modal("show");
      
   })
</script>




<style>
    .btn-xs {
  padding: .125rem .25rem;
  font-size: 17px;
  line-height: 1.5;
  border-radius: .15rem;
}
</style>
@endsection