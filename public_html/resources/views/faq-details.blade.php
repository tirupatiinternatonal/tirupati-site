@extends('layout.app')
@section('content')


@php

    $bannerbg = Helper::bannerimg();
    
    $modid = request('mod');
    
    $tmod = DB::table('routes')->where('id', $modid)->first();
        $modulename = $tmod->page_name;
        
   
    $tmodules = DB::table('faqs')->where('page_name', $modid)->first();
    
    $tisid = "";
    $proscreenimg = "";
    $youtubeurl = "";
    $modes = "";
    
    if($tmodules) {
        $tisid = $tmodules->id;
        $proscreenimg = $tmodules->photo;
        $youtubeurl = $tmodules->url;
        $modes = $tmodules->modul_descreption;
    
        
        $modques = DB::table('faq_details')->where('faq_id', $tisid)->get();
    }


@endphp

    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


<!-- FAQ -->

    <section class="section-faq section-faqdetails">
		<div class="container">
		    
		    <div class="row gutter-y-60">
		        <div class="col-md-12 col-lg-12">
		            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item  wow bounceInLeft"><a href="{{url('faq')}}">FAQ</a></li>
                        <li class="breadcrumb-item active  wow bounceInLeft" aria-current="page">{{ $modulename ?? '' }}</li>
                      </ol>
                    </nav>
		        </div>
		    </div>
		    
		    <div class="row">
		        <div class="col-md-12 col-lg-12">
		            <p>
		                {{ $modes }}
		            </p>
		        </div>
		        
		        <div class="col-md-12 col-lg-12">
		            <div class="tmodlinkbox">
                        @if(!empty($youtubeurl))
                        <img src="{{url('public/assets/images/aniyoutube.gif')}}" class="img-fluid" alt="">
                        <a href="{{ $youtubeurl }}" target="_blank">
                            <p>{{ $youtubeurl }}</p>
                        </a>
                        @endif
                    </div>
		        </div>
		        
		        <div class="col-md-12 col-lg-12">
		            <div class="tmodimgbox">
                        <a class="image-popup-no-margins" href="{{ env('IMAGE_SHOW_PATH').'image/photo/'.$proscreenimg }}">
		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/faq/'.$proscreenimg }}" class="img-fluid" alt="">
		                </a>
                    </div>
		        </div>
		        
		    </div>
		    
		    
			<div class="row gutter-y-60">
                <div class="col-md-12 col-lg-12 wow fadeInRight tfaqdata">
                    <ol class="olist">
                       
                        @if (!empty($modques))
                            @php $i=1; @endphp
                            @foreach ($modques as $key=>$item)
                                
                                <li>
                                    <p>{{ $item->descreption }}</p>
                                    <img src="{{ env('IMAGE_SHOW_PATH').'image/descreptionimage/'.$item->descriptionimage }}" class="img-fluid" alt="">
                                    
                                    <!--<div class="modqry">-->
                                    <!--    <p>{{ $item->descreption }}</p>-->
                                    <!--    <a class="image-popup-no-margins" href="{{ env('IMAGE_SHOW_PATH').'image/descreptionimage/'.$item->descriptionimage }}">-->
                                    <!--        <img src="{{url('public/assets/images/eye.png')}}" class="img-fluid" alt="">-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </li>
                                
                                
                            @endforeach
                        @endif

                    </ol>
                </div>
            </div>
				
		</div>
	</section>

<!-- /FAQ -->


<!-- Tirupati Newsletter -->

    <section class="section-news">
            <div class="container">
                <div class="sec-title text-center">
    				<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Global clients</p>
    				<h3 class="sec-title__title">We’ve more then 1023+ global clients</h3>
    			</div>
    			
    			<div class="row">
    			    <div class="col-md-12 col-lg-12">
						
						<form action="{{url('web_form')}}" method="post" class="news wow fadeInUp" data-wow-duration="4s">
						    @csrf
							<input type="text" name="email" id="email" placeholder="Email Address">
							<button type="submit">
							    <img src="{{url('public/assets/images/email-ani.gif')}}" alt="">
							</button>
						</form>
						
						<div class="mc-form__response"></div>
						
						<p class="newssubs">Plz subscribe to our newsletter to be updated with the latest news <br/>related to Tirupati International.</p>
						
					</div>
    			</div>
    			
            </div>
    </section>
    
<!-- /Tirupati Newsletter -->


	
@endsection
