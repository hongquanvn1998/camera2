@extends('front-end.base')
@section('style')
	<style type="text/css">
		a.link-a{
			color: #a9abad;
			text-decoration: none;
		}
		a.link-a:hover{
			color:#2ae50d;
		}
		.label-contact{
			color: red;
		}
	</style>
@endsection
@section('content')
	<section class="content pb-5 pt-5">
				<div class="container">
					<div class="row pt-2 pl-3 pb-3 link-li">
						<a href="{{route('home')}}" class="link-a"> Trang chủ / </a>
						<a href="{{route('contact')}}" class="link-a"> Liên hệ</a>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<h3 class="text-danger pr-5">Thông Tin Liên Hệ</h3>
							</div>
							<div class="row">
								<h5 class="pl-3">Trụ sở chính:</h4>
							</div>
							<div class="row">
								<p class="pl-3">Số 43 Hoàng Diệu , Ba Đình , Hà Nội</p>
							</div>
							<div class="row">
								<h5 class="pl-3">Số điện thoại:</h5>
							</div>
							<div class="row">
								<p class="pl-3">0972365339</p>
							</div>
							<div class="row">
								<h5 class="pl-3">Email:</h5>
							</div>
							<div class="row">
								<p class="pl-3">ThanhBinhkma27@gmail.com</p>
							</div>
							<div class="row pt-5">
								<h3 class="text-danger pr-5">Gửi Liên Hệ Về Hoàng Quân Shop</h3>
							</div>
							<form method="post" action="{{route('sentContact')}}">
								@csrf
							  <div class="form-group">
							    <label for="name" class="label-contact">Họ tên:</label>
							    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Họ và tên" name="name">
							  </div>
							  

							  <div class="form-group">
							    <label for="name" class="label-contact">Email:</label>
							    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Email" name="email">
							  </div>

							  <div class="form-group">
							    <label for="name" class="label-contact">Số điện thoại:</label>
							    <input type="number" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Số điện thoại:" name="phone">
							  </div>

							  <div class="form-group">
							    <label for="name" class="label-contact">Thông Điệp :</label>
							    <textarea class="form-control" name="message"></textarea>
							  </div>
							  
							  <button type="submit" class="btn btn-primary">Send</button>
							</form>
						</div>
						<div class="col-12 col-md-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.897575164215!2d105.83245601458785!3d21.03678389288093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aba15ec15d17%3A0x620e85c2cfe14d4c!2zTMSDbmcgQ2jhu6cgVOG7i2NoIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1556867764531!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</section>
@endsection
