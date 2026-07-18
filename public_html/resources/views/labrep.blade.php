@extends('layout.app')
@section('content')
@php
$users =  DB::connection('mysql');

@endphp
	<section class="page-header">
			<div class="page-header__bg"
				style="background-image: url(http://tirupati-international.in/public/assets/images/lab.jpg);"></div>
			<!-- /.page-header__bg -->
			<div class="container">
				<h2 class="page-header__title">Laboratory Report </h2><!-- /.page-header__title -->
				<ul class="list-unstyled breadcrumb-one">
					<li><a href="{{url('welcome')}}">Home</a></li>
					<li><span>Laboratary report</span></li>
				</ul><!-- /.list-unstyled breadcrumb-one -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		    
		    <div class="container-fluid">
		        
		        <div class="row">
		        <div class="col-md-6" style="margin-top: 20px;"><h5>Patient Lab Report Download:-</h5></div>
		        </div>
		    </div>
 
		<form action="{{url('labrep')}}" method="POST" target="_blank">
		    @csrf
		<div class="row">
		    <div class="col-md-2"></div>
		    <div class="col-md-8" style="display:flex;">
		 <div class="col col-sm-4">
		    <h6>UHID NO.</h6> 
		    <input class="brd-fs-clr" type="text" name="uhid_no" placeholder="UHID No." required="">
		</div>
		<div class="col col-sm-4">
		    <h6>Lab Receipt NO.</h6> 
		    <input class="brd-fs-clr" type="text" name="lab_rec_no" placeholder="Lab Receipt No." required="">
		</div>
		<div class="col col-sm-4">
		    <h6>Lab ID</h6> 
		    <input class="brd-fs-clr" type="text" name="lab_id" placeholder="Lab ID" required="">
		</div>
	</div>
	</div>
	<div class="row" style="margin-top:10px;">
            <div class="col col-sm-12" style="text-align:center;">
                <input name="Submit" type="submit" value="Download Report" target="_blank" class="btn btn-primary"> 
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
