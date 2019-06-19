@extends('front-end.login.base')
@section('content')
	<form class="login100-form validate-form" method="post" action="{{route('changePass',['id'=>$id])}}">
		@csrf
		<span class="login100-form-title p-b-49">
			Thay đổi mật khẩu
		</span>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Mật khẩu mới</span>
			<input class="input100" type="password" name="pass" placeholder="Type your username">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
			
		</div>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Nhập lại mật khẩu</span>
			<input class="input100" type="pass" name="cfpass" placeholder="Type your username">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
			
		</div>
		
		<div class="container-login100-form-btn pt-5">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button class="login100-form-btn">
					Xác nhận
				</button>
			</div>
		</div>

	</form>
@endsection