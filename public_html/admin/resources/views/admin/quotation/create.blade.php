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
                            <h3 class="card-title"><i class="fa fa-bank"></i> &nbsp; Add Quotation</h3>
                            <div class="card-tools">
                                <a href="{{url ('admin/quotation') }}" class="btn btn-warning text-white btn-sm"><i
                                        class="fa fa-eye"></i> View</a>
                            </div>

                        </div>
                        <form id="quickForm" action="{{route('admin.quotation.store')}}"   method="POST" enctype="multipart/form-data">
                           @csrf
                            <div class="row m-2">
                                <div class="form-group col-md-2">
                                    <label for="Plan_type">Plan Type</label>
                                    <!--<select name="plan_type" id="plan_type" class="mt-2 form-control @error('plan_type') is-invalid @enderror" required>-->
                                    <!--    <option value="">Choose Your Plan </option>-->
                                    <!--    <option value="1">One Time Subscription </option>-->
                                    <!--    <option value="2">Yearly Subscription </option>-->
                                    <!--</select>-->
                                    <select name="plan_type" class="form-control mt-2" required>
                                        <option value="">Choose Plan Type</option>
                                        @foreach($planTypes as $type)
                                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Plan_type">Discount Label</label>
                                        <input type="text" class="form-control mt-2" name="discount_label" id="discount_label" placeholder="Enter Discount Label" required>
                                        @error('discount_label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="plan_name">Plan Name</label>
                                        <!--<select name="plan_name" id="plan_name" class="opwidhead mt-2 form-control @error('plan_name') is-invalid @enderror" required>-->
                                        <!--    <option value="">Choose Your Plan Name</option>-->
                                        <!--    <option value="">OPD/Clinic Module</option>-->
                                        <!--    <option value="Tirupati HMS Pro+">Tirupati HMS Pro+</option>-->
                                        <!--    <option value="Tirupati Lab Pro+">Tirupati Lab Pro+</option>-->
                                        <!--    <option value="Tirupati Radiology Pro+">Tirupati Radiology Pro+</option>-->
                                        <!--    <option value="">Yearly Subscription Plan</option>-->
                                        <!--    <option value="Premium Plan">Premium Plan</option>-->
                                        <!--    <option value="Laboratary Plan">Laboratary Plan</option>-->
                                        <!--    <option value="Radiology Plan">Radiology Plan</option>-->
                                        <!--</select>-->
                                        <select name="plan_name" class="form-control mt-2" required>
                                            <option value="">Choose Plan Name</option>
                                            @foreach($plans as $plan)
                                                <option value="{{ $plan->name }}">{{ $plan->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="amount">Amount </label>
                                        <input type="text" class="form-control mt-2" name="amount"
                                                id="amount" placeholder="Enter Amount" required>
                                        
                                              
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group col-md-2">
                                    <label for="Plan_type">Is Popular</label>
                                    <select name="popular" id="popular" class="mt-2 form-control @error('popular') is-invalid @enderror" required>
                                        <option value="">Is it Popular or not?</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                  <table class=" table-bordered" id="" width="100%">
                                    <thead>
                                      <tr>
                                          <th class="serialWidth">Sr.</th>
                                        <th colspan="" >Modules & Features</th>
                                        <th width="90px"></th>
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                      <tr id="appendRow_0" >
                                          <td class="serialWidth">1)</td>
                                        <td colspan="1">
                                            <input name="features[]" id="features_0" type="text" class="form-control features" tabindex="1"  value="{{old('features')}}" placeholder="Features" required>        
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
        $('#table_body').append('<tr id="appendRow_'+count+'" ><td class="serialWidth">'+parseInt(count + 1)+')</td><td colspan="1"><input name="features[]" id="features_'+count+'" tabindex="1" tabindex="1" type="text" class="form-control features"  value="{{old('features')}}" placeholder="Features" required>        </td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn" tabindex="1"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx ml-2 " id="removerow_'+count+'" tabindex="1"><i class="fa fa-trash"></i></button></div></td> </tr>');
            

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










