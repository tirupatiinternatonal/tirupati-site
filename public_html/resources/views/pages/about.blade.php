@extends('layout.app')
@section('content')
@php
$bannerbg = Helper::bannerimg();

$testimo = DB::table('testimonila')
            ->join('citys', 'testimonila.city', '=', 'citys.id')
            ->join('states', 'testimonila.state', '=', 'states.id')
            ->join('countries', 'testimonila.country', '=', 'countries.id')
            ->select('testimonila.*', 'citys.name as citynam', 'states.name as statenam', 'countries.name as cntrynam')
            ->get();

@endphp


<style>
 .about-five__image{   float: right;
       position: absolute;
       
       z-index: 1000;
       padding: 5px;
       color: #FFFFFF;
       font-weight: bold;
       width: 450px;
  background-image: -webkit-gradient(linear, left top, right top, from(var(--insuco-primary, #00206e)), to(var(--insuco-base, #00accc)));
  background-image: linear-gradient(90deg, var(--insuco-primary, #00206e) 0%, var(--insuco-base, #00accc) 100%);
  padding: 40px;
  margin-top: 420px
  
  
 }
.about-one{
    float:right;
margin-top: 86px;
    right:845px;
    position: absolute;
    background-color: white;
     z-index: 1000;
       padding: 5px;
}
.review{
   height:50%;
   
}
.containers {
    margin: 26px 27px 0px 27px;
    box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
</style>

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



    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


<!-- About -->
   <section class="team-section">
    <h2 >Digital Health Initiatives</h2>

    <div class="team-container">

        <div class="team-card">
            <img src="/assets/images/abdm-1.jfif" alt="Member">
        </div>

        <div class="team-card">
            <img src="/assets/images/abdm-2.jfif" alt="Member">
        </div>

        <div class="team-card">
            <img src="/assets/images/abdm-3.jfif" alt="Member">
        </div>

        <div class="team-card">
            <img src="/assets/images/abdm-4.jfif" alt="Member">
        </div>

        <div class="team-card">
            <img src="/assets/images/abdm-5.jfif" alt="Member">
        </div>
    </div>
</section>
   
   
<section class="about-five about-five--home-1 section-about">
		<div class="containers">
			<div class="row gutter-y-60">
				<div class="col-md-12 col-lg-12">
					<div class="about-five__content">
						<div class="sec-title text-center">
							<p class="sec-title__tagline wow fadeInRight" data-wow-duration="4s">About company</p>
							<h3 class="sec-title__title">Best Healthcare Solution
								provider since 2014</h3>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row gutter-y-60">
			    
			    <div class="col-md-12 col-lg-4 offset-lg-1">
				    <div class="tirupati-owner">
					    <img src="{{url('public/assets/images/yogeshsir_newphoto.jpeg')}}" style="width: 100%;" class="wow fadeInLeft" data-wow-duration="4s" alt="">
					    
					    <div class="ceo wow fadeInUp" data-wow-duration="4s">
						    <h4>Yogesh Kumar Lohar</h4>
						    <p>Administrator</p>
						</div>
						
					</div>
				</div>
				
				<div class="col-md-12 col-lg-6 d-flex">
					<div class="about-five__content">	
						<div class="about-five__content__text">
						    <p>
						        Welcome to Tirupati Software Infotech Pvt. Limited, a leading innovator in hospital management software since 2014. With over a decade of experience and a robust portfolio of more than 60 integrated modules, we specialize in delivering comprehensive solutions tailored to meet the diverse needs of healthcare facilities. Our software suite covers essential areas such as Outpatient Department (OPD), Inpatient Department (IPD), Pharmacy, Radiology, Laboratory, E-Prescription, Medical Sales, Nursing Desk, and Operation Theatre (OT) management. We also offer specialized modules for fields including Gynecology, Dentistry, Dermatology, and Panchakarma.
						    </p>
						    <p>
						        With a proven track record of over 1,000 satisfied domestic clients across India and more than 150 international clients, our solutions are designed to enhance efficiency, improve patient care, and streamline hospital operations. Our latest innovations include modules for Human Resources (HR) and WhatsApp Integration, reflecting our commitment to leveraging technology for better healthcare management. At Tirupati Software Infotech Pvt. Limited, we are dedicated to advancing the future of hospital management through our cutting-edge technology and exceptional customer support.
				            </p>
				            
				         <!--   <a href="{{url('about')}}" class="cd-hero__btn cd-btn-prim mt-5 wow fadeInRight">-->
        					<!--    Explore More-->
        					<!--    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>-->
        					<!--</a>-->
						</div>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</section>



<!-- /About -->


<!-- vision -->

    <section class="about-four section-vmf">
			<div class="containers">
				<div class="row">
				    
					<div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
					    
						<div class="about-four__card">

							<img class="img-fluid" src="{{url('public/assets/images/vision.gif')}}" alt="">
							
							<h3 class="about-four__card__title"><a href="#">Company vision</a></h3>
							
							<div class="about-four__card__text">
							    We have vision to achieve 2025 clients by 2025 worldwide actively and we have working very hardly in the same direction
							</div>
							
						</div>
					</div>
					
					<div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
					    
						<div class="about-four__card">

							<img class="img-fluid" src="{{url('public/assets/images/mission.gif')}}" alt="">
							
							<h3 class="about-four__card__title"><a href="#">Company mission</a></h3>
							
							<div class="about-four__card__text">
							    We have mission to upgrade all healthcare unit in india from small to large and rural to urban sector. Hospital, lab, radiology etc. with digitilization by 2025 with reasonable price an dbest system.
							</div>
							
						</div>
						
					</div>
					
					<div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
					    
						<div class="about-four__card">
					
							<img class="img-fluid" src="{{url('public/assets/images/feature.gif')}}" alt="">
							
							<h3 class="about-four__card__title"><a href="#">Best Features</a></h3>
							
							<div class="about-four__card__text">
							    Multiuser and Multisystem, Role based access, Online cum offline, Preminum support 24x7x265, LIS, RIS, EHR, EMR, HR Intergated, Mobile application, Payment gateway, What'sapp, SMS, Email and Autobackup
							</div>
							
						</div>
						
					</div>
					
				</div>
			</div>
		</section>
		
<!-- /vision -->


<!-- Statistics -->

    <section class="section-statistics-title">
		<div class="containers">
		    
		    <div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInRight">company statistics</p>
				<h3 class="sec-title__title">We are happy to share our achievements</h3>
			</div>
			
		</div>
	</section>	
			
    <section class="section-statistics abtpg-sta">
		<div class="containers abtpg-sta-bg">
		    
			<div class="row gutter-y-30"style="--bs-gutter-x: 30px;">
			    
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0 astcol astcol1">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-money-bag wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">1000</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Products<br/>Sales</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0 astcol">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-community wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">750</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Happy Clients<br/>Worldwide</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0 astcol">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-target wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">95</span>%</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Success<br/>Rate</p>
						
					</div>
				</div>
				
				<div class="col-6 col-md-6 col-lg-6 col-xl-3 p-0 astcol astcol4">
					<div class="funfact-one__card">
					    
						<i class="funfact-one__card__icon flaticon-success wow fadeIn" data-wow-duration="4s"></i>
						
						<h3 class="funfact-one__card__title count-box"><span class="count">12</span>+</h3>
								
						<p class="funfact-one__card__text wow bounceInUp">Awards<br/>Winning
						
					</div>
				</div>
				
			</div><!-- /.row -->
			
	    </div>
	</section>

<!-- /Statistics -->


<!-- Pay Now -->
		
    <section class="funfact-one section-paynow about-paynow">
			<div class="containers">
			    
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="funfact-one__info">
						    
						    <div class="dl1">
						        <img class="img-fluid" src="{{url('public/assets/images/dl.png')}}" alt="">
						    </div>
							<h4 class="wow zoomInUp">
							    Find Quality And Best Price
							</h4>    
							<h4 class="upcs wow zoomInUp" data-wow-duration="2s">
							    Hospital Software Solution
							</h4>
							<div class="dl2">
							    <img class="img-fluid" src="{{url('public/assets/images/dl.png')}}" alt="">
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


<!--Testimonials-->
<section class="section-testimonials">
		    
	<div class="containers">

        <div class="row">
				    
			<div class="col-md-4">
			    
				<div class="sec-title ver-alin">
    				<p class="sec-title__tagline wow fadeInLeft" data-wow-duration="4s">Our Testimonials</p>
    				<h3 class="sec-title__title">What our Clients Say<br/>About Us</h3>
    			</div>	    

            </div>
            
            <div class="col-md-8">
			    <div class="owl-carousel owl-theme">
			        
			        @foreach ($testimo as $key=>$item)
			        <div class="item">
                        <div class="item-inner">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ env('IMAGE_SHOW_PATH').'image/testimonila/'.$item->photo ?? '' }}" alt="">
                            </div>
                            <div class="testi">
                                <img class="img-fluid qot quote-left" src="{{url('public/assets/images/quote-left.png')}}" alt="">
                                <p>{{ $item->remark ?? '' }}</p>
                                @php
                                $starcount = $item->ratting;
                                $nostar = 5 - $starcount;
                                @endphp
                                <div class="starbox">
                                    @for ($i = 1; $i <= $starcount; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($j = 1; $j <= $nostar; $j++)
                                        <i class='far fa-star'></i>
                                    @endfor
                                </div>
                                <img class="img-fluid qot quote-right" src="{{url('public/assets/images/quote-right.png')}}" alt="">
                                <h5>{{ $item->dr_name ?? '' }}</h5>
                                <h6>{{ $item->hospital_name ?? '' }}</h6>
                                <p>( {{ $item->citynam ?? '' }} , {{ $item->statenam ?? '' }} , {{ $item->cntrynam ?? '' }} )</p>
                            </div>
                        </div>
                    </div>
			        @endforeach
			        
                </div>	    
            </div>
            
        </div>

    </div>

</section>
<!--Testimonials-->


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




<!-- /.page-wrapper -->

	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div><!-- /.mobile-nav__overlay -->
		<div class="mobile-nav__content">
			<a href="#" class="mobile-nav__close mobile-nav__toggler">
				<span></span>
				<span></span>
			</a>

			<div class="logo-box">
				<a href="index-2.html" aria-label="logo image"><img src="assets/images/logo-light.png" alt="Insuco"></a>
			</div>
			<!-- /.logo-box -->
			<div class="mobile-nav__container"></div>
			<!-- /.mobile-nav__container -->

			<ul class="list-unstyled footer-one__widget__contact">
				<li>
					<i class="far fa-envelope-open"></i>
					<a href="mailto:support@gmail.com">support@gmail.com</a>
				</li>
				<li>
					<i class="far fa-phone-plus"></i>
					<a href="tel:+000(123)45688">+000 (123) 456 88</a>
				</li>
			</ul><!-- /.list-unstyled -->

			<ul class="list-unstyled footer-one__widget__social">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
			</ul><!-- /.list-unstyled footer-one__widget__social -->


		</div><!-- /.mobile-nav__content -->
	</div><!-- /.mobile-nav__wrapper -->

	<div class="side-drawer__wrapper ">
		<div class="side-drawer__overlay side-drawer__toggler"></div><!-- /.side-drawer__overlay -->
		<div class="side-drawer__content">
			<a href="#" class="side-drawer__close side-drawer__toggler">
				<span></span>
				<span></span>
			</a>

			<div class="logo-box">
				<a href="index-2.html" aria-label="logo image"><img src="assets/images/logo-light.png" alt="Insuco"></a>
			</div>
			<!-- /.logo-box -->
			<div class="footer-one__widget">
				<h3 class="footer-one__widget__title">About</h3><!-- /.footer-one__widget__title -->
				<p class="footer-one__widget__text">We denounce righteous indignations dislike men
					beguiled and demoralized charms of pleasure moment</p>
				<!-- /.footer-one__widget__text -->

				<ul class="list-unstyled footer-one__widget__social">
					<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				</ul><!-- /.list-unstyled footer-one__widget__social -->
			</div><!-- /.footer-one__widget -->
			<div class="footer-one__widget">
				<h3 class="footer-one__widget__title">Gallery</h3>
				<!-- /.footer-one__widget__title -->
				<ul class="list-unstyled footer-one__widget__gallery">
					<li>
						<a href="assets/images/resources/footer-g-1.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-1.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
					<li>
						<a href="assets/images/resources/footer-g-2.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-2.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
					<li>
						<a href="assets/images/resources/footer-g-3.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-3.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
					<li>
						<a href="assets/images/resources/footer-g-4.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-4.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
					<li>
						<a href="assets/images/resources/footer-g-5.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-5.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
					<li>
						<a href="assets/images/resources/footer-g-6.jpg" class="img-popup">
							<img src="assets/images/resources/footer-g-6.jpg" alt="">
							<span class="footer-one__widget__gallery__hover">
								<i class="fab fa-instagram"></i>
							</span><!-- /.footer-one__widget__gallery__hover -->
						</a>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.footer-one__widget -->

			<div class="footer-one__widget">
				<h3 class="footer-one__widget__title">Contact</h3>

				<ul class="list-unstyled footer-one__widget__contact">
					<li>
						<i class="far fa-envelope-open"></i>
						<a href="mailto:support@gmail.com">support@gmail.com</a>
					</li>
					<li>
						<i class="far fa-phone-plus"></i>
						<a href="tel:+000(123)45688">+000 (123) 456 88</a>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.footer-one__widget -->





		</div><!-- /.side-drawer__content -->
	</div><!-- /.side-drawer__wrapper -->
		</div>

	@endsection