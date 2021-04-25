<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
	<title>LIFE FITNESS GYMS</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="{{ url('css/style.css') }}">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Validation Library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>



	<script src="js/bootstrap.js" ></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/bootstrap.bundle.min.js" ></script>
	<script src="js/bootstrap.bundle.js" ></script>

	<style>
		.parsley-errors-list li{
			color : red;
			list-style : none;
		}
	</style>

<body>

@yield('content')

@yield('custom-js')
</body>
</html>