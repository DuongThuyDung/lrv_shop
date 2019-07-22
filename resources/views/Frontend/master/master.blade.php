<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Bách Khoa - Aptech</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="{{url('/')}}/public/frontend/plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/public/frontend/plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="{{url('/')}}/public/frontend/fonts/ionicons.css" rel="stylesheet">
    <link href="{{url('/')}}/public/frontend/common/styles.css" rel="stylesheet">   
</head>

<body>
        @include('frontend.master.header')      
        @yield('content')	
       	@include('frontend.master.footer')

	<!-- jQuery -->
	<script src="public/frontend/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="public/frontend/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="public/frontend/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="public/frontend/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="public/frontend/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="public/frontend/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="public/frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="public/frontend/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="public/frontend/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="public/frontend/js/jquery.stellar.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="public/frontend/js/main.js"></script>
    <script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>
</body>

</html>