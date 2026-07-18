@extends('layout.app')
@section('content')
@php
    $social =DB::table('settings')->first();
    $team =DB::table('team')->where([['leadership_id',1],['status',1]])->get();
    $client =DB::table('students')->OrderBy('id','asc')->get();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Hospital Management Software ,Hospital Software, HMS Software, Hospital Management Software,Best Hospital software ,Hospital Software,Tirupati HMS, Lab Software, Pathology Software, Medical & Pharmacy Software, Blood Bank Software, Pharmacy Software,HMS,HIS Software,Healthcare Software,Healthcare Software Companies,CRM, EHR">
    <link rel="icon" type="image/x-icon" href="public/assets/images/logoti.png">
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKSK7XWP');
</script>
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-687284024"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-687284024'); </script>
<!-- End Google Tag Manager -->
</script>
<!-- Event snippet for Enquiry From Google for your Product conversion page --> <script> gtag('event', 'conversion', { 'send_to': 'AW-687284024/V9VoCIP21eUYELi-3McC', 'value': 1.0, 'currency': 'INR' }); </script>
</head>


<style>


.dropdown > .link:hover + .dropdown-menu,
.dropdown-menu:hover {
    opacity: 1; 
    transform: translateY(0px);
    pointer-events: auto;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}





.dropdown:hover .dropdown-content {display: block;}
#box {
  display: flex;
  align-items: center;
  justify-content: center;
  
  color: white;
  font-family: 'Raleway';
 
}
.gradient-border {
  --borderWidth: 3px;
  background: #1D1F20;
  position: relative;
  border-radius: var(--borderWidth);
}
.gradient-border:after {
  content: '';
  position: absolute;
  top: calc(-1 * var(--borderWidth));
  left: calc(-1 * var(--borderWidth));
  height: calc(100% + var(--borderWidth) * 2);
  width: calc(100% + var(--borderWidth) * 2);
  background: linear-gradient(60deg, #f79533, blue, #989898, #a166ab, #5073b8, #1098ad, black, #6fba82);
  border-radius: calc(2 * var(--borderWidth));
  z-index: -1;
  animation: animatedgradient 3s ease alternate infinite;
  background-size: 300% 300%;
}


@keyframes  animatedgradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}



	.text-theme{
	    color:#0057b8cc  !important;
	}
	/*.navbar-expand-lg .navbar-nav .dropdown-menu {*/
 /* position: absolute;*/
 /* background: #0057b8c2;*/
	/*}*/
	.parent:hover > .child{
 animation-name: example;
 animation-duration: 1s;
 animation-timing-function: ease;
}
@keyframes  example {
  0% { transition: transform 1.16s ease-in-out;}
  100%{transform: rotate(360deg);}
}


	.list_inline i {
 color:white !important;
}
	.list_inline a {
 color:white !important;
}
	    .button {
	float: left;
	width: 30px;
	height: 30px;
	cursor: pointer;
	background: #fff;
	overflow: hidden;
	border-radius: 40px 17px 30px 20px;
	transition: all 0.3s ease-in-out;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
	margin-left: 5px;
}

.button span {
	font-size: 16px;
	font-weight: 500;
	line-height: 26px;
	margin-left: 10px;
}

.button:hover {
	width: 150px;
}

.button:nth-child(1):hover .icon {
	background: #e1306c;
}

.button:nth-child(2):hover .icon {
	background: #4267b2;
}

.button:nth-child(3):hover .icon {
	background: #1da1f2;
}

.button:nth-child(4):hover .icon {
	background: #0e76a8;
}

.button:nth-child(5):hover .icon {
	background: #0076b3;
}

.button:nth-child(6):hover .icon {
	background: #be2f2a;
}

.button:nth-child(7):hover .icon {
	background: #0cc143;
}

.button:nth-child(1) span {
	color: #e1306c;
}

.button:nth-child(2) span {
	color: #4267b2;
}

.button:nth-child(3) span {
	color: #1da1f2;
}

.button:nth-child(4) span {
	color: #0e76a8;
}

.button:nth-child(5) span {
	color: #0076b3;
}

.button:nth-child(6) span {
	color: #be2f2a;
}

.button:nth-child(7) span {
	color: #0cc143;
}

.button .icon {
	width: 30px;
	height: 30px;
	text-align: center;
	border-radius: 40px 17px 30px 20px;
	display: inline-block;
	transition: all 0.3s ease-in-out;
}

.button .icon i {
	font-size: 15px;
	line-height: 30px;
	transition: all 0.3s ease-in-out;
	color: blue;
}

.button:hover i {
	color: #fff;
}

 .navbar1 {
        background:transparent;
   
    }


    .navbar1 {
        -webkit-transition: all 0.6s ease-out;
        -moz-transition: all 0.6s ease-out;
        -o-transition: all 0.6s ease-out;
        -ms-transition: all 0.6s ease-out;
        transition: all 0.6s ease-out;
    }

    .navbar1.scrolled {
        background: black !important;
        opacity: 0.9;
        
    }

	</style>
	
	<style>

.header_seat {
  display: inline-block;
  position: relative;
  color: #0087ca;
}

.header_seat:after {
  content: '';
  position: absolute;
  width: 100%;
  transform: scaleX(0);
  height: 1px;
  bottom: 0;
  left: 0;
  background-color: #0087ca;
  transform-origin: bottom right;
  transition: transform 0.25s ease-out;
}

.header_seat:hover:after {
  transform: scaleX(1);
  transform-origin: bottom left;
}

