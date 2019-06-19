@extends('front-end.login.base')
@section('content')
	<form class="login100-form validate-form" method="post" action="{{route('handleDangky')}}">
		@csrf
		<span class="login100-form-title p-b-49">
			Đăng kí
		</span>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Họ và Tên </span>
			<input class="input100" type="text" name="username" placeholder="Type your username">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
			@if ($errors->has('username'))
			    <div class="alert alert-danger">
			        {{$errors->first('username')}}
			    </div>
			@endif
		</div>
		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Email</span>
			<input class="input100" type="email" name="email" placeholder="Type your username">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
		</div>
		<div class="wrap-input100 validate-input" data-validate="Password is required">
			<span class="label-input100">Mật Khẩu</span>
			<input class="input100" type="password" name="pass" placeholder="Type your password">
			<span class="focus-input100" data-symbol="&#xf190;"></span>
		</div>

		<div class="wrap-input100 validate-input" data-validate="Password is required">
			<span class="label-input100">Nhập lại mật Khẩu</span>
			<input class="input100" type="password" name="confirmPass" placeholder="Type your password">
			<span class="focus-input100" data-symbol="&#xf190;"></span>
		</div>
		<div class="container-login100-form-btn pt-5">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button class="login100-form-btn">
					Đăng kí
				</button>
			</div>
		</div>

	</form>
@endsection