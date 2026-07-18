<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirupati Software Infotech Pvt. Ltd.</title>
    <meta name="keywords"
        content="Hospital Management Software ,Hospital Software, HMS Software, Hospital Management Software,Best Hospital software ,Hospital Software,Tirupati HMS, Lab Software, Pathology Software, Medical & Pharmacy Software, Blood Bank Software, Pharmacy Software,HMS,HIS Software,Healthcare Software,Healthcare Software Companies,CRM, EHR">
    <meta name="description"
        content="Comprehensive Hospital Management Software (HMS) for hospitals, labs, pharmacies, and blood banks. Includes EHR, CRM, and healthcare solutions">
    <meta property="og:title" content="Best Hospital Management Software | Tirupati HMS">
    <meta property="og:description"
        content="All-in-one Hospital Management Software (HMS) for hospitals, labs, pharmacies, and blood banks. Includes EHR, CRM, billing, and patient care modules.">
    <!--<meta property="og:image" content="public/assets/images/favicons/favicon-16x16.png">-->
    <meta property="og:url" content="https://tirupati-international.in">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Tirupati HMS">
    <meta property="og:locale" content="en_US">

    <!--<link rel="apple-touch-icon" sizes="180x180" href="public/assets/images/favicons/favicon-16x16.png">-->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicons/favicon-16x16.png">-->
    <!--<link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicons/favicon-16x16.png') }}">-->

    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/images/favicons/favicon-16x16.png">

    <link rel="apple-touch-icon" href="{{ asset('public/assets/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="public/assets/images/favicons/site.webmanifest">

    <link rel="canonical" href="https://tirupati-international.in/" />

    <!-- fonts css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DK+Uloopet:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;1,400;1,500&amp;family=Red+Hat+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">


    <!-- plugins css -->
    <link rel="stylesheet" href="public/assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="public/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="public/assets/vendors/insuco-icons/flaticon_insuco.css">
    <link rel="stylesheet" href="public/assets/vendors/jquery-nice-select/css/nice-select.css">
    <link rel="stylesheet" href="public/assets/vendors/owl-carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/assets/vendors/owl-carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css">
    <link rel="stylesheet" href="public/assets/vendors/youtube-popup/youtube-popup.css">
    <link rel="stylesheet" href="public/assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="public/assets/vendors/ion.rangeSlider/css/ion.rangeSlider.min.css">
    @if(request()->is('/') || request()->routeIs('welcome'))
        <link rel="stylesheet" href="public/assets/vendors/heroslider/css/heroslider.css">
        <link rel="stylesheet" href="public/assets/vendors/vanilla-carousel/css/style.css">
    @endif
    <link rel="stylesheet" href="public/assets/vendors/mosaic/css/jquery.mosaic.min.css">
    <link rel="stylesheet" href="public/assets/vendors/fullscreen-slideshow/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.2.3/css/flag-icons.min.css">

    <!-- template css -->
    <link rel="stylesheet" href="public/assets/css/insuco.css">
    <!--<link rel="stylesheet" href="public/assets/css/reset.css">-->



    <link rel="stylesheet" href="styles.css" />
</head>

<body class="">
    <div id="main-wrapper" class="main-wrapper">



        @include('layout.header')
        @yield('content')
        @include('layout.footer')
        @include('layout.message')

    </div>
    </div>
</body>
<script>
                /*$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                    var URL  = "{{ url('/') }}";*/
</script>
<script src="public/assets/js/jquery-3.6.1.min.js"></script>
<script src="public/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script src="public/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
<script src="public/assets/vendors/jquery-validated/jquery.validate.min.js"></script>
<script src="public/assets/vendors/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="public/assets/vendors/owl-carousel/dist/owl.carousel.min.js"></script>
<script src="public/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="public/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
<script src="public/assets/vendors/youtube-popup/youtube-popup.jquery.js"></script>
<script src="public/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="public/assets/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<script src="public/assets/vendors/wow/wow.js"></script>
@if(request()->is('/') || request()->routeIs('welcome'))
    <script src="public/assets/vendors/heroslider/js/heroslider.js"></script>
    <script src="public/assets/vendors/vanilla-carousel/js/script.js"></script>
@endif
<script src="public/assets/vendors/mosaic/js/jquery.mosaic.min.js"></script>
<script src="public/assets/vendors/fullscreen-slideshow/js/script.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/jquery.inputmask.min.js"></script>-->


<!-- template js -->
<script src="public/assets/js/insuco.js"></script>

<script>
    new WOW().init();
    // Header - Flag dropdown-box

    if ($(".flagbox").length) {
        $(document).on("click", ".flag-menu .flag-item", function (e) {
            e.preventDefault();
            if (!$(this).hasClass("active")) {
                $(".flag-menu .flag-item").removeClass("active");
                $(this).addClass("active");
                $(this)
                    .parents(".flagbox")
                    .find(".btn")
                    .html($(this).html());
            }
        });
    }

    // $('.dropdown-menu li').each(function() {
    //     var back = ["#ffb3b3","#ffbee5","#eca0ff","#b7a0ff","#a0cdff","#a0feff","#a0ffbd","#c6ffa0","#feffa0","#ffdaa0","#ffab82"];
    //     var rand = back[Math.floor(Math.random() * back.length)];
    //     $(this).css('background',rand);
    // });

    $(".dropdown-menu li").on("mouseover", function () {
        var back = ["#ffb3b3", "#ffbee5", "#eca0ff", "#b7a0ff", "#a0cdff", "#a0feff", "#a0ffbd", "#c6ffa0", "#feffa0", "#ffdaa0", "#ffab82"];
        var rand = back[Math.floor(Math.random() * back.length)];
        $(this).css('background', rand);
    });

    $(".dropdown-menu li").on("mouseout", function () {
        // Only reset background if it's not active
        if (!$(this).hasClass('active')) {
            $(this).css('background', "#FFFFFF");
        }
    });

    $(".dropdown-menu li.active").on("mouseout", function () {
        $(this).css('background', "#106165"); // Keep the active background on mouse out
    });


</script>
<style>
    .container {
        max-width: 1300px;
        margin: auto;
        width: 100%;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    body {
        overflow-x: hidden;
    }
</style>
</body>

</html>