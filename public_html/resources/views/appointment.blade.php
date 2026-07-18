@extends('layout.app')
@section('content')
<head>
        <meta name="keywords" content="Hospital Management Software Company in Jaipur ,Hospital Software in Jaipur, Hospital Management Software,Best Hospital software ,Hospital Software,Tirupati HMS, Tirupati Software Infotech Pvt Ltd,Digital Healthcare,Healthcare Solutions,Healthcare Software,Healthcare Software Companies,healthcare solutions companies,healthcare crm">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKSK7XWP');</script>
<!-- End Google Tag Manager -->
</head>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKSK7XWP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<section class="page-header">
			<div class="page-header__bg"
				style="background-image: url(http://tirupati-international.in/public/assets/images/appointment.jpg);"></div>
			<!-- /.page-header__bg -->
			<div class="container">
				<h2 class="page-header__title">Book a Appointment</h2><!-- /.page-header__title -->
				<ul class="list-unstyled breadcrumb-one">
					<li><a href="{{url('welcome')}}">Home</a></li>
					<li><span>Book a Appointment</span></li>
				</ul><!-- /.list-unstyled breadcrumb-one -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		<div class="war wxwd">
        <iframe src="https://tirupatihms.com/hms/appointments/patient_appointment" width="100%" height="600px" frameborder="0"></iframe>
</div>
<script>
    function patient_appointment(){
           return redirect()->route('appointment')->withSuccess('Done');     

    }
</script>
@endsection
