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
                                Page
') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{url('admin/page/create')}}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-plus"></i>{{ __('Add') }}</a>
                               
                            </div>
                        </div>

                        <div class="row m-2">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline text-center">
                                    <thead>
                                        <tr role="row">
                                            <th>Sr</th>
                                            <th>Page Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                          @if(!empty($data))
                                            @php
                                                $i=1;
                                               
                                            @endphp
                                  @foreach($data as $key => $value)
                                    @php
                                        $img = $pageImg->where('page_id', $value->id);
                                    @endphp
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$value['pg_name'] ?? ''}}</td>
                                        <td>
                                        @if(!empty($img))
                                        
                                  @foreach($img as $key => $pgimg)
                                        <img src="{{ env('IMAGE_SHOW_PATH').'pageimg/'.$pgimg->bgimg }}" class="img-fluid" style="width: 35px;" alt="{{ $pgimg->bgimg }}" value="{{ $pgimg->bgimg }}">
                                      @endforeach
                            
                            @endif  
                            </td>
                                        <td class="d-flex justify-content-center">
                                                <a href="{{route('admin.page.edit',$value->id)  }}" class=" text-success  btn-xs ml-3" title="Edit Testimonila"><i
                                                        class="fa fa-edit"></i></a>
                                            {!! Form::open(['method' => 'GET','route' => ['admin.page.destroy', $value->id],'style'=>'display:inline','class'=>'sa-params'.$value->id.'']) !!}												
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
                <h4 class="modal-title text-white">{{ __('Delete Product
 On Database') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ url('admin/page/destroy')}}" method="post">
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