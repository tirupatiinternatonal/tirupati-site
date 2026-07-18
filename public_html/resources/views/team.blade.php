@extends('layout.app')
@section('content')
@php
$bannerbg = Helper::bannerimg();
    
$team =DB::table('team')->where([['status',1]])->get();
$social =DB::table('settings')->first();
@endphp
<style>
    .containers {
    margin: 26px 27px 0px 27px;
    box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
</style>
    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


<!-- Team -->
    <section class="section-team">
		<div class="service-six">
			<div class="containers">
			    
				<div class="sec-title text-center">
					<!--<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Our Team</p>-->
					<h3 class="sec-title__title">Meet Our Skilled Team</h3>
				</div>
				
				<div class="row gutter-y-30" style:"--bs-gutter-y: 30px;">
				    
				    @if (!empty($team))
                    
                        @php
                        $i=1;
                        @endphp
                    
                        @foreach ($team as $key=>$item)
    					<div class="col-md-4 col-lg-4 wow fadeInLeft">
    					    <div class="card">
    					        <div class="card-img">
    					            @if (!empty($item->photo))
                                    <img src="{{ env('IMAGE_SHOW_PATH').'image/Team/'.$item->photo ?? '' }}" alt="" class="card-img-top">
                                    @else
                                    <img src="{{url('public/assets/images/team/emp-noimg.jpg')}}" alt="" class="card-img-top">
                                    @endif
                                </div>
                                <div class="card-body tmcrd">
                                    <h5 class="card-title">{{$item->employee_name ?? ''}}</h5>
                                    <p class="card-text">{{$item->position ?? ''}}</p>
                                    <ul class="list-unstyled team-card__social">
        								<li><a href="{{$item->facebook_profile ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        								<li><a href="{{$item->twitter_profile ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
        								<li><a href="{{$item->linkedin_profile ?? ''}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
        								<li><a href="{{$item->instagram_profile ?? ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
        							</ul>
                                </div>
                               
                            </div>
                        </div>
                        @endforeach
                
                    @endif
                
                </div>

            </div>
        </div>
    </section>
<!-- /Team -->

<!-- Book a Demo -->
	<section class="demo-section">
	    <div class="containers">

			<div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Get free Demo</p>
				<h3 class="sec-title__title">Hospital Management System Software</h3>
			</div>
			
			<a href="{{$social->whatsapp_link ?? ''}}" target="_blank" class="cd-hero__btn cd-hero__btn--secondary">
				<span>
					Book a Demo
					<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
					<!--<i class="far fa-arrow-right"></i>-->
				</span>
			</a>
				
		</div>
	</section>
<!-- /Book a Demo -->
	
@endsection
