@extends('admin.layouts.app')

@section('title')
    Create Event
@endsection

@section('content')

<div class="content-wrapper">

    <section class="content pt-3">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card card-outline card-orange">

                        <div class="card-header bg-primary">

                            <h3 class="card-title">
                                <i class="fa fa-plus-circle"></i>
                                Add New Event
                            </h3>

                            <div class="card-tools">

                                <a href="{{ url('admin/eventExpo') }}"
                                   class="btn btn-info btn-sm">
                            
                                    <i class="fa fa-eye"></i>
                                    View Events
                            
                                </a>
                            
                            </div>

                        </div>

                        <form id="eventForm"
                              action="{{ url('admin/eventExpo/store') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Event Title
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text"
                                                   id="title"
                                                   class="form-control"
                                                   name="title"
                                                   placeholder="Enter Event Title"
                                                   required>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Slug
                                            </label>

                                            <input type="text"
                                                   class="form-control"
                                                   name="slug"
                                                   placeholder="event-slug">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label>
                                                Description
                                                <span class="text-danger">*</span>
                                            </label>

                                            <textarea
                                                id="description"
                                                class="form-control"
                                                rows="8"
                                                name="description"></textarea>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Event Date
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="date"
                                                   name="event_date"
                                                   class="form-control"
                                                   required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Event Time
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="time"
                                                   name="event_time"
                                                   class="form-control"
                                                   required>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Location
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text"
                                                   name="location"
                                                   class="form-control"
                                                   placeholder="Enter Event Location"
                                                   required>

                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <h5 class="mb-3">
                                    <i class="fa fa-image"></i>
                                    Event Images
                                </h5>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Banner Image
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="file"
                                                   name="banner_image"
                                                   class="form-control"
                                                   accept="image/*">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>
                                                Gallery Images
                                            </label>

                                            <input type="file"
                                                   name="gallery_images[]"
                                                   class="form-control"
                                                   multiple
                                                   accept="image/*">

                                            <small class="text-muted">
                                                You can select multiple images.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card-footer text-center">

                                <button type="submit"
                                        class="btn btn-success">

                                    <i class="fa fa-save"></i>
                                    Save Event

                                </button>

                                <a href="{{ url('admin/eventExpo') }}"
                                   class="btn btn-secondary">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
<script>
$(document).ready(function () {

    $('#eventForm').submit(function (e) {

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function (response) {

                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {

                    if (result.isConfirmed) {
                        location.reload();
                    }

                });

            },

                error: function (xhr) {
                       console.log(xhr.responseText);
                       alert(xhr.responseText);
                }
            }

        });

    });

});
</script>
@endsection
