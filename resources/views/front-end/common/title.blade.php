
	<div class="lienhe">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-6 col-5 col-xs-5 lienhe-left">
				<p><i class="fa fa-phone phone-none" aria-hidden="true"></i>Hotline:0972365339</p>
			</div>
			<div class="col-md-5 col-sm-6 col-7 col-xs-7 lienhe-right">
				<ul class="ul-cha">
					{{-- <li>
						<a href="#">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>Kiểm tra đơn hàng
						</a>
					</li> --}}
					<li class="-sm li-cha">
						@if($hihi){
							{{$hihi->name}}
							<ul class="ul-con"> 
								<li class="li-con">
									<a href="#">Giỏ hàng</a>
								</li>

								<li>
									<a href="#">Đơn hàng</a>
								</li>
								<li>
									<a href="#">Thay đổi thông tin</a>
								</li><li>
									<a href="#">Đăng xuất</a>
								</li>
							</ul>
						}@else{
							Tài khoản
							<i class="fa fa-chevron-down"></i>
							<ul class="ul-con">
								<li class="li-con">
									<a href="{{route('DangNhap')}}">Đăng nhập</a>
								</li>
								<li class="li-con">
									<a href="{{route('dangky')}}">Đăng ký</a>
								</li>
							</ul>
						}
						@endif	
					</li>
				</ul>
			</div>
		</div>
	</div>	
	</div>