@extends('layout.app')
@section('content')
	@php
		$bannerbg = Helper::bannerimg();

		$allcurop = DB::table('career_jd')->OrderBy('id', 'asc')->get();


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




	<!-- Career -->
	<section class="">
		<!--<div class="dark-bg">-->
		<div class="containers">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="contact-one__content tcont-left">
						<div class="sec-title text-center mb-5">
							<p class="sec-title__tagline wow zoomInDown">Career</p>
							<h2 class="sec-title__title mb-2">We Are Hiring..!</h2>
							<h3 class="sec-title__title">Be a part of Our Team<br /><span class="tstylish">@Tirupati
									Software Infotech Pvt.Ltd.</span></h3>
						</div>

						<p class="carpera wow fadeInLeft">
							We’re excited to hear about your interest in joining our team. As a leading provider of
							cutting-edge HMS (Hotel Management Software) solutions, we pride ourselves on innovation,
							excellence, and a commitment to delivering top-notch software that transforms the hospitality
							industry.
						</p>

						<p class="carpera wow fadeInLeft">
							By filling out the form below, you’ll be taking the first step towards becoming a part of our
							dynamic and forward-thinking company. We value creativity, expertise, and passion, and we’re
							always looking for talented individuals to help us drive the future of hotel management
							technology.
						</p>

					</div>

					<div class="col-md-12 col-lg-12 text-center mb-5">
						<button type="button" class="cd-hero__btn cd-btn-prim curropn">Current Openings</button>
					</div>

				</div>



				<div class="col-md-12 col-lg-12">
					<div class="career-box">

						<div class="col-md-12 col-lg-12">
							@if(Session::has('success'))
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
							@endif
						</div>

						<form action="{{url('career')}}" class="contact" method="post" enctype="multipart/form-data"
							id="careerForm">
							@csrf

							<h3 class="contact-one__form__title wow fadeInRight">Please provide your details, and our team
								will be in touch with you soon to discuss potential opportunities.</h3>

							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif



							<div class="row careerdiv">

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-user"></i>
											Full Name
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="name" name="name" id="name">
									</div><!-- /.contact-two__input -->
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-phone-plus"></i>
											Phone No
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="phone number" name="phone" id="phone"
											maxlength="10">
									</div>
								</div><!-- /.col-md-6 -->

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-envelope-open"></i>
											Email Address
										</div><!-- /.contact-two__input__label -->
										<input type="email" placeholder="Enter your email" name="email" id="email">
									</div>
								</div><!-- /.col-md-6 -->

								<div class="col-md-6 col-lg-6 ">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="far fa-user"></i>
											Gender
										</div><!-- /.contact-two__input__label -->
										<select id="gender" name="gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-hourglass-start"></i>
											Age
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="age in numbers" name="age" id="age" maxlength="3">
									</div>
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-user-graduate"></i>
											Qualification
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="qualification" name="education" id="education">
									</div>
								</div>

								<div class="col-md-12 ">
									<div class="contact-two__input">

										<div class="contact-two__input__label">
											<i class="fas fa-award"></i>
											Apply For
										</div><!-- /.contact-two__input__label -->

										<select class="brd-fs-clr" id="apply_for" name="apply_for"
											style="width:100%;height:50px;">
											<option value=""> Applying For</option>
											<option value="Software Developer"> Software Developer </option>
											<option value="Web Developer"> Web Developer </option>
											<option value="Web Designer"> Web Designer </option>
											<option value="Business Manager"> Business Manager </option>
											<option value="Mkt Excecutive"> Marketing Excecutive </option>
											<option value="24*7 Support"> 24*7 Support </option>
											<option value="Training &amp; Installation">Training &amp; Installation
											</option>
											<option value="Onsite Support"> Onsite Support </option>
											<option value="Receptionist"> Receptionist </option>
											<option value="Telecaller"> Telecaller </option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-map-marked-alt"></i>
											Address
										</div>
										<textarea name="address" placeholder="Write address" id="address"></textarea>
									</div><!-- /.col-md-12 -->
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fas fa-city"></i>
											City
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="city" name="city" id="city">
									</div>
								</div>

								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-location"></i>
											Pin
										</div><!-- /.contact-two__input__label -->
										<input type="text" placeholder="pin" name="pin" id="pin">
									</div>
								</div>


								<div class="col-md-6">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-file-alt"></i>
											Resume
										</div><!-- /.contact-two__input__label -->
										<input class="form-control" id="photo" name="photo" type="file">
									</div>
								</div>

								<div class="col-md-12">
									<div class="contact-two__input">
										<div class="contact-two__input__label">
											<i class="fa fa-file-alt"></i>
											Captcha
										</div>
										<div class="captcha captcha_text">
											<div id="captcha">
											</div>
											<img id="captchaImg" class="block" src="" alt="Captcha Img">
										</div>
										<input type="text" id="captchaTextBox" placeholder="Wrtite above given text" />

									</div>
								</div>

								<div class="col-md-12">
									<button type="button" class="cd-hero__btn cd-hero__btn--secondary full-btn carsubtn"
										id="submitContactBtn">
										<span>
											Send
											<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
												viewBox="0 0 24 24">
												<g transform="translate(24 0) scale(-1 1)">
													<g fill="none" stroke="currentColor" stroke-dasharray="10"
														stroke-dashoffset="10" stroke-linecap="round"
														stroke-linejoin="round" stroke-width="2">
														<path d="M5 12L12 5M5 12L12 19">
															<animate fill="freeze" attributeName="stroke-dashoffset"
																dur="0.3s" values="10;0" />
														</path>
														<path d="M11 12L18 5M11 12L18 19">
															<animate fill="freeze" attributeName="stroke-dashoffset"
																begin="0.3s" dur="0.3s" values="10;0" />
														</path>
													</g>
												</g>
											</svg>
										</span>
									</button>
								</div>


							</div>

						</form>
					</div>
				</div>
				<div class="result"></div>
			</div>
		</div>
		<!--</div>-->
	</section>
	<!-- /Career -->



	<!-- Current Openings -->
	<section class="section-copens">
		<div class="containers">
			<div class="sec-title text-center">
				<p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Current Openings</p>
				<h3 class="sec-title__title">We are looking for experienced, professionals<br />
					with a niche skills in their expertise.</h3>
			</div>

			<div class="row">

				@if (!empty($allcurop))
					@foreach ($allcurop as $key => $item)
						<div class="col-md-4 col-lg-4">
							<div class="card  wow fadeInDown">
								<div class="card-img-box">
									<img class="img-fluid" src="{{ env('IMAGE_SHOW_PATH') . 'image/careerJD/' . $item->photo ?? '' }}">
								</div>
								<div class="card-body text-center">
									<h5 class="card-title tstylish">{{ $item->post }}</h5>
									<a href="{{url('career-jd')}}?id={{ $item->id }}"
										class="cd-hero__btn cd-hero__btn--secondary full-btn">Job Description</a>
								</div>
							</div>
						</div>
					@endforeach
				@endif


			</div>


		</div>
	</section>




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

					<p class="newssubs">Plz subscribe to our newsletter to be updated with the latest news <br />related to
						Tirupati International.</p>

				</div>
			</div>

		</div>
	</section>

	<!-- /Tirupati Newsletter -->
	<script>
		$(document).ready(function () {
			if ($.fn.inputmask) {
				$("#phone").inputmask("9999999999");
			}
		});
	</script>

	<style>
		canvas {
			display: none;
		}

		.captcha {
			height: 50px;
			margin-top: 20px;
		}

		.block {
			display: block;
		}
	</style>





	<script>
		$(document).ready(function () {

			var code;

			createCaptcha();


			function createCaptcha() {

				document.getElementById('captcha').innerHTML = "";
				var charsArray =
					"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
				var length = 6;
				var captcha = [];
				for (var i = 0; i < length; i++) {
					var index = Math.floor(Math.random() * charsArray.length + 1);
					captcha.push(charsArray[index]);
				}

				var canv = document.createElement("canvas");
				canv.id = "captcha";
				canv.width = 120;
				canv.height = 50;
				var ctx = canv.getContext("2d");
				ctx.font = "25px Georgia";
				ctx.strokeStyle = "white";
				ctx.strokeText(captcha.join(""), 0, 30);
				code = captcha.join(""); //storing captcha characters        
				document.getElementById("captcha").appendChild(canv);

				createCaptchaImg(canv);

			}

			$('#submitContactBtn').click(function () {
				event.preventDefault();

				if (document.getElementById("captchaTextBox").value == code) {
					//alert("Correct")
					var careerForm = document.getElementById("careerForm");
					careerForm.submit();
				} else {
					alert("Incorrect Captch Code.");
					$('#captchaTextBox').val('');
					createCaptcha();
				}
			})

			function createCaptchaImg(canvas) {
				var captcha = document.getElementById('captcha');
				var dataURL = canvas.toDataURL();
				var captchaImg = document.getElementById('captchaImg');
				captchaImg.setAttribute('src', dataURL);
			}



			$(".curropn").click(function () {
				$('html,body').animate({
					scrollTop: $(".section-copens").offset().top
				},
					'slow');
			});


		});




	</script>
@endsection