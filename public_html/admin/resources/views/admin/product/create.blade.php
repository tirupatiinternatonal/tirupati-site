@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')


@php
$getCountry = getCountry();
$getcitie = getCity();
$getstate = getState();
@endphp
<div class="content-wrapper" style="min-height: 222px;">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Add Product</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/product') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.product.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                               {{--
                                <div class="form-group col-md-3">
                                
                                    @php
                                        dd($productIds);
                                    @endphp
                                
                                    <label for="product_type">Product Type</label>
                                    <select name="product_type" id="product_type" class="mt-2 form-control @error('product_type') is-invalid @enderror" required>
                                        <option value="">Choose Your Product</option>
                                        <option value="1" {{ in_array(1, $productIds) ? 'disabled' : '' }}>Tirupati Ultimate Hms Pro+</option>
                                        <option value="2" {{ in_array(2, $productIds) ? 'disabled' : '' }}>Tirupati Hms Pro+</option>
                                        <option value="3" {{ in_array(3, $productIds) ? 'disabled' : '' }}>Tirupati Lab Pro+</option>
                                        <option value="4" {{ in_array(4, $productIds) ? 'disabled' : '' }}>Tirupati Radio Pro+</option>
                                        <option value="5" {{ in_array(5, $productIds) ? 'disabled' : '' }}>Tirupati Pharmacy Pro+</option>
                                        <option value="6" {{ in_array(6, $productIds) ? 'disabled' : '' }}>Tirupati Doctor Pro+</option>
                                        <option value="7" {{ in_array(7, $productIds) ? 'disabled' : '' }}>Tirupati Blood Bank Pro+</option>
                                    </select>
                                
                                </div>
                                --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="heading">Heading</label>
                                        <input type="text" class="form-control mt-2" name="heading" id="heading" placeholder="Enter Heading" required>
                                        @error('discount_label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="url">Youtube Url</label>
                                        <input type="text" class="form-control mt-2" name="url" id="url" placeholder="Enter Youtube Url" required>
                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control mt-2" id="description" name="description" rows="4" cols="50" required></textarea>
                                        @error('amount')
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
                                <div class="form-group col-md-3">
                                       <label for="imge">Background Image</label>
                                        {!! Form::file('photo2',array('class' => 'form-control mt-2','id'=>'photo2')) !!}
                                </div>
                                
                                
                                <div class="col-md-9">
                                    
                                </div>
                                
                                <div class="col-md-6">
                                  <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                          <th class="serialWidth">Sr.</th>
                                        <th colspan="" >Module's Name</th>
                                        <th colspan="" > Module's Description</th>
                                        <th width="50px"></th>
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                      <tr id="appendRow_0" >
                                          <td class="serialWidth">1)</td>
                                        <td colspan="1">
                                            <input name="card_heading[]" id="card_heading_0" type="text" class="form-control card_heading" tabindex="1"  value="{{old('card_heading')}}" placeholder="Card Heading" required>        
                                        </td> 
                                        <td colspan="1">
                                            <input name="card_description[]" id="card_description_0" type="text" class="form-control card_description" tabindex="1"  value="{{old('card_description')}}" placeholder="Card Description" required>        
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
        $('#table_body').append('<tr id="appendRow_'+count+'" ><td class="serialWidth">'+parseInt(count + 1)+')</td><td colspan="1"><input name="card_heading[]" id="card_heading_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control card_heading"  value="{{old('card_heading')}}" placeholder="Card Heading" required>        </td><td colspan="1"><input name="card_description[]" id="card_description_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control card_description"  value="{{old('card_description')}}" placeholder="Card Description" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
            

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