.upper_bar{
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(45deg, #00317a, #00a4c7);
    height:60px;
}
.service-card-five__content{
   background: linear-gradient(#FFFFFF, #FFFFFF 50% ,#00accc  50%,#00accc  );
  background-size: 100% 200%; 
    
  /*trasition effect for background*/
  transition: background 0.5s
}
.service-card-five__content:hover{
     background-position: 100% 100%;
}
</style>
<style>
    /* Code By Webdevtrick ( https://webdevtrick.com ) */
/*@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);*/
/*@import url(https://weloveiconfonts.com/api/?family=entypo);*/

[class^="entypo-"]:before {
	font-family: 'entypo', sans-serif;
}

#social-sidebar {
	left: 0;
	position: fixed;
	top: 30%;
}
#social-sidebar li:first-child a { border-top-right-radius: 5px; }
#social-sidebar li:last-child a { border-bottom-right-radius: 5px; }

#social-sidebar a {
	background: rgba(0, 0, 0, .7);
	color: #fff;
    text-decoration: none;
	display: block;
	height: 50px;
	width: 50px;  
	font-size: 24px;
	line-height: 50px;
	position: relative;
	text-align: center;
    cursor: pointer;
}
#social-sidebar a:hover span {
	left: 120%;
	opacity: 1;
}
#social-sidebar a span {
  font: 12px "Open Sans", sans-serif;
  text-transform: uppercase;
	border-radius: 3px;
	line-height: 24px;
	left: -100%;
	margin-top: -16px;
	opacity: 0;
	padding: 4px 8px;
	position: absolute;
	transition: opacity .3s, left .4s;
	top: 50%;
	z-index: -1;
}

#social-sidebar a span:before {
	content: "";
	display: block;
	height: 8px;
  width: 8px;
	left: -4px;
	margin-top: -4px;
	position: absolute;
	top: 50%;
	transform: rotate(45deg);
}

#social-sidebar a[class*="twitter"]:hover,
#social-sidebar a[class*="twitter"] span,
#social-sidebar a[class*="twitter"] span:before {background: #00aced;}

#social-sidebar a[class*="facebook"]:hover,
#social-sidebar a[class*="facebook"] span,
#social-sidebar a[class*="facebook"] span:before {background: #3B5998;}

#social-sidebar a[class*="gplus"]:hover,
#social-sidebar a[class*="gplus"] span,
#social-sidebar a[class*="gplus"] span:before {background: #E34429;}

#social-sidebar a[class*="dribbble"]:hover,
#social-sidebar a[class*="dribbble"] span,
#social-sidebar a[class*="dribbble"] span:before {background: #ea4c89;}

#social-sidebar a[class*="dropbox"]:hover,
#social-sidebar a[class*="dropbox"] span,
#social-sidebar a[class*="dropbox"] span:before {background: #8DC5F2;}

#social-sidebar a[class*="github"]:hover,
#social-sidebar a[class*="github"] span,
#social-sidebar a[class*="github"] span:before {background: #9C7A5B;}

#social-sidebar a[class*="evernote"]:hover,
#social-sidebar a[class*="evernote"] span,
#social-sidebar a[class*="evernote"] span:before {background: #6BB130;}

