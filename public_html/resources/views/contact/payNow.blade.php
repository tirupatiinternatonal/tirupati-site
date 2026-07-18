@extends('layout.app')
@section('content')
@php
$social =DB::table('settings')->first();

$planid = request('id');

$tplandata = DB::table('quotation')->where('id', $planid)->first();

@endphp

		
		<section class="order-one">
		    
			<div class="container">
				<div class="row gutter-y-60">
					<div class="col-md-12 col-lg-12">
					    
					    <div class="wow fadeInUp">
                		    <div class="page-header__title">
                    			<h1>{{ $tplandata->plan_name ?? '' }}</h1>
                    			<h3>Book your Order</h3>
                			</div>
            			</div>
					    
					    <form id="quickform" action="{{url('payNow')}}" class="contact odrfrm" method="post" encytpe="multiper/form-data">
					
                			<p class="frmcntnt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						    @csrf

							<div class="row">
								<div class="col-md-6">
								    
										<div class="contact-two__input__label">
											<i class="far fa-user"></i>
											Full Name
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="name" name="name">
									
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-phone-plus"></i>
											Phone No
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="phone number" name="phone" maxlength="10">
									</div>
								</div><!-- /.col-md-6 -->
								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-envelope-open"></i>
											Email Address
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="support@gmail.com" name="email">
									</div>
								</div><!-- /.col-md-6 -->
								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-user"></i>
											Gender
										</div><!-- /.contact-two__input__label -->
										<select name="gender" >
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>								
										</div>
								</div>
								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fas fa-rupee-sign"></i>
											Amount
										</div><!-- /.contact-two__input__label -->
										<input type="number" placeholder="Amount To Pay" name="amount" value="{{ $tplandata->amount }}" >
									</div>
								</div>
								<div class="col-md-12">
								    <div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-envelope"></i>
											Message
										</div>
									<textarea name="message" placeholder="Write message"></textarea>
								</div><!-- /.col-md-12 -->
								</div>
								<div class="col-md-12">
									<button type="submit" class="cd-hero__btn cd-hero__btn--secondary full-btn">
										<span>
											Pay Now
											<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g transform="translate(24 0) scale(-1 1)"><g fill="none" stroke="currentColor" stroke-dasharray="10" stroke-dashoffset="10" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M5 12L12 5M5 12L12 19"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="10;0"/></path><path d="M11 12L18 5M11 12L18 19"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s" values="10;0"/></path></g></g></svg>
										</span>
									</button>
								</div><!-- /.col-md-12 -->
							</div>
							</form>
						</div><!-- /.row -->
					
						<div class="result"></div><!-- /.result -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.contact-one -->



@endsection
<style>
.contact-info__card{
background-color: var(--insuco-gray, #f8f8f8);
}
    .row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
     margin-right:0px !important; 
    margin-left: calc(-.5 * var(--bs-gutter-x));
    
}
.contact{
    
  background-color: #fff;
  padding: 50px 80px;
  -webkit-box-shadow: 0px 10px 60px 0px rgba(22, 36, 62, 0.07);
          box-shadow: 0px 10px 60px 0px rgba(22, 36, 62, 0.07);
}
.contact textarea{
    display: block;
  border: none;
  outline: none;
  width: 100%;
  background-color: #ffffff;
  color: var(--insuco-text, #616161);
  font-size: 18px;
  font-weight: 600;
  padding-left: 14px;
  padding-right: 14px;
  border-bottom: 2px solid rgba(var(--insuco-black-rgb, 0, 4, 27), 0.1);
  border-radius: 5px;
  font-family: var(--insuco-font-title, "Red Hat Display", sans-serif);
  margin-bottom:10px;
  padding-top: 14px;
  height: 170px;
}
.contact input{
    display: block;
  border: none;
  outline: none;
  width: 100%;
  background-color: #ffffff;
  color: var(--insuco-text, #616161);
  font-size: 18px;
  font-weight: 600;
  padding-left: 14px;
  padding-right: 14px;
  border-bottom: 2px solid rgba(var(--insuco-black-rgb, 0, 4, 27), 0.1);
  border-radius: 5px;
  font-family: var(--insuco-font-title, "Red Hat Display", sans-serif);
  margin-bottom:10px;
  padding-top: 14px;
  height: 40px;
}
.contact select{
    display: block;
  border: none;
  outline: none;
  width: 100%;
  background-color: #ffffff;
  color: var(--insuco-text, #616161);
  font-size: 18px;
  font-weight: 600;
  padding-left: 14px;
  padding-right: 14px;
  border-bottom: 2px solid rgba(var(--insuco-black-rgb, 0, 4, 27), 0.1);
  border-radius: 5px;
  font-family: var(--insuco-font-title, "Red Hat Display", sans-serif);
  margin-bottom:10px;
  padding-top: 14px;
  height: 40px;
}
</style>