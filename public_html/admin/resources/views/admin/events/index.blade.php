@extends('admin.layouts.app')

@section('title')
    Events / Expo
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content pt-3">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card card-outline card-orange">

                        <div class="card-header bg-primary">

                            <h3 class="card-title">
                                <i class="fa fa-calendar"></i> &nbsp;
                                Events / Expo
                            </h3>

                            <div class="card-tools">

                                <a href="{{ url('admin/eventExpo/create') }}"
                                   class="btn btn-warning text-white btn-sm">

                                    <i class="fa fa-plus"></i>
                                    Add Event

                                </a>

                            </div>

                        </div>

                        <div class="card-body">

                            <table id="example1"
                                   class="table table-bordered table-striped">

                                <thead>

                                    <tr>

                                        <th>ID</th>

                                        <th>Banner</th>

                                        <th>Title</th>

                                        <th>Date</th>

                                        <th>Location</th>

                                        <th>Status</th>

                                        <th width="120">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if(count($data) > 0)

                                        @foreach($data as $row)

                                            <tr>

                                                <td>{{ $row->id }}</td>

                                                <td>

                                                    @if($row->banner_image)

                                                        <img src="{{ asset('admin/image/event/'.$row->banner_image) }}"
                                                             style="width:90px;height:60px;border-radius:6px;">

                                                    @else

                                                        No Image

                                                    @endif

                                                </td>

                                                <td>{{ $row->title }}</td>

                                                <td>{{ date('d M Y', strtotime($row->event_date)) }}</td>

                                                <td>{{ $row->location }}</td>

                                                <td>
                                                
                                                    @if($row->status == 1)
                                                
                                                        <button
                                                            type="button"
                                                            data-toggle="modal"
                                                            data-target="#statusModal"
                                                            data-id="{{ $row->id }}"
                                                            data-name="Active"
                                                            class="btn btn-success btn-sm event_status">
                                                
                                                            Active
                                                
                                                        </button>
                                                
                                                    @else
                                                
                                                        <button
                                                            type="button"
                                                            data-toggle="modal"
                                                            data-target="#statusModal"
                                                            data-id="{{ $row->id }}"
                                                            data-name="Inactive"
                                                            class="btn btn-danger btn-sm event_status">
                                                
                                                            Inactive
                                                
                                                        </button>
                                                
                                                    @endif
                                                
                                                </td>
                                                <td>

                                                    <a href="{{ url('admin/eventExpo/edit/'.$row->id) }}"
                                                       class="btn btn-primary btn-xs">

                                                        <i class="fa fa-edit"></i>

                                                    </a>

                                                    <a href="javascript:void(0)"
                                                       class="btn btn-danger btn-xs delete_event"
                                                       data-id="{{ $row->id }}"
                                                       data-toggle="modal"
                                                       data-target="#deleteModal">
                                                    
                                                        <i class="fa fa-trash"></i>
                                                    
                                                    </a>

                                                </td>

                                            </tr>

                                        @endforeach

                                    @else

                                        <tr>

                                            <td colspan="7"
                                                class="text-center">

                                                No Events Found

                                            </td>

                                        </tr>

                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<!-- Status Modal -->

<div class="modal fade"
     id="statusModal">

    <div class="modal-dialog">

        <div class="modal-content bg_color">

            <div class="modal-header">

                <h4 class="modal-title text-white">

                    Change Status

                </h4>

                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal">

                    <i class="fa fa-times"></i>

                </button>

            </div>

            <form
                id="statusForm"
                method="POST">

                @csrf

                <div class="modal-body">

                    <input
                        type="hidden"
                        id="event_id"
                        name="event_id">

                    <input
                        type="hidden"
                        id="status_name"
                        name="status_name">

                    <h5 class="text-white">

                        Are you sure you want to change status?

                    </h5>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal">

                        Close

                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger">

                        Yes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<script>

    $(document).on('click', '.event_status', function () {

        var id = $(this).data('id');
        var status_name = $(this).data('name');

        $('#event_id').val(id);
        $('#status_name').val(status_name);

        $('#statusForm').attr(
            'action',
            "{{ url('admin/eventExpo/status') }}/" + id
        );

    });

</script>
<script>
$(document).on('click', '.delete_event', function () {

    var id = $(this).data('id');

    if(confirm("Are you sure you want to delete this event?")){

        $.ajax({

            url: "{{ url('admin/eventExpo/destroy') }}",

            type: "POST",

            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },

            success: function(response){

                alert('Event Deleted Successfully');
                location.reload();

            },

            error: function(xhr){

                console.log(xhr.responseText);
                alert('Delete Failed');

            }

        });

    }

});
</script>
@endsection