.containers {
    margin: 26px 27px 0px 27px;
    box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
</style>

<body>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/651512cee6bed319d003abc7/1hbd52u96';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WX9ZHKX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    
<!-- Hero Slider -->

	<section class="cd-hero js-cd-hero js-cd-autoplay">
	    
		<ul class="cd-hero__slider">
			<li class="cd-hero__slide cd-hero__slide--selected js-cd-slide">
				<div class="cd-hero__content cd-hero__content--full-width">
					<!--<h2 class="cd-maintitle wow fadeInUp">Tirupati<br/>International</h2>-->
					<h2 class="cd-maintitle wow fadeInUp">Tirupati Software Infotech<br/>Pvt. Ltd.</h2>
					<p class="cd-mainslogan">Advanced Healthcare IT & Software Partner Since 2014</p>
					<a href="{{url('abouts')}}" class="cd-hero__btn cd-btn-prim wow fadeIn" data-wow-duration="4s">
					    Explore
					    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
					</a>
				</div> <!-- .cd-hero__content -->
				<div class="overlay-bg overlay"></div>
			</li>

			<li class="cd-hero__slide js-cd-slide">
				<div class="cd-hero__content cd-hero__content--half-width">
					<h2>Hospital Management System</h2>
					<p>Everything you need to run a hospital..!</p>
					<a href="{{$social->whatsapp_link ?? ''}}" target="_blank" class="cd-hero__btn cd-btn-prim">
						<span>
kkk							<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
							<!--<i class="far fa-arrow-right"></i>-->
						</span>
					</a>
					
				    <a href="https://youtu.be/vXfoQud4x4c" class="cd-hero__btn cd-hero__btn--secondary" target="_blank">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->

				<div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
					<!--<div class="monitorbox">-->
					    
					    <img class="monitorgifbg" src="{{ asset('assets/images/tirupativdo.gif') }}" alt="Tirupati Demo Video">

					<!--</div>-->
				</div> <!-- .cd-hero__content -->
				
				<div class="overlay-bg overlay"></div>
			</li>

			<li class="cd-hero__slide js-cd-slide">
				<div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
					<img src="{{url('public/assets/images/heroslider/mobapp.png')}}" alt="Mobile App">
				</div> <!-- .cd-hero__content -->

				<div class="cd-hero__content cd-hero__content--half-width">
					<h2>Mobile Apps</h2>
					<p>Creating a mobile app can help your business <br/>build a stronger brand.</p>
					<p>We build Mobile app <br/>corelated to HMS solution</p>
					<a href="{{$social->whatsapp_link ?? ''}}" target="_blank" class="cd-hero__btn cd-btn-prim">
						<span>
							Book a Demo
							<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
							<!--<i class="far fa-arrow-right"></i>-->
						</span>
					</a>
					<a href="{{url('abouts')}}"
						class="cd-hero__btn cd-hero__btn--secondary">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->
				
				<div class="overlay-bg overlay"></div>
				
			</li>

			<li class="cd-hero__slide cd-hero__slide--video js-cd-slide">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Website Development</h2>
					<p>Having a website means customers are always able to find you – anytime, anywhere.</p>
					<p>We build Static and Dynamic web design <br/>
					for healthcare units</p>
					<a href="{{url('abouts')}}"
						class="cd-hero__btn cd-hero__btn--secondary">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->

                <div class="overlay-bg overlay"></div>
				<div class="cd-hero__content cd-hero__content--bg-video js-cd-bg-video" data-video="{{url('public/assets/images/heroslider/it-vdo')}}">
					<!-- video element will be loaded using JavaScript -->
				</div> <!-- .cd-hero__content -->
			</li>

			<li class="cd-hero__slide js-cd-slide">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Backups</h2>
					<p>Best way to secure your data is to take a backup.
					<br/>
					No worries, we are there for you.</p>
					<!--<p>We provide the backup functionality</p>-->
					<a href="{{url('abouts')}}" class="cd-hero__btn cd-btn-prim">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->
				
				<div class="overlay-bg overlay"></div>
				
			</li>
			
			<li class="cd-hero__slide js-cd-slide">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>SSL secured</h2>
					<p>SSL certificates encrypt data sent between <br/>a browser and a website or between <br/>two servers, preventing hackers <br/>from reading or modifying it.</p> 
					<p>This creates a safer experience for both <br/>businesses and customers.</p>
					
					<a href="{{url('abouts')}}" class="cd-hero__btn cd-hero__btn--secondary">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->
				
				<div class="overlay-bg overlay"></div>
				
			</li>
			
			<li class="cd-hero__slide js-cd-slide">
				<div class="cd-hero__content cd-hero__content--full-width">
					<h2>Database</h2>
					<p>Using database technology to gather, store and process information can give your business a distinct advantage.</p>
					<p>We provide free 5gb+ Space</p>
					<a href="{{url('abouts')}}" class="cd-hero__btn cd-hero__btn--secondary">
						<span>
							Learn More
						</span>
					</a>
				</div> <!-- .cd-hero__content -->
				
				<div class="overlay-bg overlay"></div>
				
			</li>
			
		</ul> 
		<!-- .cd-hero__slider -->
<!--allhide-->
		<div class="cd-hero__nav js-cd-nav ">
			<nav>
				<span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>
				
				<ul>
					<li class="cd-selected"><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
					<li><a href="#0"></a></li>
				</ul>
			</nav> 
		</div> 
		<!-- .cd-hero__nav -->
	</section> <!-- .cd-hero -->

<!-- /Hero Slider -->


<!-- Statistics -->

    <section class="section-statistics">
		<div class="container">
		    
			<div class="row gutter-y-30"style="--bs-gutter-x: 30px;">
			    
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-money-bag wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">1000</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Products<br/>Sales</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-community wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">1023</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Happy Clients<br/>Worldwide</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-target wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">95</span>%</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Success<br/>Rate</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-success wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">12</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Awards<br/>Winning
						
					</div>
				</div>
				
			</div><!-- /.row -->
			
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
		<defs>
			<linearGradient id="bg">
				<stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
				<stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
				<stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
			</linearGradient>
			<path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
		</defs>
		<g>
			<use xlink:href='#wave' opacity=".3">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="10s"
          calcMode="spline"
          values="270 230; -334 180; 270 230"
          keyTimes="0; .5; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacity=".6">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="8s"
          calcMode="spline"
          values="-270 230;243 220;-270 230"
          keyTimes="0; .6; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacty=".9">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="6s"
          calcMode="spline"
          values="0 230;-140 200;0 230"
          keyTimes="0; .4; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
		</g>
	</svg>
	
			
	    </div>
	</section>

<!-- /Statistics -->
<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
   
}

.team-section{
    padding:80px 20px;
    text-align:center;
}

.team-section h2{
    color:black;
    margin-bottom:50px;
    font-size:40px;
}

.team-container{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:30px;
}

