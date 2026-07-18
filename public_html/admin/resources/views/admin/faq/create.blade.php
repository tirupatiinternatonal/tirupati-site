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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Create FAQ</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/faq') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                                <!--<a href="https://www.school.rukmanisoftware.com/account_dashboard" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back</a>-->
                            </div>

                        </div>
                        
                                 
                        
                        <form id="quickForm" action="{{route('admin.faq.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="page_name">Module Name</label>
                                        <select name="page_name" id="page_name" class="mt-2 form-control @error('page_name') is-invalid @enderror">
                                            
                                            @if(!empty($routes))
                                                @foreach ($routes as $route)
                                                    
                                                    @php
                                                    $op = "<option value='$route->id' ";
                                                    @endphp
                                                                
                                                        @if(!empty($data))
                                                            @foreach ($data as $pid)
                                                            
                                                                @if( $route->id == $pid->page_name )
                                                                    @php
                                                                    $op .= "disabled";
                                                                    @endphp
                                                                @endif
                                                                
                                                            @endforeach
                                                        @endif
                                                    
                                                    @php
                                                    $op .= ">";
                                                    $op .= $route->page_name;
                                                    $op .= "</option>";
                                                    
                                                    echo $op;
                                                    
                                                    @endphp
                                            
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control mt-2 @error('title') is-invalid @enderror" 
                                               name="title" id="title" placeholder="title" value="{{old('title')}}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Username">YouTube URL</label>
                                              <input type="text" class="form-control mt-2" name="url"
                                                id="url" placeholder="Enter YouTube URL ">
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="form-group col-md-3">
                                       <label for="imge">Image</label>
                                        {!! Form::file('photo',array('class' => 'form-control mt-2','id'=>'photo')) !!}
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modul_descreption">Module Description</label>
                                        <textarea id="modul_descreption" name="modul_descreption" placeholder="Module Description" rows="4" cols="100"></textarea>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                             
                            <div class="row m-2">
                        
                                <div class="col-md-6">
                                <table class="_table table-bordered" id="tableId" class="table" style="width:100%;">
                                    <thead>
                                        
                                        <tr>
                                            <td style="width:40%;text-align:center;">
                                                <label for="Username">Description</label>
                                            </td>
                                            <td style="text-align:center;">
                                                <label for="Username">Description Image</label>
                                            </td>
                                            <td style="text-align:center;">
                                               <b>Action</b> 
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        <tr id="appendRow_0">
                                            <td>
                                                <textarea type="text" class="form-control mt-2" name="description[]" id="description"></textarea>
                                            </td>
                                            <td>
                                                <input type="file" class="form-control mt-2" name="descriptionimage[]" id="descriptionimage">
                                                <!--{!! Form::file('descriptionimage[]',array('class' => 'form-control mt-2','id'=>'descriptionimage')) !!}-->
                                            </td>
                                            <td style="width: 92px;">
                                                <div class="action_container">
                                                    <button type="button" class="btn btn-outline-primary" id="clonebtn"><i class="fa fa-plus"></i></button>
                                                    <button type="button" class="btn btn-outline-danger  removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg pl-3 pr-3">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
    </section>
</div>
<script>
  
</script>

<style>
    .Label_top{
        margin-top: 25px;
    }
    
    
     .action_container {
            display: flex;
            gap: 5px;
        }
        .add-row {
            text-align: center;
        }
</style>
 <link rel="stylesheet" href="{{ asset('public/assets/dropify.css') }}">
   <script src="{{URL::asset('public/assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify.js')}}"></script>
    <script src="{{URL::asset('public/assets/dropify1.js')}}"></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

       <script>
    $(document).ready(function() {
        var count = 0; // Initialize count to keep track of rows
        $(".removeprodtxtbx").eq(0).css("display", "none"); // Hide the remove button for the first row

        $(document).on("click", "#clonebtn", function() {
            count++; // Increment the row count

            // Create a new row
            var newRow = '<tr id="appendRow_' + count + '">' +
                '<td><textarea class="form-control mt-2" name="description[]" id="description"></textarea></td>' +
                '<td><input type="file" class="form-control mt-2" name="descriptionimage[]" id="descriptionimage"></td>' +
                '<td style="width: 92px;">' +
                '<div class="action_container">' +
                '<button type="button" class="btn btn-outline-danger removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>' +
                '</div>' +
                '</td>' +
                '</tr>';

            // Append the new row to the table body
            $('#table_body').append(newRow);

            // Show the remove button for the new row
            $(".removeprodtxtbx").eq(count).css("display", "block");
        });

        $(document).on("click", "#removerow", function() {
            // Remove the current row
            $(this).closest('tr').remove();
            count--; // Decrement the row count

            // Hide the remove button if it's the last row
            if ($("#table_body tr").length === 1) {
                $(".removeprodtxtbx").eq(0).css("display", "none");
            }
        });
    });
</script>

@endsection










