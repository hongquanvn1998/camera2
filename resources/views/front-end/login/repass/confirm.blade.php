@extends('front-end.login.base')
@section('content')
	<form class="login100-form validate-form" method="post" action="{{route('confirmPass')}}">
		@csrf
		<span class="login100-form-title p-b-49">
			Xác nhận email
		</span>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
			<span class="label-input100">Mã xác nhận</span>
			<input class="input100" type="text" name="cod" placeholder="Type your username">
			<span class="focus-input100" data-symbol="&#xf206;"></span>
			
		</div>
		<div class=" validate-input m-b-23" data-validate = "Username is reauired">
			<a href="{{route('recodepas',['id'=>$id])}}">Chưa nhận được mã</a>
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