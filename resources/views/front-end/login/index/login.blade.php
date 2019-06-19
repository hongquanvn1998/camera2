@extends('front-end.login.base')
@section('content')
	<form class="login100-form validate-form" method="post" action="{{route('handleLogin')}}">
		@csrf
		<span class="login100-form-title p-b-49">
			Login
		</span>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Email</span>
			<input class="input100" type="email" name="email" placeholder="Type your email">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
		</div>

		<div class="wrap-input100 validate-input" data-validate="Password is required">
			<span class="label-input100">Password</span>
			<input class="input100" type="password" name="pass" placeholder="Type your password">
			<span class="focus-input100" data-symbol="&#xf190;"></span>
		</div>
		
		<div class="row pt-4">
			<div class="col-12 col-md-12">
				<div class="text-right p-t-8 p-b-31">
					<a href="{{route('forgot')}}">
						Forgot password?
					</a>
				</div>
			</div>
		</div>
		<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button class="login100-form-btn">
					Login
				</button>
			</div>
		</div>

		<div class="txt1 text-center p-t-54 p-b-20">
			<a href="{{route('dangky')}}" class="txt2">
				Sign Up
			</a>
			<span>
				Or Sign Up Using
			</span>
			
		</div>

		<div class="flex-c-m">
			<a href="{{route('fb')}}" class="login100-social-item bg1">
				<i class="fa fa-facebook"></i>
			</a>

			<a href="#" class="login100-social-item bg2">
				<i class="fa fa-twitter"></i>
			</a>

			<a href="#" class="login100-social-item bg3">
				<i class="fa fa-google"></i>
			</a>
		</div>
	</form>
@endsection