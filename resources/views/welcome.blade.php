<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>IAMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="freehtml5.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('frontend/') }}/css/style.css">

	<!-- Modernizr JS -->
	<script src="{{ asset('frontend/') }}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        <style>
        
.carousel-item.active,
.carousel-item-next,
.carousel-item-prev{
    display:block;
}
        </style>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">

		<div class="top-menu">
			<div class="container">
				<div class="row ">
                    
					<div class="col-xs-12 text-center" >
						<div style="margin-top:10px;"> <h2 style="color:blue;">Welcome to Inventory Management and Accounts System</h2></div>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	
	<!-- jQuery -->
	<script src="{{ asset('frontend/') }}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('frontend/') }}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('frontend/') }}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{ asset('frontend/') }}/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('frontend/') }}/js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="{{ asset('frontend/') }}/js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="{{ asset('frontend/') }}/js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="{{ asset('frontend/') }}/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('frontend/') }}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{ asset('frontend/') }}/js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="{{ asset('frontend/') }}/js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="{{ asset('frontend/') }}/js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });

    $('.owl-carousel').owlCarousel({
   
    autoplay:true,
    loop:true,
    margin:10,
    nav:true,
    items:1,
})
	</script>
	</body>
</html>

