@extends('layout.app')
@section('content')

@php
    $bannerbg = Helper::bannerimg();
    
    $tmodules = DB::table('routes')->OrderBy('id','asc')->get();
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


<!-- FAQ -->

    <section class="section-faq">
		<div class="containers">
			<div class="row gutter-y-60">
			    @if (!empty($tmodules))
			        @foreach ($tmodules as $key=>$item)
			        
			        @php
                        $modval1 = str_replace(" ","",$item->page_name);
                        $modval2 = str_replace("-","",$modval1);
                        $modval3 = str_replace("/","",$modval2);
                        $modval4 = str_replace(".","",$modval3);
                        $modval5 = strtolower($modval4);
                    @endphp
			        
                    <div class="col-md-2 col-lg-2 wow fadeInUpBig">
                        <a href="{{url('faq-details')}}?mod={{ $item->id }}">
                            <div class="tmodbox">
                                <div class="iconbox">
                                    <img src="{{url('public/assets/images/moduleicons/' . $modval5 . '.png')}}" class="img-fluid" alt="">
                                </div>
                                <h3>{{ $item->page_name }}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
			</div>
		</div>
	</section>

<!-- /FAQ -->


<!-- Tirupati Newsletter -->

    <section class="section-news">
            <div class="containers">
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
