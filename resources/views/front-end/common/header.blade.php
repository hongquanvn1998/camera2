<header>
	<div class="lienhe">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-6 col-5 col-xs-5 lienhe-left">
					<p><i class="fa fa-phone phone-none" aria-hidden="true"></i>Hotline:0972365339</p>
				</div>
				<div class="col-md-5 col-sm-6 col-7 col-xs-7 lienhe-right">
					<ul>
						<li>
					@if(Auth::check())
                    @if(Auth::user()->role === 0)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="{{route('showCart')}}">Giỏ hàng</a>
                                <a class="dropdown-item" href="{{route('donhang',['id'=>Auth::user()->id])}}">Đơn hàng</a>
                                <a class="dropdown-item" href="{{-- {{route('showCart')}} --}}">Hồ sơ</a>
                                <a class="dropdown-item" href="{{route('dangxuat')}}">Đăng xuất</a>
                                
                            </div>
                        </div>
                    @elseif(Auth::user()->role===1)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{Auth::user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="{{route('admin.dashboard')}}">Quản lý</a>
                                <a class="dropdown-item text-danger" href="{{route('dangxuat')}}" >Đăng xuất</a>
                                
                            </div>
                        </div>
                    @endif
                    
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" href="{{route('DangNhap')}}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{route('dangky')}}">Đăng ký</a>
                            
                        </div>
                    </div>
                @endif
            </li>
        </ul>
				</div>
			</div>
		</div>	
	</div>

	<div class="logo">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4 logo-left">
					<a href="{{route('home')}}">
						<img src="{{asset('img/36234.png')}}" width="100%" height="100%" alt="">
					</a>
				</div>
				<div class=" col-12 col-sm-12 col-md-8 logo-right phone-none smart-phone-none">
					<div class="row row-tren tablet-none ">
						<ul>
							<li>
								<i class="fa fa-truck"></i>
								<span>Giao hàng miễn phí</span>
							</li>
							<li>
								<i class="fa fa-money"></i>
								<span>Thanh toán linh hoạt</span>
							</li>
							<li>
								<i class="fa fa-refresh"></i>
								<span>Trả hàng trong 30 ngày</span>
							</li>
						</ul>
					</div>

					<div class="row row-duoi ">
						<form action="{{route('search')}}" method="POST">
							@csrf
							<div class="row">
								@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif

							</div>
							<input type="text" placeholder="Tìm kiếm ..." name="nameSearch">
							<select class="-sm " name="search">
								<option value="0">Tất cả</option>
								@foreach($nameParent as $nPr)
									<option value="{{$nPr['id']}}">{{$nPr['name_parent_categories']}}</option>
								@endforeach>
							</select>
							<button><i class="fa fa-search"></i></button>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div class="header">
		<div class="container">
			<ul>
				<li class="hien-menu-header hover-color menu-cha postt">

				    <nav class="menu-drop-left lap-none mobile-show tablet-show smart-phone-show">
			            <div>
			                  <i class="fa fa-align-justify"></i>
			            </div>

			            <ul class="ul-drop-left ul-hihi-left">
							@foreach($nameParent as $nPr)
			                  <li><a href="javascript:void(0)">{{$nPr['name_parent_categories']}} <i class="fa fa-sort-desc"></i></a>

			                        <ul class="ul-drop-left sub-ul-drop-left">
			                        	<li><a href="{{route('allProduct',['id'=>$nPr['id']]) }}">{{$nPr['name_parent_categories']}}</a></li>
			                        	@foreach($nPr->categories as $k)
			                              <li><a href="{{route('cateProduct',['id'=>$k->id])}}">{{$k->name_categories}}</a></li>
			                            @endforeach
			                        </ul>
			                  </li>
			                @endforeach
			            </ul>
			      </nav>
					
					<p class="mb-0 hover-cusor phone-none smart-phone-none tablet-none">Danh mục sản phẩm 
						<i class="fa fa-caret-down i-hidden" aria-hidden="true"></i>
					</p>
					<ul class="postt hiddenUl phone-none smart-phone-none ">
						@foreach($nameParent as $nPr)
								<li class="sub-menu-li hover-li bg-li phone-none smart-phone-none tablet-none" id="hover-hien">
									<a href="{{route('allProduct',['id'=>$nPr['id']]) }}" class="sub-menu-a">
										{{$nPr['name_parent_categories']}}
									</a>
										<ul class="sub-menu-ul phone-none smart-phone-none" id="ul_{{$nPr['id']}}">
											@foreach($nPr->categories as $k)
												<li class="sub-menu-li hover-li">
													<a href="{{route('cateProduct',['id'=>$k->id])}}" class="sub-menu-a">{{$k->name_categories}}</a>
												</li>
											@endforeach
											
										</ul>
								</li>
						@endforeach
					</ul>
				</li>
				
				<li class="click-color-menu hover-color menu-cha phone-none smart-phone-none tablet-none jq-one">
					<a href="{{route('home')}}">Trang chủ</a>
				</li>

				<li class="hover-color menu-cha phone-none smart-phone-none tablet-none jq-two">
					<a href="{{route('product')}}">Sản phẩm</a>
				</li>

				

				<li class="hover-color menu-cha phone-none smart-phone-none tablet-none jq-three">
					<a href="{{route('introduce')}}">Giới thiệu</a>
				</li>

				<li class="hover-color menu-cha postt jq-four">
					<nav class="menu-drop-right lap-none tablet-show mobile-show smart-phone-show">
			            <div>
			                  <i class="fa fa-align-justify"></i>
			            </div>

			            <ul class="ul-drop-right ul-hihi-right">
		                  	<li><a href="{{route('home')}}">Trang chủ</a></li>
                            <li><a href="{{route('product')}}">Sản phẩm</a></li>
                          
                            <li><a href="{{route('introduce')}}">Giới thiệu</a></li>
                            <li><a href="{{route('contact')}}" >Liên hệ</a></li>
			            </ul>
			      </nav>
				
					<a href="{{route('contact')}}" class="phone-none smart-phone-none tablet-none">Liên hệ</a>
				</li>
			</ul>

		</div>
	</div>
</header>