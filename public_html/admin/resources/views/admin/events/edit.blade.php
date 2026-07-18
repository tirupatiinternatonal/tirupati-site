@extends('admin.layouts.app')

@section('title')
    Edit Event
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
                               <i class="fa fa-edit"></i>
                                Edit Event
                            </h3>

                            <div class="card-tools">

                                <a href="{{ url('admin/eventExpo') }}"
                                   class="btn btn-warning btn-sm text-white">

                                    <i class="fa fa-arrow-left"></i>
                                    Back

                                </a>

                            </div>

                        </div>

                        <form action="{{ url('admin/eventExpo/update/'.$data->id) }}"
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
                                                   class="form-control"
                                                   name="title"
                                                   value="{{ $data->title }}"
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
                                                   value="{{ $data->slug }}"
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
                                                name="description">{{ $data->description }}</textarea>

                                                <div class="text-right mt-2">

                                                <button type="button"
                                                        class="btn btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#aiModal">

                                                    <i class="fa fa-magic"></i>
                                                    Generate With AI

                                                </button>

                                            </div>

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
                                                   value="{{ $data->event_date }}"
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
                                                   value="{{ $data->event_time }}"
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
                                                   value="{{ $data->location }}"
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
                                            </label>
                                            
                                            @if(!empty($data->banner_image))
                                            
                                            <div class="mb-2">
                                            
                                                <img src="{{ env('IMAGE_SHOW_PATH').'event/'.$data->banner_image }}"
                                                     width="220"
                                                     class="img-thumbnail">
                                            
                                            </div>
                                            
                                            @endif
                                            
                                            <input type="file"
                                                   name="banner_image"
                                                   class="form-control"
                                                   accept="image/*">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>Gallery Images</label>

                                            @if(!empty($galleryImages))
                                            
                                            <div class="row mb-3">
                                            
                                                @foreach($galleryImages as $image)
                                            
                                                    <div class="col-md-3 mb-3">
                                            
                                                        <img src="{{ asset('public/uploads/events/gallery/'.$image->img) }}"
                                                             class="img-thumbnail"
                                                             style="height:120px;width:100%;object-fit:cover;">
                                            
                                                    </div>
                                            
                                                @endforeach
                                            
                                            </div>
                                            
                                            @endif
                                            
                                            <input type="file"
                                                   name="gallery_images[]"
                                                   class="form-control"
                                                   multiple
                                                   accept="image/*">
                                            
                                            <small class="text-muted">
                                                Leave blank if you don't want to change gallery images.
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card-footer text-center">

                                <button type="submit"
                                        class="btn btn-success">

                                    <i class="fa fa-save"></i>
                                    Update Event

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

<!-- AI Modal -->

<div class="modal fade"
     id="aiModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-primary">

                <h5 class="modal-title">

                    <i class="fa fa-magic"></i>
                
                    AI Description Generator
                
                </h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    &times;

                </button>

            </div>

            <div class="modal-body">

           <div class="row">

    <div class="col-md-6">

        <div class="form-group">

            <label>
                AI Tone
            </label>

            <select id="ai_tone"
                    class="form-control">

                <option value="Professional">
                    Professional
                </option>

                <option value="Corporate">
                    Corporate
                </option>

                <option value="Marketing">
                    Marketing
                </option>

                <option value="Friendly">
                    Friendly
                </option>

                <option value="Technical">
                    Technical
                </option>

            </select>

        </div>

    </div>

    <div class="col-md-6">

                        <div class="form-group">

                            <label>
                                Description Length
                            </label>

                            <select id="ai_length"
                                    class="form-control">

                                <option value="150">
                                    150 Words
                                </option>

                                <option value="250" selected>
                                    250 Words
                                </option>

                                <option value="400">
                                    400 Words
                                </option>

                                <option value="600">
                                    600 Words
                                </option>

                            </select>

                        </div>

                    </div>

                </div>
                <div class="form-group">

                    <label>

                        Prompt

                    </label>

                    <textarea
                        id="ai_prompt"
                        class="form-control"
                        rows="6"
                        placeholder="Example:
Generate a professional event description with modern corporate language..."></textarea>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                    Close

                </button>

                <button type="button"
                        id="generateAI"
                        class="btn btn-primary">

                    <i class="fa fa-magic"></i>

                    Generate

                </button>

            </div>

        </div>

    </div>

</div>

@endsection
