@php

$social = DB::table('settings')->first();

$tproducts = DB::table('product')->get();
 $document = DB::table('document')->where('status', 1)->get();
@endphp

      @php
  $seoTitle = $seoTitle ?? 'Best Hospital Management Software | Tirupati HMS';
  $seoDescription = $seoDescription ?? 'Comprehensive Hospital Management Software (HMS) for hospitals, labs, pharmacies, and blood banks.';
  $canonicalUrl = preg_replace('#^https?://(?:www\.)?#', 'https://www.', url()->current());
@endphp

<head>


<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<link rel="canonical" href="{{ $canonicalUrl }}">

<meta property="og:type" content="website">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:site_name" content="Tirupati Software Infotech Pvt. Ltd.">
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Organization",
  "name":"Tirupati Software Infotech Pvt. Ltd.",
  "url":"https://www.tirupati-international.in/",
  "logo":"https://www.tirupati-international.in/favicon.ico",
  "contactPoint":[
    {
      "@type":"ContactPoint",
      "telephone":"+91-9588840007",
      "contactType":"customer support",
      "areaServed":"IN",
      "availableLanguage":["en","hi"]
    }
  ]
}
</script>
</head>

<div class="preloader" style="display:none;">
		<div class="preloader__inner">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div><!-- /.preloader__inner -->
	</div>
	
	
	
    <section class="tirupati-header">
        <div class="top-head">
            <div class="container-fluid">
            <div class="thbar d-flex" style="">
                <ul>
                    <li class="wow bounceInDown" style="display: inline-block;list-style: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="64" stroke-dashoffset="64" d="M8 3C8.5 3 10.5 7.5 10.5 8C10.5 9 9 10 8.5 11C8 12 9 13 10 14C10.3943 14.3943 12 16 13 15.5C14 15 15 13.5 16 13.5C16.5 13.5 21 15.5 21 16C21 18 19.5 19.5 18 20C16.5 20.5 15.5 20.5 13.5 20C11.5 19.5 10 19 7.5 16.5C5 14 4.5 12.5 4 10.5C3.5 8.5 3.5 7.5 4 6C4.5 4.5 6 3 8 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/><animateTransform attributeName="transform" begin="0.6s;lineMdPhoneCallLoop0.begin+2.6s" dur="0.5s" type="rotate" values="0 12 12;15 12 12;0 12 12;-12 12 12;0 12 12;12 12 12;0 12 12;-15 12 12;0 12 12"/></path><path stroke-dasharray="4" stroke-dashoffset="4" d="M14 7.04404C14.6608 7.34734 15.2571 7.76718 15.7624 8.27723M16.956 10C16.6606 9.35636 16.2546 8.77401 15.7624 8.27723" opacity="0"><set id="lineMdPhoneCallLoop0" attributeName="opacity" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" dur="0.2s" values="4;8"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.3s;lineMdPhoneCallLoop0.begin+3.3s" dur="0.3s" values="0;4"/><set attributeName="opacity" begin="1.6s;lineMdPhoneCallLoop0.begin+3.6s" to="0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M20.748 9C20.3874 7.59926 19.6571 6.347 18.6672 5.3535M15 3.25203C16.4105 3.61507 17.6704 4.3531 18.6672 5.3535" opacity="0"><set attributeName="opacity" begin="1s;lineMdPhoneCallLoop0.begin+3s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdPhoneCallLoop0.begin+3s" dur="0.2s" values="10;20"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s;lineMdPhoneCallLoop0.begin+3.5s" dur="0.3s" values="0;10"/><set attributeName="opacity" begin="1.8s;lineMdPhoneCallLoop0.begin+3.8s" to="0"/></path></g></svg>
                        <a style="color:white" href="tel:+91 {{$social->phone_second ?? ''}}"> +91{{$social->phone_second ?? ''}}</a>
                    </li>
                    <li style="display: inline-block;list-style: none;">
                        <span>&nbsp;|</span>
                    </li>
                    @if(!empty($social))
                    <li class="wow bounceInDown" style="display: inline-block;list-style: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="64" stroke-dashoffset="64" d="M8 3C8.5 3 10.5 7.5 10.5 8C10.5 9 9 10 8.5 11C8 12 9 13 10 14C10.3943 14.3943 12 16 13 15.5C14 15 15 13.5 16 13.5C16.5 13.5 21 15.5 21 16C21 18 19.5 19.5 18 20C16.5 20.5 15.5 20.5 13.5 20C11.5 19.5 10 19 7.5 16.5C5 14 4.5 12.5 4 10.5C3.5 8.5 3.5 7.5 4 6C4.5 4.5 6 3 8 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/><animateTransform attributeName="transform" begin="0.6s;lineMdPhoneCallLoop0.begin+2.6s" dur="0.5s" type="rotate" values="0 12 12;15 12 12;0 12 12;-12 12 12;0 12 12;12 12 12;0 12 12;-15 12 12;0 12 12"/></path><path stroke-dasharray="4" stroke-dashoffset="4" d="M14 7.04404C14.6608 7.34734 15.2571 7.76718 15.7624 8.27723M16.956 10C16.6606 9.35636 16.2546 8.77401 15.7624 8.27723" opacity="0"><set id="lineMdPhoneCallLoop0" attributeName="opacity" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" dur="0.2s" values="4;8"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.3s;lineMdPhoneCallLoop0.begin+3.3s" dur="0.3s" values="0;4"/><set attributeName="opacity" begin="1.6s;lineMdPhoneCallLoop0.begin+3.6s" to="0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M20.748 9C20.3874 7.59926 19.6571 6.347 18.6672 5.3535M15 3.25203C16.4105 3.61507 17.6704 4.3531 18.6672 5.3535" opacity="0"><set attributeName="opacity" begin="1s;lineMdPhoneCallLoop0.begin+3s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdPhoneCallLoop0.begin+3s" dur="0.2s" values="10;20"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s;lineMdPhoneCallLoop0.begin+3.5s" dur="0.3s" values="0;10"/><set attributeName="opacity" begin="1.8s;lineMdPhoneCallLoop0.begin+3.8s" to="0"/></path></g></svg>
                        <a style="color:white" href="tel:+91 {{$social->phone ?? ''}}"> +91{{$social->phone ?? ''}}</a>
                    </li>
                    <li style="display: inline-block;list-style: none;">
                        <span>&nbsp;|</span>
                    </li>
                    @endif
                    @if(!empty($social))
                    <li class="wow bounceInDown" style="display: inline-block;list-style: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" fill-opacity="0" d="M12 11L4 6H20L12 11Z"><animate fill="freeze" attributeName="fill-opacity" begin="1s" dur="0.15s" values="0;0.3"/></path><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"><rect width="18" height="14" x="3" y="5" stroke-dasharray="64" stroke-dashoffset="64" rx="1"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></rect><path stroke-dasharray="24" stroke-dashoffset="24" d="M3 6.5L12 12L21 6.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.4s" values="24;0"/></path></g></svg>
                        <a style="color:white" href="mailto:{{$social->email ?? ''}}">{{$social->email ?? ''}}</a>
                    </li> 
                    @endif
                    
                    
                    <li class="wow bounceInDown" style="display: inline-block;list-style: none;">
    					<a class="image-popup-no-margins" href="{{url('public/assets/images/qrcode.png')}}">
                            <div class="cd-hero__btn cd-btn-prim paybtn">
                            	<img class="img-fluid" src="{{url('public/assets/images/paynow.gif')}}">
                                <!--<span>-->
								<!--Tap to Pay-->
								<!--</span>-->
							</div>
                        </a>
                    </li> 
                    <li class="wow bounceInDown" style="display: inline-block;list-style: none;">
                    <a class="" href="https://www.tirupati-international.in/admin/" target="_blank">
                        <div class="cd-hero__btn cd-btn-prim paybtn">
                            <img class="img-fluid" src="{{url('public/assets/images/admin-panel.png')}}">
                         </div>
                    </a>
                </li>
                    <!--<li class="wow bounceInDown" style="display: inline-block;list-style: none;">
    					<a href="https://www.tirupati-international.in/admin/" target="_blank">
                            <div class="cd-hero__btn cd-btn-prim paybtn">
                            
                                <span>
								Login
								</span>
							</div>
                        </a>
                    </li> -->
                   
                </ul>
            </div>
        </div>
        </div>
    </section>

        <nav class="navbar navbar-expand-lg sticky-top bg-light tirupati-nav" style="z-index:9999; position:relative;">    
           <div class="container-fluid relative">
            <a href="{{url('/')}}" class="main-header__logo" >
                @if(!empty($social))
                <img src="{{url('public/assets/images/logoti.png')}}" alt="">
                <div class="cnam">Tirupati Software Infotech Pvt. Ltd.</div>
                @endif
            </a>
            <button class="navbar-toggler tirupati-navmob" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Company
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ url('abouts')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('abouts')}}"><i class="fa fa-info-circle"></i>About Us</a></li>
                            <li class="{{ url('overview')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('overview')}}"><i class="fa fa-eye"></i>Overview</a></li>
                            <li class="{{ url('team')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('team')}}"><i class="fa fa-users"></i>Our Team </a></li>
                            <li class="{{ url('career')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('career')}}"><i class="fa fa-graduation-cap"></i>Career</a></li>
                            <li class="{{ url('gallery')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('gallery')}}"><i class="fa fa-images"></i>Gallery</a></li>
                            <li class="{{ url('certificate')  == URL::current() ? 'active' : "" }}" style="display:none;"><a class="dropdown-item" href="{{url('certificate')}}"><i class="fa fa-award"style="padding:10px;color:#00accc;display:none;" ></i>Certificate</a></li>
                            <li class="{{ url('culture')  == URL::current() ? 'active' : "" }}" style="display:none;"><a class="dropdown-item" href="{{url('culture')}}"><i class="fa fa-house"></i>Culture</a></li>
                            <li class="{{ url('events_expo') == URL::current() ? 'active' : '' }}"><a class="dropdown-item" href="{{ url('events_expo') }}"><i class="fa fa-calendar-alt"></i> Event / Expo</a></li>
                            <!--<li class="{{ url('culture')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('public/assets/images/OFFICE_CRICULAR.pdf')}}" target="_blank"><i class="fa fa-bookmark"></i>Office Circulars</a></li>-->
                            @if(!empty($document))
                                @foreach ($document as $item)
                                    <li class="{{ url('culture')  == URL::current() ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ env('IMAGE_SHOW_PATH').'/image/document/'.$item->photo }}" target="_blank">
                                            <i class="fa fa-bookmark"></i>
                                            {{ $item->label_name ?? '' }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            @if (!empty($tproducts))
                                @php $i=1; @endphp
                                @foreach ($tproducts as $key=>$item)
                                
                                <li class="{{ request()->fullUrl() == url('product?id=' . $item->id) ? 'active' : '' }}">
                                    <a class="dropdown-item" href="{{ url('product') }}?id={{ $item->page_url }}">
                                        <i class="fa fa-stethoscope"></i>
                                        {{ $item->heading }}
                                    </a>
                                </li>
                                
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Online Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('public/assets/images/Tirupati_HIMS_PPT.pdf')}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download"></i>Download Brochure</a></li>
                            <li><a class="dropdown-item" href="https://www.indiamart.com/tirupati-software-infotech/?pos=1&kwd=tirupati%20software%20full%20hms&tags=||||8042.3813|Price|product|TS"target="_blank" rel="noopener noreferrer"><i class="fa fa-eye"></i>View Products</a></li>
                            <li><a class="dropdown-item" href="{{url('public/assets/images/Price & Tarrif.pdf')}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download"></i>Download Price & Tarrif</a></li>
                            <li><a class="dropdown-item" href="{{url('public/assets/images/Tariff in $-USD.pdf')}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download"></i>Download Tarrif in $-USD</a></li>
                            <li><a class="dropdown-item" href="{{url('public/assets/images/MoU_PO_Agreement 2025.pdf')}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download"></i>Download MOU & Agreement</a></li>
                            <li><a class="dropdown-item" href="{{url('public/assets/images/Tirupati_Software_Brousher.pdf')}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download"></i>Download Tirupati Software Brocher</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ url('privacy_policy')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('privacy_policy')}}"><i class="fa fa-calendar-plus"></i>Privacy Policy</a></li>
                            <li class="{{ url('integration')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('integration')}}"><i class="fa fa-briefcase"></i>Integration</a></li>
                            <li class="{{ url('refund')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('refund')}}"><i class="fa fa-door-open"></i>Refund & Cancellation Policy</a></li>
                            <li class="{{ url('terms')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('terms')}}"><i class="fa fa-files-medical"></i>Terms & Conditions</a></li>
                            <li class="{{ url('shipping')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('shipping')}}"><i class="fa fa-door-open"></i>Shipping Policy</a></li>
                            <!--<li class=""><a class="dropdown-item" href="https://merchant.razorpay.com/policy/P8vZdHMgRERYzS/shipping" target="_blank" rel="noopener noreferrer"><i class="fa fa-truck"></i>Shipping Policy</a></li>-->
                            <li class="{{ url('faq')  == URL::current() || url('faq-details')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('faq')}}"><i class="fa fa-question"></i>FaQ</a></li>
                            <li class="{{ url('book-appointment')  == URL::current() || url('book-appointment')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('book-appointment')}}"><i class="fa fa-copy"></i>Book Appointment</a></li>
                            <li class="{{ url('diagnostic-report')  == URL::current() || url('diagnostic-report')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('diagnostic-report')}}"><i class="fa fa-stethoscope"></i>Diagnostic Report</a></li>
                            <li class="{{ url('patient-portal')  == URL::current() || url('patient-portal')  == URL::current() ? 'active' : "" }}"><a target="_blank" class="dropdown-item" href="https://project.tirupatihms.com/hms/patients/login"><i class="fa fa-sign-in"></i>Patient Portal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Clients
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="https://www.google.com/search?q=tirupati+software+infotech+private+limited&rlz=1C1ONGR_enIN1028IN1028&oq=tirupati+software+zinfotech+&aqs=chrome.0.35i39i355j46i39i175i199j69i57j0i390l2j69i60l3.23364j0j7&sourceid=chrome&ie=UTF-8#lrd=0x396db60dce33c21b:0x486b5abcfd844c5f,1,,,,&scso=_S2rTY663Bfyuz7sP3tS7gAc_55:16.799999237060547"target="_blank" rel="noopener noreferrer"><i class="fa fa-bell-plus"></i>Client Review</a></li>
                            <li class="{{ url('viewclient')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('viewclient')}}"><i class="fa fa-street-view"></i>View Our Client</a></li>
                            <li class="{{ url('viewquotation')  == URL::current() ? 'active' : "" }}"><a class="dropdown-item" href="{{url('viewquotation')}}"><i class="fa fa-badge-dollar"></i>View Quotation</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            News & Updates
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{url('news_and_updates')}}">
                                    <i class="fa fa-newspaper"></i> Latest News
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('software_updates')}}">
                                    <i class="fa fa-code"></i> Software Updates
                                </a>
                            </li>
                        </ul>
                    </li>
                
                    <li class="nav-item {{ url('contact')  == URL::current() ? 'active' : "" }}">
                        <a class="nav-link" href="{{url('contact')}}">Contact</a>
                    </li>
                    
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle socials" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-fluid" src="{{url('public/assets/images/social-icon.gif')}}">
                        </a>
                        <ul class="dropdown-menu social-tray">
                            <li class="fb">
                                <a class="dropdown-item" href="{{$social->facebook_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/facebook.png')}}">
                                    Facebook
                                </a>
                            </li>
                            <li class="tw">
                                <a class="dropdown-item" href="{{$social->twitter_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/twitter.png')}}">
                                    Twitter
                                </a>
                            </li>
                            <li class="wa">
                                <a class="dropdown-item" href="{{$social->whatsapp_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/whatsapp.png')}}">
                                    Whatsapp
                                </a>
                            </li>
                            <li class="in">
                                <a class="dropdown-item" href="{{$social->linkedin_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/linkedin.png')}}">
                                    Linkedin
                                </a>
                            </li>
                            <li class="ins">
                                <a class="dropdown-item" href="{{$social->instagram_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/instagram.png')}}">
                                    Instagram
                                </a>
                            </li>
                            <li class="im">
                                <a class="dropdown-item" href="{{$social->indiamart_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/indiamart.png')}}">
                                    Indiamart
                                </a>
                            </li>
                            <li class="yt">
                                <a class="dropdown-item" href="{{$social->youtube_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/youtube.png')}}">
                                    Youtube
                                </a>
                            </li>
                            <li class="td">
                                <a class="dropdown-item" href="{{$social->threads_link ?? ''}}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/thread.png')}}">
                                    Threads
                                </a>
                            </li>
                            <li class="td">
                                <a class="dropdown-item" href="{{ route('googleReview') }}" target="_blank" rel="noopener noreferrer">
                                    <img class="img-fluid" src="{{url('public/assets/images/google.png')}}">
                                    Google Review
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="dropdown flagbox">
                            <button class="btn dropdown-toggle flagbtn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fi fi-in me-1"></span>
                            </button>
                            <ul class="dropdown-menu flag-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item flag-item active" href="#"><span class="fi fi-in me-1"></span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item flag-item" href="#"><span class="fi fi-ng me-1"></span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item flag-item" href="#"><span class="fi fi-ca me-1"></span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item flag-item" href="#"><span class="fi fi-ke me-1"></span></a>
                                </li>
                            </ul>
                        </div>
                        
                        
                        <!--<i class="fi fi-fr"></i>-->
                        <!--<span class="fi fi-af"></span>-->
                    </li>
                    
                </ul>
            </div>
            
        </div>
    </nav>
	
	
	