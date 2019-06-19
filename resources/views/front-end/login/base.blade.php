<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('login/bg-01.jpg')}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				@yield('content')
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('login/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/popper.js')}}"></script>
	<script src="{{asset('login/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/moment.min.js')}}"></script>
	<script src="{{asset('login/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/main.js')}}"></script>

</body>
</html>