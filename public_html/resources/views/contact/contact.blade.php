@extends('layout.app')
@section('content')
@php
$bannerbg = Helper::bannerimg();

$social =DB::table('settings')->first();

$dbcity = DB::table('citys')->get();
$dbstate = DB::table('states')->get();
$dbcountry = DB::table('countries')->get();

@endphp

<style>
    .containers {
        margin: 26px 27px 0px 27px;
        box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
    }
    .theme-popup{
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    display:flex;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.theme-popup-box{
    background:#ffffff;
    padding:30px;
    border-radius:10px;
    text-align:center;
    width:400px;
    max-width:90%;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

.theme-popup-box h3{
    color:#0f5f5c;   
    font-weight:600;
}

.theme-popup-box button{
    margin-top:15px;
    padding:8px 25px;
    background:#0f5f5c;  
    border:none;
    color:#fff;
    border-radius:5px;
    cursor:pointer;
    transition:0.3s ease;
}

.theme-popup-box button:hover{
    background:#0c4c4a;
}

.required{
    color:red;
    position: relative;
    top: 8px;
    font-size:24px;
}

.abdm-logo {
   max-width: 60%;
   height: auto;
   margin-top: -120px;
   margin-left: -50px;
}

.abdm-address {
   margin-top: -150px;
   position: absolute;
   
}  
.map-heading{
    background-color: #0b6b6b;
    color:#fff;
    font-weight: 600;
    margin-bottom: 15px;
}

</style>
		
		<section class="contact-one" {!! $bannerbg !!}>
			<div class="dark-bg">
			    <!--<div class="container">-->
    				<div class="row">
    					<div class="col-md-12 col-lg-5">
    						<div class="contact-one__content tcont-left">
    						    <div class="sec-title text-start">
                            		<p class="sec-title__tagline text-white wow zoomInDown">Get in touch</p>
                            		<h3 class="sec-title__title" style="color:white;">We're Here to Help!</h3>
                            	</div>
                            	
    							<div class="footcontact wow fadeInLeft">
    							     <h4 class="footer-title">Registered Office</h4>
    							     
        						     @if(!empty($social))
        						     <div class="foot-cntnt contact-cntnt">
            							 <i class="far fa-map-marker-alt"></i> 
            							 <a style="color:white;" href="http://maps.google.com/?q={{$social->address ?? ''}}" target="_blank" >{{$social->address ?? ''}}</a>
        							 </div>
        							 @endif
        							 
    							 </div>
    							 
    							 <div class="footcontact wow fadeInLeft">
    							     <h4 class="footer-title">Marketing Office</h4>
    							     
        						     @if(!empty($social))
        						     <div class="foot-cntnt contact-cntnt">
            							 <i class="far fa-map-marker-alt"></i> 
            							 <a style="color:white;" href="" target="_blank" >{{$social->marketing_office ?? ''}}</a>
        							 </div>
        							 @endif
        							 
    							 </div>
    							 
    							 <div class="footcontact wow fadeInLeft">
    							     <h4 class="footer-title">Development Office</h4>
    							     
        						     @if(!empty($social))
        						     <div class="foot-cntnt contact-cntnt">
        							    <i class="far fa-map-marker-alt"></i> 
        							    <a style="color:white;" href="http://maps.google.com/?q={{$social->department_office ?? ''}}" target="_blank">{{$social->department_office ?? ''}}</a>
        							 </div>
        							 @endif
        							 
    							 </div>
    							 
    							  
    							<div class="footcontact wow fadeInLeft">
    							     <h4 class="footer-title">Phone No.</h4>
    							     
        						     @if(!empty($social))
        						     <div class="foot-cntnt-bth last-foot-cntnt">
            							 <div class="pno">
            							     <i class="far fa-phone-plus"></i> 
            							     <a style="color:white; href="tel:+91 {{$social->phone_second ?? ''}}">+91-{{$social->phone_second ?? ''}}</a> 
            							 </div>
            							 <!--<span class="sp">|</span> -->
            							 <div class="pno">
        								    <i class="far fa-phone-plus"></i> 
        								    <a style="color:white; href="tel:+91 {{$social->phone ?? ''}}">+91-{{$social->phone ?? ''}}</a>
        								 </div>
    								 </div>
        							 @endif
    							 </div>
    							 <div class="footcontact wow fadeInLeft abdm-fix">

                                    <h4 class="footer-title" style="font-weight:bold;">ABDM Service Partner</h4>
                                
                                    <!-- LOGO -->
                                    <div class="abdm-logo-inline">
                                        <img src="{{ asset('public/assets/images/chipsy-logo.png') }}" alt="ABDM Logo" class="abdm-logo">
                                    </div>
                                
                                    @if(!empty($social))
                                    <div class="abdm-address">
                                        <i class="far fa-map-marker-alt"></i> 
                                        <a href="http://maps.google.com/?q={{$social->department_office ?? ''}}" target="_blank">                     
                                        <span style="color:white;  font-family: 'Poppins', sans-serif;">
                                            CHIPSY INFORMATION TECHNOLOGY SERVICES PRIVATE LIMITED<br>
                                            Bhaktha Towers, Kalsanka, Udupi, Karnataka 576101
                                        </span>
                                    </div>
                                    @endif
                                
                                </div>
    							 
    							  
    							<div class="footcontact wow fadeInLeft">
    							     <h4 class="footer-title">Phone No.</h4>
    							     
        						     @if(!empty($social))
        						     <div class="foot-cntnt-bth last-foot-cntnt">
            							 <div class="pno">
            							     <i class="far fa-phone-plus"></i> 
            							     <a style="color:white;" href="tel:+91 {{$social->phone_second ?? ''}}">+91-8949868687</a> 
            							 </div>
            							
    								 </div>
        							 @endif
    							 </div>
    							 
    						</div>
    					</div>
    					
    					
    					<div class="col-md-12 col-lg-7">
    					    <div class="contact-box">
					    	@if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        
    					    <form id="quickform" action="{{url('contact')}}" class="contact" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <p class="contact-one__form__title wow fadeInRight">
                                    Contact us for quries or technical assistance via the contact information provided.
                                    We will get back to you ASAP.
                                </p>
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="row">
                            
                                    <div class="col-md-6 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="far fa-user"></i>
                                                Full Name (<span class="required">*</span>)
                                            </div>
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="far fa-id-badge"></i>
                                                Designation (<span class="required">*</span>)
                                            </div>
                                            <input type="text" placeholder="Designation" name="designation" value="{{ old('designation') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6 wow fadeInRight">
                                <div class="contact-two__input" style="position:relative;">
                                    <div class="contact-two__input__label">
                                        <i class="far fa-phone-plus"></i>
                                        Phone No (<span class="required">*</span>)
                                    </div>
                                    <input type="tel" placeholder="Phone number" name="phone" id="phone" maxlength="10" value="{{ old('phone') }}">
                            
                                    <span id="phone-error" style="color:#ff4d4d; font-size:16px; position:absolute; bottom:-24px; left:0; display:none; font-weight:600;">
                                        Phone number already exist
                                    </span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 wow fadeInRight">
                                <div class="contact-two__input" style="position:relative;">
                                    <div class="contact-two__input__label">
                                        <i class="fas fa-mobile-alt"></i>
                                        Mobile No
                                    </div>
                                    <input type="tel" placeholder="Mobile number" name="mobile" id="mobile" maxlength="10" value="{{ old('mobile') }}">
                            
                                    <span id="mobile-error" style="color:#ff4d4d; font-size:16px; position:absolute; bottom:-24px; left:0; display:none; font-weight:600;">
                                        Mobile number already exist
                                    </span>
                                </div>
                            </div>
                            
                                    <div class="col-md-6 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="far fa-envelope-open"></i>
                                                Email Address (<span class="required">*</span>)
                                            </div>
                                            <input type="email" placeholder="support@gmail.com" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="far fa-user"></i>
                                                Gender
                                            </div>
                                            <select name="gender" value="{{ old('gender') }}">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-university"></i>
                                                Organization/Company/Healthcare Institute’s Name (<span class="required">*</span>)
                                            </div>
                                            <textarea name="organization_name" placeholder="Organization/Company/Healthcare Institute’s Name" style="height:65px;" value="{{ old('organization_name') }}"></textarea>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-map-marked-alt"></i>
                                                Address (<span class="required">*</span>)
                                            </div>
                                            <textarea name="address" placeholder="Write address" value="{{ old('address') }}"></textarea>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-4 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-flag"></i>
                                                Country (<span class="required">*</span>)
                                            </div>
                                            <select id="country_id" name="country" value="{{ old('country') }}">
                                                <option value="">Select Country</option>
                                                @if (!empty($dbcountry))
                                                    @foreach ($dbcountry as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-4 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fas fa-city"></i>
                                                State (<span class="required">*</span>)
                                            </div>
                                            <select id="state_id" name="state" value="{{ old('state') }}">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-4 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fas fa-city"></i>
                                                City (<span class="required">*</span>)
                                            </div>
                                            <select id="city_id" name="city" value="{{ old('city') }}">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-map-pin"></i>
                                                Zip Code (<span class="required">*</span>)
                                            </div>
                                            <input type="text" name="zipcode" placeholder="Enter Zip Code" maxlength="10" value="{{ old('zipcode') }}">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6 wow fadeInRight">
                                       <div class="contact-two__input">
                                          <div class="contact-two__input__label">
                                              <i class="fa fa-flag"></i>
                                              Interested for (<span class="required">*</span>)
                                          </div>
                                        <select id="subj" name="subj" value="{{ old('subj') }}">
                                           <option value="">Select your Subject</option>
                                           <option value="Hospital Management Software">Hospital Management Software</option>
                                           <option value="Laboratory Software">Laboratory Software</option>
                                           <option value="Radiology Software">Radiology Software</option>
                                           <option value="Pharmacy Software">Pharmacy Software</option>
                                           <option value="Blood Bank Software">Blood Bank Software</option>
                                           <option value="Canteen Software">Canteen Software</option>
                                           <option value="Doctor/ Clinic / Nursing Home Software">Doctor/ Clinic / Nursing Home Software</option>
                                           <option value="CRM/ERP Software">CRM/ERP Software</option>
                                           <option value="Healthcare Software">Healthcare Software</option>
                                           <option value="Customised Software">Customised Software</option>
                                        </select>
                                      </div>
                                    </div>
                            
                                    <div class="col-md-12 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-envelope"></i>
                                                Message (<span class="required">*</span>)
                                            </div>
                                            <textarea name="message" placeholder="Write message" value="{{ old('message') }}"></textarea>
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 wow fadeInRight">
                                        <div class="contact-two__input">
                                            <div class="contact-two__input__label">
                                                <i class="fa fa-file"></i>
                                                Upload File/Document (Image / PDF / Word)
                                            </div>
                                            <input name="file" type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="col-md-12 wow fadeInRight">
                                        <button type="submit" class="cd-hero__btn cd-hero__btn--secondary full-btn">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                            
                                </div>
                            </form>

              @if(Session::has('success'))
              <div id="successPopup" class="theme-popup">
                <div class="theme-popup-box">
                <h3>Thank You!</h3>
                <p>{{ Session::get('success') }}</p>
              <button onclick="closeThemePopup()">OK</button>
               </div>
              </div>
              @endif
              
    					    </div>
    					</div>
    					<div class="result"></div>
    				</div>
				<!--</div>-->
			</div>
		</section><!-- /.contact-one -->
		
		
       		
<!-- Contact Information -->

    <section class="section-service section-branch">
		<div class="service-six">
			<div class="containers">
			    
				<div class="sec-title text-center">
					<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Our Presence</p>
					<h3 class="sec-title__title">Branches Offering Our Products & Services</h3>
				</div><!-- /.sec-title -->
				
				<div class="row">
				    
					<div class="col-md-6 col-lg-4 wow zoomInLeft">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/indian.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">India</h4>
							    
							    <p class="text-center ofctyp">( Registered Office )</p>
							    
    							<h3 class="service-card-four__title text-center">Tirupati Software Infotech Pvt. Ltd.</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-map-marker-alt"></i> 
            							 <span>{{$social->address ?? ''}}</span>
            							 @endif
        							</div>
        							
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-phone-plus"></i> 
            							 <span>{{$social->phone ?? ''}} | {{$social->phone_second ?? ''}}</span>
            							 @endif
        							</div>
        							
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-envelope-open"></i> 
            							 <span>{{$social->email ?? ''}}</span>
            							 @endif
        							</div>
    							</div>
    							
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 wow zoomInLeft">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/indian.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">India</h4>
							    
							    <p class="text-center ofctyp">( Corporate Office )</p>
							    
    							<h3 class="service-card-four__title text-center">Tirupati Software Infotech Pvt. Ltd.</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-map-marker-alt"></i> 
            							    <span>
                                                3rd Floor, #16-1-43, Netaji Road (Karnal Street),
                                                Tirupati (Andhra Pradesh) India – 517501
                                            </span>
            							 @endif
        							</div>
        							
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-phone-plus"></i> 
            							 <span>{{$social->phone ?? ''}} | {{$social->phone_second ?? ''}}</span>
            							 @endif
        							</div>
        							
        							<div class="gridcontact">
        							     @if(!empty($social))
            						     <i class="far fa-envelope-open"></i> 
            							 <span>{{$social->email ?? ''}}</span>
            							 @endif
        							</div>
    							</div>
    							
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 wow zoomInDown">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/nigeria.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">Nigeria</h4>
							    
							    <p class="text-center ofctyp">( Branch Office )</p>
							    
    							<h3 class="service-card-four__title text-center">Multi Tech IT Solution</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     <i class="far fa-map-marker-alt"></i> 
            							 <span>15/19 Ola-Ayeni Street, Off Kodesho Street,Ikeja Lagos-Nigeria.</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-phone-plus"></i> 
            							 <span>+234 806 293 0407</span>
            						</div>
            						
            						<div class="gridcontact">
        							     <i class="far fa-phone-plus"></i> 
            							 <span>08062930407 | 08191752736</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-envelope-open"></i> 
            							 <span>multitechitsol@yahoo.com</span>
            						</div>
        						</div>
    							
							</div>
						</div>
					</div>
				
					
				</div>
				
				<div class="row">
					
					<div class="col-md-6 col-lg-4 wow zoomInLeft">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/kenya.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">Kenya</h4>
							    
							    <p class="text-center ofctyp">( Branch Office )</p>
							    
    							<h3 class="service-card-four__title text-center">Mind Zone Technologies</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     <i class="far fa-map-marker-alt"></i> 
            							 <span>Kenya</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-phone-plus"></i> 
            							 <span>+254-724249129</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-envelope-open"></i> 
            							 <span>info@suntiara.in</span>
            						</div>
        						</div>
    							
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 wow zoomInDown">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/indian.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">India</h4>
							    
							    <p class="text-center ofctyp">( Branch Office )</p>
							    
    							<h3 class="service-card-four__title text-center">Asadhi Infratech</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     <i class="far fa-map-marker-alt"></i> 
            							 <span>2nd Floor, #5-5-343A, S.D. Layout, Opp. Nehru, Municipal High School, Tirupathi-517507 (AP) India</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-phone-plus"></i> 
            							 <span>+91-9845529994</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-envelope-open"></i> 
            							 <span>dr.raviteja@live.in</span>
            						</div>
        						</div>
    							
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 wow zoomInRight">
					    <div class="cflag">
						    <img src="{{url('public/assets/images/icons/indian.jpg')}}" class="img-fluid" alt="">
						</div>
						<div class="service-card-four">
						    
							<div class="service-card-four__content">
							    
							    <h4 class="countryofc">India</h4>
							    
							    <p class="text-center ofctyp">( Branch Office & Child Company)</p>
							    
    							<h3 class="service-card-four__title text-center">Rukmani Software</h3>
    							
    							<div class="cinfo-box">
        							<div class="gridcontact">
        							     <i class="far fa-map-marker-alt"></i> 
            							 <span>11, Sikar Rd, Sector 2, Radha Govind Colony, Dahar Ka Balaji, Jaipur, Rajasthan 302032</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-phone-plus"></i> 
            							 <span>+91-8949868687</span>
            						</div>
        							
        							<div class="gridcontact">
        							     <i class="far fa-envelope-open"></i> 
            							 <span>skwork91@gmail.com</span>
            						</div>
        						</div>
    							
							</div>
						</div>
					</div>
					<div class="row">
    					    <div class="col-md-6 col-lg-4 wow zoomInRight">
    					    <div class="cflag">
    						    <img src="{{url('public/assets/images/icons/canada.jpg')}}" class="img-fluid" alt="">
    						</div>
    						<div class="service-card-four">
    						    
    							<div class="service-card-four__content">
    							    
    							    <h4 class="countryofc">Canada</h4>
    							    
    							    <p class="text-center ofctyp">( Branch Office )</p>
    							    
        							<h3 class="service-card-four__title text-center">Starryone Inc.</h3>
        							
        							<div class="cinfo-box">
            							<div class="gridcontact">
            							     <i class="far fa-map-marker-alt"></i> 
                							 <span>#123, Slater Street, 6th Floor,Ottawa on K1P5H2, Canada -K1P5H2</span>
                						</div>
            							
            							<div class="gridcontact">
            							     <i class="far fa-phone-plus"></i> 
                							 <span>+1 418 554 8292</span>
                						</div>
            							
            							<div class="gridcontact">
            							     <i class="far fa-envelope-open"></i> 
                							 <span>ramzi.naouali@starryone.ca</span>
                						</div>
            						</div>
        							
    							</div>
    						</div>
					   </div>
				    </div>
				</div>
			</div>
		</div>
    </section>

<!-- /Contact Information -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center map-heading mb-3">Registered Office</h4>
        
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3018.112130528144!2d75.83210047457904!3d26.822841463948627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db60dce33c21b%3A0x486b5abcfd844c5f!2sTirupati%20Software%20Infotech%20Pvt%20Ltd!5e1!3m2!1sen!2sin!4v1781952241875!5m2!1sen!2sin"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        
            <!-- Branch Office -->
            <div class="col-md-6">
                <h4 class="text-center map-heading mb-3">Corporate Office</h4>
        
                <iframe
                    src="https://maps.google.com/maps?q=13.628809,79.417587&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
      var $jq = jQuery.noConflict();
$jq(document).ready(function(){
    $jq('#country_id').on('change', function(e){
        var baseurl = "{{ url('/') }}";
        var country_id = $jq(this).val();
        // alert(state_id);
        $jq.ajax({
            headers: {'X-CSRF-TOKEN': $jq('meta[name="csrf-token"]').attr('content')},
            url: baseurl + '/countryData/' + country_id,
            success: function(data){
                $jq("#state_id").html(data);
                
            }
        });
    });
});

    </script>
    <script>
      var $jq = jQuery.noConflict();
$jq(document).ready(function(){
    $jq('#state_id').on('change', function(e){
        var baseurl = "{{ url('/') }}";
        var state_id = $jq(this).val();
        // alert(state_id);
        $jq.ajax({
            headers: {'X-CSRF-TOKEN': $jq('meta[name="csrf-token"]').attr('content')},
            url: baseurl + '/stateData/' + state_id,
            success: function(data){
                $jq("#city_id").html(data);
                
            }
        });
    });
});

    </script>
<!--<script>-->
<!--     $('#country_id').on('change', function(e){-->
<!--                var baseurl = "{{ url('/') }}";-->
<!--            	var country_id = $(this).val();-->
<!--            	alert(country_id);-->
<!--                $.ajax({-->
<!--                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},-->
<!--            	  url: baseurl+'/countryData/'+country_id,-->
<!--            	  success: function(data){-->
<!--            			$("#state_id").html(data);-->
<!--            	  }-->
<!--            	});-->
            	
<!--            });-->
<!--        $('#state_id').on('change', function(e){-->
<!--                var baseurl = "{{ url('/') }}";-->
<!--            	var state_id = $(this).val();-->
<!--                $.ajax({-->
<!--                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},-->
<!--            	  url: baseurl+'/stateData/'+state_id,-->
<!--            	  success: function(data){-->
<!--            			$("#city_id").html(data);-->
<!--            	  }-->
<!--            	});-->
            	
<!--            });-->
<!--</script>-->

<script>
     function isNumber(evt){
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            
                 return true;
            }
</script>

<script>
function closeThemePopup(){
    document.getElementById('successPopup').style.display='none';
}
</script>
<script>
var $jq = jQuery.noConflict();

$jq(document).ready(function(){

    function checkNumber(fieldId, routeName, errorId) {

        let value = $jq(fieldId).val();

        if(value.length == 10){

            $jq.ajax({
                url: routeName,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    [fieldId.replace('#','')]: value
                },
                success: function(response){

                    if(response.exists){
                        $jq(errorId).show();
                    } else {
                        $jq(errorId).hide();
                    }

                }
            });

        } else {
            $jq(errorId).hide();
        }
    }

    // Mobile
    $jq('#mobile').on('keyup', function(){
        checkNumber('#mobile', "{{ route('check.mobile') }}", '#mobile-error');
    });

    // Phone
    $jq('#phone').on('keyup', function(){
        checkNumber('#phone', "{{ route('check.phone') }}", '#phone-error');
    });

});
</script>
<style>


</style>