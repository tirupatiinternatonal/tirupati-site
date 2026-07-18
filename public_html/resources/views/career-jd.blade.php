@extends('layout.app')
@section('content')
@php
$bannerbg = Helper::bannerimg();

    $cid = request('id');
    
    $cjd = DB::table('career_jd')->where('id', $cid)->first();
  
@endphp

    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


        <section class="section-career">
            <div class="sec-title text-center mb-5">
        		<h2 class="sec-title__title mb-2">We Are Hiring..!</h2>
        		<h3 class="sec-title__title">Be a part of Our Team<br/><span class="tstylish">@Tirupati Software Infotech Pvt.Ltd.</span></h3>
        		
        		<a href="{{url('career')}}?id=1" class="cd-hero__btn cd-btn-prim mt-5">Apply Now</a>
        	</div>
        </section>
<!-- Section-1 -->
    
    <section class="section-careerjd">
    
        <div class="row">
    
            <div class="col-md-12 col-lg-3">
                <div class="jdbox">
                	<div class="jdlist">
                	    <div class="sec-title text-center wow bounceInUp">
                    		<p class="sec-title__tagline">Minimum/Mandatory Requirements</p>
                    	</div>
                    	<div class="jdbox">{!! $cjd->minimum_requirement !!}</div>

                	</div>
            	</div>
            </div>
            
            <div class="col-md-12 col-lg-3">
                <div class="jdbox">
                	<div class="jdlist">
                	    <div class="sec-title text-center wow bounceInUp">
                    		<p class="sec-title__tagline">Addon Requirments</p>
                    	</div>
                    	<div class="jdbox">{!! $cjd->addon_requirement !!}</div>
                	</div>
            	</div>
            </div>
    
            <div class="col-md-12 col-lg-3">
                <div class="jdbox">
                	<div class="jdlist">
                	    <div class="sec-title text-center wow bounceInUp">
                    		<p class="sec-title__tagline">Offers & Pakcages</p>
                    	</div>
                    	<div class="jdbox">{!! $cjd->offers !!}</div>
                	</div>
            	</div>
            </div>
            
            <div class="col-md-12 col-lg-3">
                <div class="jdbox">
                	<div class="jdlist">
                	    <div class="sec-title text-center wow bounceInUp">
                    		<p class="sec-title__tagline">Job Description</p>
                    	</div>
                    	<div class="jdbox">{!! $cjd->job_description !!}</div>
                	</div>
            	</div>
            </div>

        </div>
        

        
    
    </section>

<!-- /Section-1 -->



@endsection
