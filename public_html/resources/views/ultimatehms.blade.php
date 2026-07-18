@extends('layout.app')
@section('content')
@php
$testimo = DB::table('testimonila')
            ->join('citys', 'testimonila.city', '=', 'citys.id')
            ->join('states', 'testimonila.state', '=', 'states.id')
            ->join('countries', 'testimonila.country', '=', 'countries.id')
            ->select('testimonila.*', 'citys.name as citynam', 'states.name as statenam', 'countries.name as cntrynam')
            ->get();
            

$proid = request('mod');

$tpro = DB::table('product')->where('id', $proid)->first();


@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



	<!--About Product-->   
	<section class="proabout-section">
		<div class="container">
		    
		    <div class="row">
		        
		        <div class="col-md-5 col-xs-12 col-lg-6 col-sm-12 wow fadeInLeftBig">
		            <a class="image-popup-no-margins" href="http://tirupati-international.in/public/assets/images/hms win.png">
	                    <img src="http://tirupati-international.in/public/assets/images/hms win.png" class="img-fluid proscreen" alt="hms">
	                </a>
		        </div>
		        
		        <div class="col-md-7 col-xs-1 col-lg-6 col-sm-1 wow fadeInRightBig">
		            <div class="sec-title text-center">
            			<p class="sec-title__tagline">Explore</p>
            			<h3 class="sec-title__title">Tirupati Ultimate HMS Pro+</h3>
            		</div>
		            <p class="contpera">Tirupati Ultimate HMS pro+  provide complete module of hospital management software. it includes many small modules like for reception, doctor, multispecialty, op-billing, laboratary, radiology, nursing desk, pharmacy, Ot theatre, IP Billing, reports, registers, refferal, inventory, DMS, human resources, expenditures, assets, ambulance, canteen, CSSD, BMW, mourtuary, parking, blood bank, physiotherapy, panckarma, what's app, payment-gateway&website, mobile app, customizable, multi-user&multi system and role based access control </p>
		        </div>
		            
		    </div>
		</div>
    </section>
    <!--About Product-->
	  
		    
	<!--Product Section--> 	    
	<section class="product-section">
	    <div class="container" >
            <div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInRight">Key Features</p>
				<h3 class="sec-title__title">Ultimate HMS Pro+</h3>
			</div>
        </div>
	        
	    <div class='container-fluid uhms-fetr fetrbg'>
	        
	        <div class="row">
	            <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Reception</h4>
	                        <p>Dashboards, Appointment, Patient Registration & Billing, Token Display</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Doctor</h4>
	                        <p>E-Prescription, IPD Notes, OT Note, ICD-X Data, Discharge Summary, Patient EMR</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Multispecialty</h4>
	                        <p>Genera Medicine, Gyneac. & Obst.,Orthopaedic, Paediatrics, Dental, ENT, Diabetes, Ophthalmology Neurology, Liver & Gastro. etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>OP-Billing</h4>
	                        <p>Cash/Credit Billing for Advance, Consultation, Lab, Radiology, Procedure & Hospital Services</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Laboratory</h4>
	                        <p>Sampling, Testing, Indent Inventory, Lab-Device Interface, Reports, Patient Services</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Radiology</h4>
	                        <p>Scanning, Image +Text Report, Inventory, Radio-Device Interface, Reports, Patient Service</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Nursing Desk</h4>
	                        <p>Patient Treatment & Service Entry: -Vitals & Progress, Equipment, Lab, Radiology, Doctor Visit, Blood Transfusion, OT & Indent Consumables Medicines</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Pharmacy</h4>
	                        <p>Sales(Cash/Credit/Indent) & Purchase, Order, Stock, Tax Reports Vendor-Ledger, Short & Expiry, P&L</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>OT Theatre</h4>
	                        <p>OT Schedule, Inventory, Implants</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>IP Billing</h4>
	                        <p>Advance, Item & Service Entry, Lab Radiology, Medicine, Operation, Procedures Doctor Charges, Implants, Invoice Generate, Settlement etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Reports</h4>
	                        <p>Day Collection, User wise, Head wise, Month & Year wise, Doctor wise, Panel wise</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Registers</h4>
	                        <p>QI Report, TAT Reports, NABL, IRDA, PCPNDT Reports &50+ other reports</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Referral</h4>
	                        <p>In-house, On Call or Referral Doctor’s Share Panel Accounting Modules</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Inventory</h4>
	                        <p>Indent Request & Supply, Purchase, PO, Stock, Vendor’s Ledger</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>DMS</h4>
	                        <p>To Manage Hospital’s Various Documents, Renewals, Certificates Contract Letter etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Human Resources</h4>
	                        <p>Employee Master, Employee Attendance with Biomax Device, Duty Roster, Payslip, Salary Statements, ESI, PF, Tax reports, Appraisals, Termination, Resignations, Leave Management</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Expenditures</h4>
	                        <p>Party Master, Expense Entry, Reports, head wise Accounts Module for Inward & Outward Expense</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Assets</h4>
	                        <p>Purchase, Installation, Service Tracker, Depreciation, Renewals, Maintenance Repairing, In-Out Entry etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Ambulance</h4>
	                        <p>Ambulance & Drive’s Entry Logbook, Patient Pickup & Drop, Report, Expenditure etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Canteen</h4>
	                        <p>Diet Plan, IP Patient Food Supply, Inventory, Billing, Coupon wise Food monitoring, Processing Foods</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>CSSD</h4>
	                        <p>To Manage OT/IP equipment Clean & Hygiene, Labelling, Storing, Re-issue, Uses & Again Process to Clean after uses Cycle Management & Tracking.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>BMW</h4>
	                        <p>To Manage Hospital Waste & Disposal Technique.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Mortuary</h4>
	                        <p>To Manage Death Body Case Entry, PM Report, Store & Handover to Family, Valuable Entry.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Parking</h4>
	                        <p>TO Manage Parking Space, Billing of Vehicle, Vehicle Tracker, Space Availability.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Blood Bank</h4>
	                        <p>Donor Registration, Blood Collection, Testing, Component, Storing, Patient Entry, Request, Cross Match, Issue Blood for Transfusion, Inventory & Blood Stock, Report Financial.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Physiotherapy</h4>
	                        <p>To Schedule a timeframe based therapies, billing & Token management Availability etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Panckarma</h4>
	                        <p>Ayurveda Centre to management Panckarma therapy</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>WhatsApp</h4>
	                        <p>Fully Automated WhatsApp Notification of every moment to Patient, Doctor, User & Admin via Multimedia reports.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Payment-Gateway & Website</h4>
	                        <p>To Collect online payment from Patient or send payment to respective company via NEFT/RTGS etc.</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Mobile App</h4>
	                        <p>iOS & Android App for Patient, Doctor, User & Super Admin user to access respective records</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Customizable</h4>
	                        <p>The Complete Product can be customizable as per Client’s Environmental Requirements</p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Multi User & Multi System</h4>
	                        <p></p>
	                    </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-1 col-xs-1">
	                <div class="feat">
	                    <div class="para">
	                        <h4>Role Based Access Controls</h4>
	                        <p></p>
	                    </div>
                    </div>
                </div>

            </div>
	        
		    
	    </div>
		</section>
	<!--/Product Section--> 
	

    <!-- Pay Now -->
    <section class="funfact-one section-paynow about-paynow">
			<div class="container">
			    
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
		    
	<div class="container">

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

<!-- Book a Demo -->
	<section class="demo-section">
	    <div class="container">

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