.team-card{
    width:280px;
    background:#0b5c60;
    border-radius:10px;
    overflow:hidden;
    transition:0.4s;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

.team-card:hover{
    transform:translateY(-10px);
}

.team-card img{
     width:100%;
    height:300px;
    object-fit:contain;
    background:#fff;
    padding:10px
}

.team-info{
    padding:20px;
}

.team-info h3{
    color:white;
    margin-bottom:10px;
}

.team-info p{
    color:#dcdcdc;
}
</style>
   <!--<section class="team-section">
    <h2 >Digital Health Initiatives</h2>

    <div class="team-container">

        <div class="team-card">
            <img src="/assets/images/ABDM_Logo.png" alt="Member">
            <div class="team-info">
                
            </div>
        </div>

        <div class="team-card">
            <img src="/assets/images/ABDM_Banner.png" alt="Member">
            <div class="team-info">
              <h3></h3>
            </div>
        </div>

        <div class="team-card">
            <img src="/assets/images/NationalHealthCareAuthority.png" alt="Member">
            <div class="team-info">
                
            </div>
        </div>

        <div class="team-card">
            <img src="/assets/images/pradhanmantre.png" alt="Member">
            <div class="team-info">
               
            </div>
        </div>

    </div>
</section>-->
<!-- About -->

	<section class="about-five about-five--home-1 section-about">
		<div class="containers">
			<div class="row gutter-y-60">
				<div class="col-md-12 col-lg-4 offset-lg-1">
				    <div class="tirupati-owner">
				        <img src="{{url('public/assets/images/yogeshsir_newphoto.jpeg')}}" style="width: 100%;height: 98%;" class="wow fadeInLeft" data-wow-duration="4s" alt="Director Sir">
					    <!--<img src="{{url('public/assets/images/yogeshsir.jpeg')}}" style="width: 100%;" class="wow fadeInLeft" data-wow-duration="4s" alt="Director Sir">-->
					    
					    <div class="ceo wow fadeInUp" data-wow-duration="4s">
						    <h4>Yogesh Kumar Lohar</h4>
						    <p>Administrator</p>
						</div>
						
					</div>
				</div>
				<div class="col-md-12 col-lg-6 d-flex">
					<div class="about-five__content">
						<div class="sec-title text-start">
							<p class="sec-title__tagline wow fadeInRight" data-wow-duration="4s">About company</p>
							<h3 class="sec-title__title">Best Healthcare Solution
								provider since 2014</h3>
						</div>
						<div class="about-five__content__text">
						    Welcome to Tirupati Software Infotech Pvt. Limited, a leading innovator in hospital management software since 2014. With over a decade of experience and a robust portfolio of more than 60 integrated modules, we specialize in delivering comprehensive solutions tailored to meet the diverse needs of healthcare facilities. Our software suite covers essential areas such as Outpatient Department (OPD), Inpatient Department (IPD), Pharmacy, Radiology, Laboratory, E-Prescription, Medical Sales, Nursing Desk, and Operation Theatre (OT) management...
						    <!--<p>-->
						    <!--    With a proven track record of over 1,000 satisfied domestic clients across India and more than 150 international clients, our solutions are designed to enhance efficiency, improve patient care, and streamline hospital operations. Our latest innovations include modules for Human Resources (HR) and WhatsApp Integration, reflecting our commitment to leveraging technology for better healthcare management. At Tirupati Software Infotech Pvt. Limited, we are dedicated to advancing the future of hospital management through our cutting-edge technology and exceptional customer support.-->
						    <!--</p>-->
						</div>
						
						<a href="{{url('abouts')}}" class="cd-hero__btn cd-btn-prim mt-5 wow fadeInRight">
    					    Explore More
    					    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
    					</a>
    					
					</div>
				</div>
			</div>
		</div>
	</section>
	
<!-- /About -->
       		
<!-- Service -->

    <section class="section-service">
		<div class="service-six">
			<div class="containers">
			    
				<div class="sec-title text-center">
					<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">What We Offer</p>
					<h3 class="sec-title__title">Our Products and Services</h3>
				</div><!-- /.sec-title -->
				
				<div class="row gutter-y-30" style:"--bs-gutter-y: 30px;">
					<div class="col-md-6 col-lg-3 wow fadeInLeftBig">
						<div class="service-card-four">
						    
							<div class="service-card-four__bg"></div>
							
							<div class="service-card-four__content">
							    
							    <div class="serv-card-icon">
        							<img class="service-card-four__icon" src="{{url('public/assets/images/coding.png')}}" alt="Coding Image" style="height:70px; width:60px">
        							<div class="service-card-four__circle"></div>
    							</div>
    							
    							<h3 class="service-card-four__title"><a href="{{url('ultimatehms')}}">Tirupati Ultimate HMS Pro+</a></h3>
    								
    							<p class="service-card-four__text">Fully Integrated HMS Software with 50+ 	Modules & Features...</p>
    								
    							<div class="card-read-link">
    								<a href="{{url('ultimatehms')}}" class="service-card-four__link">
    								    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    									 <span> Read More </span>
    									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    								</a>
    							</div>
    								
    							<a href="{{ url('product?id=ultimate-hms-pro') ?? ''}}"class="cd-hero__btn cd-hero__btn--secondary full-btn" target="">
    								Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
                                </a>
							    
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-3 wow fadeInLeftBig">
						<div class="service-card-four">
						    
							<div class="service-card-four__bg"></div>
							
							<div class="service-card-four__content">
							    
								<div class="serv-card-icon">
    							    <img class="service-card-four__icon" src="{{url('public/assets/images/medical-team.png')}}" alt="Team Image" style="height:70px; width:60px">
    							    <div class="service-card-four__circle"></div>
							    </div>
								
								<h3 class="service-card-four__title"><a href="{{url('hms')}}">Tirupati  HMS<br>Pro+</a></h3>
								
								<p class="service-card-four__text">To enhance Hospital OPD & IPD management work with this software</p>
								
								<div class="card-read-link">
    								<a href="{{url('hms')}}" class="service-card-four__link">
    								    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    									 <span> Read More </span>
    									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    								</a>
    							</div>
    								
    							<a href="{{ url('product?id=hms-pro') ?? ''}}"class="cd-hero__btn cd-hero__btn--secondary full-btn" target="">
    								Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
                                </a>
								
							</div>
							
						</div>
					</div>
					
					<div class="col-md-6 col-lg-3 wow fadeInRightBig">
						<div class="service-card-four">
						    
							<div class="service-card-four__bg"></div>
							
							<div class="service-card-four__content">
							    
								<div class="serv-card-icon">
    								<img class="service-card-four__icon" src="{{url('public/assets/images/laboratory.png')}}" alt="Laboratory Image" style="height:70px; width:60px">
    								<div class="service-card-four__circle"></div>
								</div>
								
								<h3 class="service-card-four__title"><a href="{{url('lab')}}">Tirupati Laboratory Pro+</a></h3>

								<p class="service-card-four__text">Advanced Laboratory Systems for Pathology Centre</p>
								
								<div class="card-read-link">
    								<a href="{{url('lab')}}" class="service-card-four__link">
    								    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    									 <span> Read More </span>
    									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    								</a>
    							</div>
    								
    							<a href="{{ url('product?id=laboratary-pro') ?? ''}}"class="cd-hero__btn cd-hero__btn--secondary full-btn" target="">
    								Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
                                </a>
								
							</div>
							
						</div>
					</div>
					
					<div class="col-md-6 col-lg-3 wow fadeInRightBig">
					    
						<div class="service-card-four">
						    
							<div class="service-card-four__bg"></div>
							
							<div class="service-card-four__content">
							    
								<div class="serv-card-icon">
    								<img class="service-card-four__icon" src="{{url('public/assets/images/microscope.png')}}" alt="Microscope Image" style="height:70px; width:60px">
    								<div class="service-card-four__circle"></div>
								</div>
								
								<h3 class="service-card-four__title"><a href="{{url('radiology')}}">Tirupati Radiology  Pro+ </a></h3>
								
								<p class="service-card-four__text">Complete Radiology Digital system for X-Ray, USG, MRI, CT-Scan etc</p>
								
								<div class="card-read-link">
    								<a href="{{url('radiology')}}" class="service-card-four__link">
    								    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    									 <span> Read More </span>
    									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M228 128a12 12 0 0 1-12 12H40a12 12 0 0 1 0-24h176a12 12 0 0 1 12 12"/></svg>
    								</a>
    							</div>
    								
    							<a href="{{ url('product?id=radiology-pro') ?? ''}}"class="cd-hero__btn cd-hero__btn--secondary full-btn" target="">
    								Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
                                </a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

<!-- /Service -->


<!-- Achievements -->

    <section class="section-achiev mob-hide">
        <div class="containers">
            
            <div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Achievements</p>
				<h3 class="sec-title__title">We Celebrate Every Milestone</h3>
			</div>
			
            <ul class="tirusteps">
                <li class="manclimbing wow fadeInLeftBig" data-wow-duration="4s"><img src="{{url('public/assets/images/manclimbing.png')}}" alt="Manclimbing Image"></li>
                <li class="tirustp1 wow fadeInDown" data-wow-duration="2s">
                    <h3>2014</h3>
                    <div class="tirustpcont">
                        Company established<br/>
                        with <b>vision of<br/>
                        healthcare IT services</b>
                        <div class="funfact-one__card__shape"></div>
                    </div>
                </li>
                <li class="tirustp2 wow fadeInDown" data-wow-duration="4s">
                    <h3>2015</h3>
                    <div class="tirustpcont">
                        Awarded by<br/>
                        <b>ISO 9001:2015<br/>
                        Certificate</b>
                        <div class="funfact-one__card__shape"></div>
                    </div>
                </li>
                <li class="tirustp3 wow fadeInDown" data-wow-duration="6s">
                    <h3>2017</h3>
                    <div class="tirustpcont">
                        Awarded by<br/>
                        <b>CopyRight@2019 of<br/>
                        Tirupati HMS</b>
                        <div class="funfact-one__card__shape"></div>
                    </div>
                </li>
                <li class="tirustp4 wow fadeInDown" data-wow-duration="8s" data-wow-duration="2s">
                    <h3>2019</h3>
                    <div class="tirustpcont">
                        Upgarded to<br/>
                        <b>Tirupati Software<br/>
                        Infotech Pvt. Ltd.</b>
                        <div class="funfact-one__card__shape"></div>
                    </div>
                </li>
                <li class="tirustp5 wow fadeInDown" data-wow-duration="10s">
                    <h3>2022</h3>
                    <div class="tirustpcont">
                        Achieved<br/>
                        <b>worldwide clients<br/>
                        upto 1000+</b>
                        <div class="funfact-one__card__shape"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- For mobile -->
    <section class="section-achiev desk-hide">
        <div class="containers">
            
            <div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Achievements</p>
				<h3 class="sec-title__title">We Celebrate Every Milestone</h3>
			</div>
			
			<ul class="tiru-mob-steps">
			    <li>
			        <h3 class="wow fadeInLeftBig">2022</h3>
			        <p class="wow fadeInUp" data-wow-duration="4s">Achieved worldwide clients  upto 1000+</p>
			    </li>
			    <li>
			        <h3 class="wow fadeInLeftBig">2019</h3>
			        <p class="wow fadeInUp" data-wow-duration="4s">Upgarded to Tirupati Software Infotech Pvt. Ltd.</p>
			    </li>
			    <li>
			        <h3 class="wow fadeInLeftBig">2017</h3>
			        <p class="wow fadeInUp" data-wow-duration="4s">Awarded by CopyRight@2019 of Tirupati HMS</p>
			    </li>
			    <li>
			        <h3 class="wow fadeInLeftBig">2015</h3>
			        <p class="wow fadeInUp" data-wow-duration="4s">Awarded by ISO 9001:2015 Certificate</p>
			    </li>
			    <li>
			        <h3 class="wow fadeInLeftBig">2014</h3>
			        <p class="wow fadeInUp" data-wow-duration="4s">Company established with vision of healthcare IT services</p>
			    </li>
			</ul>
        </div>
    </section>

<!-- /Achievements -->


<!-- Pay Now -->
		
    <section class="funfact-one section-paynow">
			<div class="containers">
			    
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="funfact-one__info">
						    
						    <div class="dl1">
						        <img class="img-fluid" src="{{url('public/assets/images/dl.png')}}" alt="Other Image">
						    </div>
							<h4 class="wow zoomInUp">
							    Find Quality And Best Price
							</h4>    
							<h4 class="upcs wow zoomInUp" data-wow-duration="2s">
							    Hospital Software Solution
							</h4>
							<div class="dl2">
							    <img class="img-fluid" src="{{url('public/assets/images/dl.png')}}" alt="Other Image">
							</div>
							
							
							<div class="wow zoomIn" data-wow-duration="2s">
                                <a href="{{url('viewquotation')}}" class="cd-hero__btn cd-hero__btn--secondary mt-5 wow fadeInRight">
            					    Explore
            					    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
            					</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		
<!-- /Pay Now -->
		


<!-- Our Team -->

<section class="section-ourteam">
    
    <div class="container">
        
        <div class="sec-title text-center">
			<p class="sec-title__tagline text-white wow fadeInDown" data-wow-duration="4s">Leadership</p>
			<h3 class="sec-title__title">With over 10+ years of combined experience,<br/>we've got a well-seasoned team.</h3>
		</div>

    </div>

    <div class="carousel">
      <div class="carousel__body">
          
        <div class="carousel__prev"><i class="far fa-angle-left"></i></div>
        <div class="carousel__next"><i class="far fa-angle-right"></i></div>
        
        <div class="carousel__slider">
            
            @if (!empty($team))
                    
                @php
                $i=1;
                @endphp
            
                @foreach ($team as $key=>$item)
            
                    <div class="carousel__slider__item">
                        <div class="item__3d-frame">
                            <div class="item__3d-frame__box item__3d-frame__box--front">
                                @if (!empty($item->photo))
                                    <img src="{{ env('IMAGE_SHOW_PATH').'image/Team/'.$item->photo ?? '' }}" alt="Team Member Image" class="img-fluid">
                                @else
                                    <img src="{{url('public/assets/images/team/emp-noimg.jpg')}}" alt="Team Member Image" class="img-fluid">
                                @endif
                            </div>
                          <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                          <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            
                            <div class="teamdata">
                                <div class="tmbx">
                                    <h3>{{$item->employee_name ?? ''}}</h3>
                                    <p>{{$item->position ?? ''}}</p>
                                </div>
                                <ul class="list-unstyled team-card__social">
            						<li><a href="{{$item->facebook_profile ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            						<li><a href="{{$item->twitter_profile ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
            						<li><a href="{{$item->linkedin_profile ?? ''}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            						<li><a href="{{$item->instagram_profile ?? ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
            						<li><a href="tel:{{$item->mobile ?? ''}}" target="_blank"><i class="fa fa-phone"></i></a></li>
            						<li><a href="mailto:{{$item->email ?? ''}}"><i class="fa fa-envelope"></i></a></li>
            					</ul>
                            </div> 
                            
                        </div>
                      </div>
            
                @endforeach
                
            @endif
            
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--front">-->
                  
     <!--           <img src="https://test-tirupati.tirupati-international.in/admin/Team/167652257363edb44df2756swati_mam.jpeg" alt="Team Member Image" class="img-fluid">-->

     <!--         </div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
                
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Swati Thorecha</h3>-->
     <!--                   <p>-->
     <!--                       Managing Director-->
     <!--                       <br/>-->
     <!--                       Accounts and Administrator-->
     <!--                   </p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
     <!--           </div> -->
                
     <!--       </div>-->
     <!--     </div>-->
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--           <div class="item__3d-frame__box item__3d-frame__box--front">-->
     <!--               <img src="https://test-tirupati.tirupati-international.in/admin/Team/167652242563edb3b929222IMG-20230207-WA0029.jpg" alt="Team Member Image" class="img-fluid">-->
     <!--           </div>-->
     <!--           <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--           <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
              
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Yogesh Kumar Lohar</h3>-->
     <!--                   <p>-->
     <!--                       Managing Director-->
     <!--                       <br/>-->
     <!--                       IT and Operational-->
     <!--                       </p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="https://www.facebook.com/tirupatihms" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="https://twitter.com/Yogesh30091987" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="https://www.linkedin.com/company/tirupati-software-infotech-pvt-ltd/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="https://www.instagram.com/tirupati_softwares/" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
     <!--           </div> -->
              
     <!--       </div>-->
     <!--     </div>-->
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--front">-->
     <!--             <img src="https://test-tirupati.tirupati-international.in/admin/Team/167652267163edb4afe5902sunil sir.jpg" alt="Team Member Image" class="img-fluid">-->
     <!--         </div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
              
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Sunil Kumawat</h3>-->
     <!--                   <p>Sr. Project Manager</p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
     <!--           </div> -->
                
     <!--       </div>-->
     <!--     </div>-->
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--front">-->
     <!--           <img src="https://test-tirupati.tirupati-international.in/admin/Team/167652368863edb8a820f35juhi.jpeg" alt="Team Member Image" class="img-fluid">-->
     <!--         </div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
              
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Juhi Sharma</h3>-->
     <!--                   <p>Accounts Manager</p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="https://www.linkedin.com/in/juhi-sharma-a0368825a" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="https://instagram.com/sharmajuhi0816?igshid=OTJlNzQ0NWM=" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
					
					
     <!--           </div> -->
                
     <!--       </div>-->
     <!--     </div>-->
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--front">-->
     <!--             <img src="{{url('public/assets/images/team/kuldeep.jpeg')}}" alt="Team Member Image" class="img-fluid">-->
     <!--         </div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
              
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Kuldeep Rajput</h3>-->
     <!--                   <p>Sr. Software Developer</p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="{{$item->facebook_profile ?? ''}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="{{$item->twitter_profile ?? ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="{{$item->linkedin_profile ?? ''}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="{{$item->instagram_profile ?? ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
     <!--           </div> -->
                
     <!--       </div>-->
     <!--     </div>-->
          
     <!--     <div class="carousel__slider__item">-->
     <!--       <div class="item__3d-frame">-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--front">-->
                  
     <!--           <img src="{{url('public/assets/images/team/devendra-soni.jpg')}}" alt="Team Member Image" class="img-fluid">-->
     <!--         </div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--left"></div>-->
     <!--         <div class="item__3d-frame__box item__3d-frame__box--right"></div>-->
                
     <!--           <div class="teamdata">-->
     <!--               <div class="tmbx">-->
     <!--                   <h3>Devendra Soni</h3>-->
     <!--                   <p>Designation</p>-->
     <!--               </div>-->
     <!--               <ul class="list-unstyled team-card__social">-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>-->
					<!--	<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>-->
					<!--	<li><a href="tel:8559948264" target="_blank"><i class="fa fa-phone"></i></a></li>-->
					<!--	<li><a href="mailto:devendra.soni18@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>-->
					<!--</ul>-->
     <!--           </div> -->
                
     <!--       </div>-->
     <!--     </div>-->
          
        </div>
      </div>
    </div>

</section>
<!-- Our Team -->


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
							    <img src="{{url('public/assets/images/email-ani.gif')}}" alt="Email Image">
							</button>
						</form>
						
						<div class="mc-form__response"></div>
						
						<p class="newssubs">Plz subscribe to our newsletter to be updated with the latest news <br/>related to Tirupati International.</p>
						
					</div>
    			</div>
            </div>
    </section>
    
<div id="bcklnksts" style="display:none"><a href="http://planetavvs.ru" target="_blank" title="StreamEast">StreamEast</a><a href="https://alanyasmmm.com" target="_blank" title="alanya escort">alanya escort</a><a href="https://konyalilarserametal.com" target="_blank" title="konya escort">konya escort</a><a href="https://unidentifiedenemy.com" target="_blank" title="galabet">galabet</a><a href="https://casibomyeni.store" target="_blank" title="alanya escort">alanya escort</a><a href="https://casibom-girisyeni.com" target="_blank" title="alanya escort">alanya escort</a><a href="https://karite.shop" target="_blank" title="alanya escort">alanya escort</a><a href="https://tr.galabett-hizli-gir.com" target="_blank" title="galabet">galabet</a></div>
    
<!-- /Tirupati Newsletter -->


		
		<div>
   			<div id="stkyBtn" class="pf stkyBtn w lr0 zi15 transAdd" style="z-index: 1100;display:none">
                <div class="circlMenu pa bg2 zi2 lr0 m0a" style="bottom: 15px;z-index: -9;"></div>
                <div class="shadowMenu pa w bg2 zi1 lr0"></div>
        	    <div class="sticNavBtm pr zi3 w bg2 aftRound">
                    <ul class="df jcsb fw3" style="margin: 0;padding: 0;list-style: none;">
                        <li>
                            <a href="{{url('welcome')}}" class="actIcn">
                                <i class="fa fa-home svgIcn calus" aria-hidden="true"></i>
                            <span style="width:100%;">Home</span>
                            </a>
                        </li>
                        <li>                       
                            <a href="{{url('abouts')}}" class="actIcn">
                                <i class="fa fa-user-circle svgIcn calus" aria-hidden="true"></i>
                            <span style="width:100%;">About</span>
                            </a>
                        </li>           
                        <li>
                            <a href="{{url('contact')}}" class="actIcn">
                                <i class="fa fa-envelope-open svgIcn calus" aria-hidden="true"></i>
                            <span style="width:100%;">Contact Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+91 {{$social->phone_second ?? ''}}" class="actIcn">
                                <i class="fa fa-phone svgIcn calus" aria-hidden="true"></i>
                            <span style="width:100%;">Call Us</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

		</div>
		<style >
.bg2,
.mBtnLg,
.mContCode,
.mNav > li,
.mPopUp,
.mPrdDtel form,
.thanku1,
.up_round::after,
section.homVid {
    background-color: #fff;
}
.arrow5,
.cros_btn,
.enqload,
.enqload_enr,
.glMap,
.hvs_img::after,
.load,
.mContCode,
.mPlusIcon,
.mPopUp,
.mbtnNp,
.ocall .mBlk,
.ocall .mBlkScreen,
.ocall .mPlay1,
.pa,
.thmbnl_pp,
.top_hd {
    position: absolute;
}

.ef4f{
    margin-top: 30px;
}
.stkyBtn {
    max-width: 1024px;
    bottom: 0;
    z-index: 7;
}
.transAdd.stkyBtn {
    z-index: 66;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    z-index: 66;
}
.trans1 {
    bottom: -75px;
}
.sticNavBtm ul {
    display: flex;
    justify-content: space-between;
    background: #fff;
}
.sticNavBtm ul li a,
.sticNavBtm ul li > i {
    font-size: 13px;
    color: #777;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    text-align: center;
    padding: 15px;
}

.sticNavBtm ul li > i {
    width: 100%;
    height: 20px;
    margin: 7px auto 9px;
    color: white;
}
i.svgIcn {
    color: #233a95;
    padding-top: 1px;
}
.main_nav_nam:after,
.sticNavBtm:after,
.sticNavBtm:before {
    position: absolute;
    content: "";
    left: 0;
    right: 0;
    margin: 0 auto;
}
.sticNavBtm:after,
.sticNavBtm:before {
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
}
.sticNavBtm:before {
    border-bottom: 7px solid #166fa7;
    top: -4px;
}
.sticNavBtm:after {
    border-bottom: 7px solid #fff;
    top: -3px;
}
.circlMenu {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    bottom: 3px;
}
.circlMenu,
.shadowMenu {
    box-shadow: 0 -2px 2px rgba(0, 0, 0, 0.2);
}

.top_hd,
.zi1 {
    z-index: 1;
}
.arrow5,
.zi2 {
    z-index: 2;
}
.mNavSec,
.pf,
.popvid {
    position: fixed;
}

.mContCode {
    left: 0.5%;
    top: 1px;
    width: 86px;
    height: 38px;
    margin-left: 1px;
}
.mContCode .intl-tel-input > input {
    color: #000;
    height: 38px;
    display: block;
    border: none;
    box-sizing: border-box;
    width: 100%;
    font-size: 14px;
    padding-left: 38px;
}
.mContCode .flag-dropdown {
    position: absolute;
    top: 0;
    height: 38px;
    padding: 11px 0;
    box-sizing: border-box;
}
.intl-tel-input .arrow {
    position: absolute;
    top: 17px;
    left: 22px;
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid #555;
}
.intl-tel-input select.cntry4_p {
    position: absolute;
    top: 0;left: 0;width: 42px;
    display: block;
    font-size: 14px;
    height: 38px;
    z-index: 4;
    border: none;
    opacity: 0;
}
.oth-coun .mContCode {
    position: absolute;
    left: 0.5%;
    top: 1px;
    width: 38px;
    height: 38px;
    background-color: #fff;
    box-sizing: border-box;
    margin-left: 1px;
}
.oth-coun .mEnqInner .mMblInpt .w9 > input {
    padding-left: 53px;
}
.mBlk,
.mBlkScreen {
    position: fixed;
    width: 100%;
    top: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.75);
    z-index: 9;
}
.mBlk {
    background-color: rgba(55, 55, 55, 0.95);
}
.mEnqInner #S_fullname,
.mPopUp .mEnqInner #femail > input {
    display: block;
    margin: 15px auto;
    padding: 5px 20px 5px 38px;
    box-sizing: border-box;
    height: 40px;
    font-size: 14px;
}
.mEnqInner .mNamicn {
    background-position: 10px -21px;
    background-size: 20px 49px;
    background-repeat: no-repeat;
}
.mEnqInner .mEmlicn,
.shd1 input.iconInpEm,
.shd1 input.iconInpMob {
    background-position: 8px 13px;
    background-size: 20px 52px;
    background-repeat: no-repeat;
}
.enqload,
.enqload_enr,
.mThk {
    color: #d0451e;
}
.enqload {
    right: 5px;
    top: 12px;
}
.error_notification {
    font-size: 12px;
    color: red;
    margin: 7px 0 -5px 3%;
    text-align: left;
}
.bx1 {
    border: 1px solid #ddd;
    box-shadow: 0 0 1px #ccc;
    padding: 1px;
}
form.mSrch .ui-suggest-cont {
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-top: 31px;
    padding: 10px 1%;
    position: absolute;
    width: 100%;
    z-index: 3;
}
footer .bxOne,
footer .bxOne > p {
    background-color: #555354;
}
footer .bxOne {
    padding: 16px 0 16px;
}
.mFtrNav li {
    display: inline-block;
    border-right: 1px solid #d3d1d2;
    margin-bottom: 17px;
}
.mFtrNav li:last-of-type {
    border-right: none;
}
.mFtrNav li a {
    display: block;
    color: #ebe9ea;
    padding: 2px 9px;
}
.mFtrNav li:first-of-type a {
    padding-left: 0;
}
.mFtrNav li:last-of-type a {
    padding-right: 0;
}
footer .dSite {
    padding: 33px 2% 30px;
    font-size: 14px;
}
footer .dSite span {
    padding: 0 16px 0 5px;
}
.imLogo {
    padding: 0;
    margin-top: -20px;
}
footer .bkToTp.aft:after {
    border-bottom: 5px solid #6d6d6d;
    border-right: 5px solid #eee;
    border-left: 5px solid #eee;
    right: 2%;
    top: 5px;
}

.ask1,
.m0a,
.mPopUp,
.mPopUp .w9,
.mrgLrAuto,
.prdMg img,
.stkyBtn {
    margin: 0 auto;
}
.lr0,
.mPopUp,
.thmbnl_pp {
    left: 0;
    right: 0;
}

.footer-area .footer-tittle ul li a {
    font-weight: 400;
}

.contact-info__icon i,
.contact-info__icon span {
    color: black;
    font-size: 27px;
}
#stkyBtn {
    display: none !important;
}
@media  only screen and (min-width: 280px) and (max-width: 575px) {
    #stkyBtn {
        display: inline !important;
    }
    .rrfr{
        margin-top:2px;
        }
}

#movetopwhatsapp {
    position: fixed;
    bottom: 94px;
    left: 93%;
    z-index: 9;
    font-size: 16px;
    border: none;
    outline: none;
    cursor: pointer;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    padding: 0;
}

#movetopwhatsapp:hover {
    opacity: 0.8;
}

.ul_list a {
    color: #fff !important;
}
</style>
	</body>
@endsection