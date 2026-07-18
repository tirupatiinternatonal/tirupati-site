@extends('layout.app')
@section('content')
@php
$users =  DB::connection('mysql');

@endphp
	<section class="page-header">
			<div class="page-header__bg"
				style="background-image: url(http://tirupati-international.in/public/assets/images/radiology.jpg);"></div>
			<!-- /.page-header__bg -->
			<div class="container">
				<h2 class="page-header__title">Radiology Report </h2><!-- /.page-header__title -->
				<ul class="list-unstyled breadcrumb-one">
					<li><a href="{{url('welcome')}}">Home</a></li>
					<li><span>Radiology report</span></li>
				</ul><!-- /.list-unstyled breadcrumb-one -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		    
		    <div class="container-fluid">
		        
		        <div class="row">
		        <div class="col-md-6" style="margin-top: 20px;"><h5>Patient Radiology Report Download:-</h5></div>
		        </div>
		    </div>
 
		<form action="{{url('radio')}}" method="POST">
		     @csrf
		<div class="row">
		    <div class="col-md-2"></div>
		    <div class="col-md-8" style="display:flex;">
		 <div class="col col-sm-4">
		    <h6>UHID NO.</h6> 
		    <input class="brd-fs-clr" type="text" name="uhid_no" placeholder="UHID No." required="">
		</div>
		<div class="col col-sm-4">
		    <h6>Rx. Receipt NO.</h6> 
		    <input class="brd-fs-clr" type="text" name="rx_rec_no" placeholder="Rx. Receipt No." required="">
		</div>
		<div class="col col-sm-4">
		    <h6>Rx. ID</h6> 
		    <input class="brd-fs-clr" type="text" name="rx_id" placeholder="Rx. ID" required="">
		</div>
	</div>
	</div>
	<div class="row" style="margin-top:10px;">
            <div class="col col-sm-12" style="text-align:center;">
                <input name="Submit" type="submit" value="Download Report" class="btn btn-primary"> 
                </div> 
        </div>
	</form>
	<style>
	    .row{
	        margin-right:0px !important;
	        margin-left:0px !important;
	    }
	</style>
@endsection
