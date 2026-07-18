@php
$social =DB::table('settings')->first();


@endphp


<style>
.sticky-icon  {
	z-index:100;
	position:fixed;
	top:30%;
	right:0%;
	width:220px;
	display:flex;
	flex-direction:column;}  
.sticky-icon a  {
	transform:translate(160px,0px);
	border-radius:20px 0px 0px 50px;
	text-align:left;
	margin:2px;
	text-decoration:none;
	padding:5px;
	font-size:22px;
	font-family:cursive;
	transition:all 0.8s;}
.sticky-icon a:hover  {
	color:#FFF;
	transform:translate(0px,0px);}	
.sticky-icon a:hover i  {
	transform:rotate(360deg);}
/*.search_icon a:hover i  {
	transform:rotate(360deg);}*/
.Facebook  {
	background-color:#2C80D3;
	color:#FFF;}
	
.Phone  {
	background-color:#fa0910;
	color:#FFF;
}
	
.Twitter  {
	background-color:#53c5ff;
	color:#FFF;}
	
.Instagram  {
	background-color:#a62e90;
	color:#FFF;}
	
.Whatshapp {
	background-color:#0cc143;
	color:#FFF;}						
.sticky-icon a i {
	background-color:#FFF;
	height:40px;
	width:40px;
	color:#000;
	text-align:center;
	line-height:40px;
	border-radius:50%;
	margin-right:20px;
	transition:all 0.5s;}
.sticky-icon a i.fa-facebook-f  {
	background-color:#FFF;
	color:#2C80D3;}
	
.sticky-icon a i.fa-google-plus-g  {
	background-color:#FFF;
	color:#d34836;}
	
.sticky-icon a i.fa-instagram  {
	background-color:#FFF;
	color:#FD1D1D;}
	
.sticky-icon a i.fa-phone  {
	background-color:#FFF;
	color:#fa0910;
    transform: rotate(90deg);
    transition: all 0.5s;
}
	
.sticky-icon a i.fa-twitter  {
	background-color:#FFF;
	color:#53c5ff;}
.fas fa-shopping-cart  {
	background-color:#FFF;}	
#myBtn {
	height:50px;
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  text-align:center;
  padding:10px;
  text-align:center;
	line-height:40px;
  border: none;
  outline: none;
  background-color: #1e88e5;
  color: white;
  cursor: pointer;
  border-radius: 50%;
}
.fa-arrow-circle-up  {
	font-size:30px;}

#myBtn:hover {
  background-color: #555;
}
.ul_style {
  display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    list-style: none;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0;
    padding: 5px 0px 0px 72px;
    width: 100%;
}
.li_style {
  width: 22%;
    height: 40px;
    padding: 0px 24px 0px 0px;
}

</style>

		<footer class="footer-two footer-two--home-1" style="background-color#16243e;">
		  
		 <!--   <div class="footer-two__top">-->
			<!--	<div class="container">-->
			<!--		<div class="row gutter-y-30">-->
			<!--			<div class="col-md-12 col-lg-4">-->
			<!--			    <div class="footcontact wow fadeInRight">-->
			<!--				     <h4 class="footer-title">Registered Office</h4>-->
							     
   <!-- 						     @if(!empty($social))-->
   <!-- 						     <div class="foot-cntnt">-->
   <!-- 						         <i class="far fa-map-marker-alt"></i> -->
   <!-- 						         <a href="https://maps.app.goo.gl/gfHTbVqi4tiAYyC3A" target="_blank" >{{$social->address ?? ''}}</a>-->
   <!--     						 </div>-->
   <!-- 							 <div class="footmapbox">-->
   <!-- 							    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24664.143178879647!2d75.8346754!3d26.8228367!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db60dce33c21b%3A0x486b5abcfd844c5f!2sTirupati%20Software%20Infotech%20Pvt%20Ltd!5e1!3m2!1sen!2sin!4v1727264472522!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
   <!-- 							 </div>-->
   <!-- 							 @endif-->
			<!--			    </div>-->
							
							
							 
			<!--			</div>-->
			<!--			<div class="col-md-12 col-lg-4">-->
			<!--			    <div class="footcontact wow fadeInRight">-->
			<!--				     <h4 class="footer-title">Marketing Office</h4>-->
							     
   <!-- 						     @if(!empty($social))-->
   <!-- 						     <div class="foot-cntnt">-->
   <!--     							 <i class="far fa-map-marker-alt"></i> -->
   <!--     							 <a href="https://maps.app.goo.gl/3T2DeBxoSsJ2yvxM6" target="_blank" >{{$social->marketing_office ?? ''}}</a>-->
   <!-- 							 </div>-->
   <!-- 							 <div class="footmapbox">-->
   <!-- 							    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3083.251487198864!2d75.83263889999999!3d26.81425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDQ4JzUxLjMiTiA3NcKwNDknNTcuNSJF!5e1!3m2!1sen!2sin!4v1727265402445!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
   <!-- 							 </div>-->
   <!-- 							 @endif-->
			<!--				 </div>-->
			<!--			</div>-->
			<!--			<div class="col-md-12 col-lg-4">-->
			<!--			    <div class="footcontact wow fadeInRight">-->
			<!--				     <h4 class="footer-title">Development Office</h4>-->
							     
   <!-- 						     @if(!empty($social))-->
   <!-- 						     <div class="foot-cntnt">-->
   <!-- 							    <i class="far fa-map-marker-alt"></i> -->
   <!-- 							    <a href="https://maps.app.goo.gl/hYnjYf7V4CCx98x68" target="_blank">{{$social->department_office ?? ''}}</a>-->
   <!-- 							 </div>-->
   <!-- 							 <div class="footmapbox">-->
   <!-- 							    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.4178148775677!2d75.76909027544092!3d26.95485447662204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3ae26a89bed%3A0xdd878bf56c6b6d5d!2s11%2C%20Sikar%20Rd%2C%20Sector%202%2C%20Radha%20Govind%20Colony%2C%20Vidyadhar%20Nagar%2C%20Jaipur%2C%20Rajasthan%20302039!5e1!3m2!1sen!2sin!4v1727266568559!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
   <!-- 							 </div>-->
   <!-- 							 @endif-->
			<!--				 </div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
						    
						    
						    
		  
			<div class="footer-two__middle">
				<div class="container-fluid">
					<div class="row gutter-y-30">
					    
						<div class="col-md-12 col-lg-6">
							<div class="footer-two__widget footer-two__widget--about wow fadeInLeft">

								<div class="ftabtlgo">
    								<img src="{{url('public/assets/images/logoti.png')}}" alt="" class="foot-logo img-fluid">
    								<h4 class="cpnam">Tirupati Software Infotech Pvt. Ltd.</h4>
								</div>
								
								<p class="footer-two__widget__text">We manage the tasks, projects and processes that help organizations to communicate, manage positions or differentiate themselves in their markets by our experienced of IT & software services.</p><!-- /.footer-widget__text -->
									@if(!empty($social))
									<ul class="list-unstyled footer-two__widget__social">
    									<li class="fb">
        									<a href="{{$social->facebook_link ?? ''}}" target="_blank">
        									    <i class="fab fa-facebook-f"></i>
        									</a>
    									</li>
    									<li class="tw">
    									    <a href="{{$social->twitter_link ?? ''}}" target="_blank">
    									        <i class="fab fa-twitter"></i>
    									    </a>
    									</li>
    									<li class="in">
    									    <a href="{{$social->linkedin_link ?? ''}}" target="_blank">
    									        <i class="fab fa-linkedin-in"></i>
    									    </a>
    									</li>
    									<li class="ins">
    									    <a href="{{$social->instagram_link ?? ''}}" target="_blank">
    									        <i class="fab fa-instagram"></i>
    									    </a>
    									</li>
    									<li class="ins">
    									    <a href="{{$social->threads_link ?? ''}}" target="_blank">
    									        <div class="threads-icon"></div>
    									    </a>
    									</li>
    								
    									<li class="indmrt">
    									    <a href="{{$social->indiamart_link ?? ''}}" target="_blank">
    									        <div class="indiamart-icon"></div>
    									    </a>
    									</li>
    									<li class="ytube">
    									    <a href="{{$social->youtube_link ?? ''}}" target="_blank">
    									        <div class="youtube-icon"></div>
    									    </a>
    									</li>
    									<li class="wapp">
    									    <a href="{{$social->whatsapp_link ?? ''}}" target="_blank">
    									        <i class='fab fa-whatsapp'></i>
    									    </a>
    									</li>
    									<li class="wapp">
    									    <a href="tel:+91 {{$social->phone ?? ''}}" target="_blank">
    									        <i class="far fa-phone-plus"></i>
    									    </a>
    									</li>
    									<li class="in">
    									    <a href="mailto:{{$social->email ?? ''}}" target="_blank">
    									        <i class="far fa-envelope-open"></i>
    									    </a>
    									</li>
    								
    								</ul>
									@endif
									
    								<ul class="ul_style">
										<li class="in li_style">
    									    <a href="https://www.capterra.com/p/142145/Hospital-Management-Software/reviews/" target="_blank">
    									         <img border="0" src="https://brand-assets.capterra.com/badge/b7ae069f-5a38-41e9-adac-beb72a7c3133.svg"/ style="width: 100%;">

    									    </a>
    									</li>
										<li class="in li_style">
    									    <a href="https://www.getapp.com/healthcare-pharmaceuticals-software/a/hms-pro/reviews/" target="_blank">
    									         <img border="0" src="https://brand-assets.getapp.com/badge/991bc048-8aff-4cec-a3dc-e9fa8c9400b5.png"/ style="height: 50px;width: 100%;">

    									    </a>
    									</li>
										<li class="in li_style">
    									    <a href="https://www.softwareadvice.com/product/468305-Hospital-Management-Software/reviews/" target="_blank">
    									         <img border="0" src="https://brand-assets.softwareadvice.com/badge/6210404e-989a-4ec0-b921-417c506dec78.png"/ style="width: 100%;">

    									    </a>
    									</li>
    								</ul>
							</div>
						</div>
						
						<div class="col-md-12 col-lg-3">
							<div class="footer-two__widget footer-two__widget--menu">
							    
								<h3 class="footer-two__widget__title">Quick Links</h3>
								
								<div class="row">
								    
									<div class="col-12">
										<ul class="list-unstyled footer-one__widget__menu text-center">
											<li class="wow fadeInLeft"><a href="{{url('abouts')}}">About Company</a></li>
											<li class="wow fadeInLeft"><a href="{{url('overview')}}">Latest Services</a></li>
											<li class="wow fadeInLeft"><a href="{{url('team')}}">Meet The Team</a></li>
											<li class="wow fadeInLeft"><a href="{{url('career')}}">Need a Career?</a></li>
										</ul>
									</div>
									
									
								</div>

							</div>

						</div>
						
						<div class="col-md-12 col-lg-3">
						    <div class="footer-two__widget footer-two__widget--menu">
							    
								<h3 class="footer-two__widget__title">Our Products</h3>
								
								<div class="row">
								    
									<div class="col-12">
										<ul class="list-unstyled footer-one__widget__menu text-center">
    										<li class="wow fadeInRight"><a href="{{url('hms')}}"> HMS Pro+</a></li>
    										<li class="wow fadeInRight"><a href="{{url('radiology')}}">Radilogoy Pro+</a></li>
    										<li class="wow fadeInRight"><a href="{{url('lab')}}"> Laboratory Pro+</a></li>
    										<li class="wow fadeInRight"><a href="{{url('doctor')}}">Doctor Pro+</a></li>
    										<li class="wow fadeInRight"><a href="{{url('pharmacy')}}">Pharmacy Pro+</a></li>
										</ul>
									</div>
									
								</div>

							</div>
							
						</div>
						
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.footer-two__middle -->
			
			<div class="footer-two__copyright">
				<div class="container text-center">
					<p class="footer-two__copyright__text">Copyright &copy; </span> 2023 Tirupati Software InfoTech Pvt. Ltd. ,
						All rights Reserved</p>
				</div><!-- /.container -->
			</div><!-- /.footer-two__copyright -->
		</footer><!-- /.footer-two -->