@extends('layout.app')
@section('content')

@php
$bannerbg = Helper::bannerimg();

$gallery =DB::table('event_image')->OrderBy('id','asc')->get();

$team =DB::table('event_image')->where([['type',6],['status',1]])->get();
$certificate =DB::table('event_image')->where([['type',5],['status',1]])->get();
$events =DB::table('event_image')->where([['type',7],['status',1]])->get();
$interior =DB::table('event_image')->where([['type',1],['status',1]])->get();
$exterior =DB::table('event_image')->where([['type',2],['status',1]])->get();
$worksite =DB::table('event_image')->where([['type',8],['status',1]])->get();
$officedecorum =DB::table('event_image')->where([['type',9],['status',1]])->get();
$celebrations =DB::table('event_image')->where([['type',3],['status',1]])->get();

@endphp

<style>
    .gallery-type{
        display: contents ;
    }
    .gallery{
        border:solid;
        padding:20px 20px;
        height:100%;
        Width:100%;
        box-shadow:10px 10px 10px 10px #888888;
        margin:40px 40px;
        
    }
    .service-card-four
    {
        height: 90%;
    }
    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

     .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.9);
    }
    
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }
    
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }
    
    .modal-content, #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
    }
    
    @keyframes zoom {
      from {transform:scale(0)}
      to {transform:scale(1)}
    }
    
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }
    
    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    
    @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
    }
    .containers {
    margin: 26px 27px 0px 27px;
    box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
</style>

    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->

<!-- Gallery -->

<section class="section-team">
    <div class="containers">
        <div class="row gutter-y-30" style:"--bs-gutter-y: 30px;">
            <div class="col-md-3 col-lg-3 wow fadeInLeft">
                <div class="tabdata"></div>
                <ul class="sidenav">
                    <li><a href="#ourteamdiv">Our Team</a></li>
                    <li><a href="#certificatediv">Certificates & Rewards</a></li>
                    <li><a href="#eventsdiv">Events</a></li>
                    <li><a href="#interiordiv">Interior</a></li>
                    <li><a href="#exteriordiv">Exterior</a></li>
                    <li><a href="#worksitediv">Work-Site</a></li>
                    <li><a href="#officedecorumdiv">Office Decorum</a></li>
                    <li><a href="#celebrationsdiv">Celebrations</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-9 wow fadeInRight">
                
                <div class="row gutter-y-30" style:"--bs-gutter-y: 30px;">
                    <!--Our Team-->
                    <div class="col-md-12 col-lg-12">
                        <div id="ourteamdiv" class="tabdata"></div>
                        @if (!empty($team))
                            <div class="gallary-head">
                                <h3>Our Team</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="ourteam" class="mosaic popup-gallery">
                                @php $i=1; @endphp
                                @foreach ($team as $key=>$item)
            		                <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                </a>
                                @endforeach
                            </div>
                        @endif
	                </div>

                        
                    <!--Certificates & Rewards-->
                    <div class="col-md-12 col-lg-12">
                        <div id="certificatediv" class="tabdata"></div>
                        @if (!empty($certificate))
                            <div class="gallary-head">
                                <h3>Certificates & Rewards</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="certificate" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($certificate as $key=>$item)
                                     <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                 </a>
                                @endforeach
                            </div>
                        @endif
    	            </div>
    	            
                         
                    <!--Events-->
                    <div class="col-md-12 col-lg-12">
                        <div id="eventsdiv" class="tabdata"></div>
                        @if (!empty($events))
                            <div class="gallary-head">
                                <h3>Events</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="events" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($events as $key=>$item)
                                     <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                 </a>
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                    <!--Interior-->
                    <div class="col-md-12 col-lg-12">
                        <div id="interiordiv" class="tabdata"></div>
                        @if (!empty($interior))
                            <div class="gallary-head">
                                <h3>Interior</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="interior" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($interior as $key=>$item)
                                
                                    @php
                                    $imgvid = $item->photo;
                                    $x = explode(".", $imgvid);
                                    $extension = array_slice($x, -1)[0];
                                    @endphp

                                    @if ($extension == "mp4")
                                
                                        <a class="open-popup" href="#interior-modal-{{$i}}">
                                            <div class="vdoimg">
                                                <img src="{{url('public/assets/images/youtube-icon.png')}}" class="img-fluid vihid" alt="" data-high-res-image-src="">
                                            </div>
                                        </a>
                                        
                                        <div id="interior-modal-{{$i}}" class="mfp-hide white-popup-block modalbx">
                                        	<video controls class="modalvdo">
                                                <source src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" type="video/mp4">
                                            </video>
                                        </div>
                                        
                                        @php $i++; @endphp
                                        
            		                @else
                		                
                                        <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
                    		                <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
                		                </a>
                		                
            		                @endif
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                    <!--Exterior-->
                    <div class="col-md-12 col-lg-12">
                        <div id="exteriordiv" class="tabdata"></div>
                        @if (!empty($exterior))
                            <div class="gallary-head">
                                <h3>Exterior</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="exterior" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($exterior as $key=>$item)
                                     <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                 </a>
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                    <!--Work-Site-->
                    <div class="col-md-12 col-lg-12">
                        <div id="worksitediv" class="tabdata"></div>
                        @if (!empty($worksite))
                            <div class="gallary-head">
                                <h3>Work Site</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="work-site" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($worksite as $key=>$item)
                                     <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                 </a>
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                    <!--Office Decorum-->
                    <div class="col-md-12 col-lg-12">
                        <div id="officedecorumdiv" class="tabdata"></div>
                        @if (!empty($officedecorum))
                            <div class="gallary-head">
                                <h3>Office Decorum</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="office-decorum" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($officedecorum as $key=>$item)
                                    @php
                                    $imgvid = $item->photo;
                                    $x = explode(".", $imgvid);
                                    $extension = array_slice($x, -1)[0];
                                    @endphp

                                    @if ($extension == "mp4")
                                
                                        <a class="open-popup" href="#od-modal-{{$i}}">
                                            <div class="vdoimg">
                                                <img src="{{url('public/assets/images/youtube-icon.png')}}" class="img-fluid vihid" alt="" data-high-res-image-src="">
                                            </div>
                                        </a>
                                        
                                        <div id="od-modal-{{$i}}" class="mfp-hide white-popup-block modalbx">
                                        	<video controls class="modalvdo">
                                                <source src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" type="video/mp4">
                                            </video>
                                        </div>
                                        
                                        @php $i++; @endphp
                                        
            		                @else
                		                
                                        <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
                    		                <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
                		                </a>
                		                
            		                @endif
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                    <!--Celebrations-->
                    <div class="col-md-12 col-lg-12">
                        <div id="celebrationsdiv" class="tabdata"></div>
                        @if (!empty($celebrations))
                            <div class="gallary-head">
                                <h3>Celebrations</h3>
                                <div class="theline"></div>
                            </div>
                            <div id="celebrations" class="mosaic popup-gallery">
                                @php
                                $i=1;
                                @endphp
                                @foreach ($celebrations as $key=>$item)
                                     <a href="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" title="{{ $item->event_name }}" class="team-anchor">
            		                    <img src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}" class="img-fluid" alt="" data-high-res-image-src="{{ env('IMAGE_SHOW_PATH').'image/event/'.$item->photo ?? '' }}">
            		                 </a>
                                @endforeach
                            </div>
                        @endif               
                    </div>
                
                
                
	            </div>                
                
            </div>
        </div>
    </div>
</section>

<!-- /Gallery -->


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
