@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')


@php
$getCountry = getCountry();
$getcitie = getCity();
$getstate = getState();
$page = DB::table('page_name')->whereNull('deleted_at')->get();
@endphp
<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Add Page Image</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/page') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.page.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                <div class="form-group col-md-3">
                                    <label for="page">Page Name</label>
                                	<select class="form-control" name="page" id="page">
									    <option value="">Select Page</option>
										@if(!empty($page))
    										@foreach($page as $pagename)
    										    <option value="{{ $pagename->id ?? ''  }}" {{in_array($pagename->id, $pageIds) ? 'disabled' : '' }}>{{ $pagename->page_name ?? ''  }}</option>
    										@endforeach
										@endif
									</select>
                                </div>
                            
                            
                                <div class="form-group col-md-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="title" value="">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            
                            
                                <div class="form-group col-md-6">
                                    <label for="subtitle">Sub Title</label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="subtitle" placeholder="subtitle" value="">
                                        @error('subtitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                
                            </div>
                            
                            <div class="row m-2">    
                                <div class="col-md-6">
                                  <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                          <th class="serialWidth">Sr.No.</th>
                                        <th colspan="" >Image</th>
                                        <th width="50px"></th>
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                      <tr id="appendRow_0" >
                                          <td class="serialWidth">1)</td>
                                        <td colspan="1">
                                            <input name="bgimg[]" id="bgimg_0" type="file" class="form-control bgimg" tabindex="1"  value="{{old('bgimg')}}" required>        
                                        </td> 
                                        <td style="width: 92px;">
                                          <div class="action_container">
                                                <button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1" ><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow_0" tabindex="1"><i class="fa fa-trash"></i></button>
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
    
    count=0;
        $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
        $(document).on("click", "#clonebtn", function() {
    count++;
        $('#table_body').append('<tr id="appendRow_'+count+'" ><td class="serialWidth">'+parseInt(count + 1)+')</td><td colspan="1"><input name="bgimg[]" id="bgimg'+count+'" tabindex="1" tabindex="1" type="file" class="form-control bgimg"  value="{{old('bgimg')}}" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
            

        //$( ".removeprodtxtbx" ).eq( count ).css( "display", "block" );
        //$( ".addmoreprodtxtbx" ).eq( count ).css( "display", "none" );

        });
    
        $(document).on("click", ".removeprodtxtbx", function() {
            $("#table_body").children(":last-child").remove();
            //$(this).parents('tr').remove();
            count--;
            window.calculateSum()
        });

});
</script>


@endsection










