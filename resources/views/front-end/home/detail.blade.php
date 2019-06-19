@extends('front-end.base')
@section('style')
	<style>
	.product-as{
		position: relative;
	}
	.product-as h3{
		color:#7dc30d;
	}
	.product-as span{
		height: 3px;
	    background: #333333;
	    width: 80%;
	    left: 24%;
	    position: absolute;
	    top: 75%;
	}
	span.color{
		width: 12px;
		height: 12px;
		position: absolute;
		top: 30%;
		left: 80%;

	}
	label.rel-color{
		position: relative;

	}
	span.cost{
		text-decoration: line-through;
	}
	a.link-a{
			color: #a9abad;
			text-decoration: none;
		}
		a.link-a:hover{
			color:#2ae50d;
		}
	@media(min-width: 360px) and (max-width: 480px){
	
		.mg-t{
			margin-top: 15px;
		}
		.label-contact{
			color: red;
			width: 50%;
		}
		.product-as span{
			top: 75%;
			width: 40%;
			left: 63%;
		}
	}
	@media(min-width: 481px) and (max-width: 767px){
	
		.mg-t{
			margin-top: 15px;
		}
		.label-contact{
			color: red;
			width: 50%;
		}
		.product-as span{
			top: 75%;
			width: 25%;
			left: 75%;
		}
		
	}
	</style>
@endsection
@section('content')
	<section class="content pt-5 mb-5">
				<div class="container">
					
					<div class="row pt-2 pl-3 pb-3 link-li">
						<a href="{{route('home')}}" class="link-a"> Trang chủ / </a>
						@foreach($namePrCate as $nPcate)
							<a href="{{route('allProduct',['id'=>$nPcate->id])}}" class="link-a"> {{$nPcate->name_parent_categories}} / </a>
						@endforeach
						<a href="{{route('cateProduct',['id'=>$namecate['id']])}}" class="link-a"> {{$namecate['name_categories']}}/ </a>

						<a href="{{route('detail',['id'=>$info['id']])}}" class="link-a">{{$info['name']}}</a>
					</div>
					<div class="row ">
						<div class="col-md-6 col-12 col-lg-6 col-xl-6">
					        <div class="show" href="{{ URL::to('/') }}/upload/image/{{$infoImage[0]}}">
					       
					          	<img src="{{URL::to('')}}/upload/image/{{ $infoImage[0] }}" id="show-img">
					        </div>
						      <div class="small-img">
						        <img src="{{asset('img/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
						        <div class="small-container">
							          <div id="small-img-roll">
							          	@foreach($infoImage as $item)
								            <img src="{{URL::to('/')}}/upload/image/{{$item}}" alt="" class="show-small-img">
								        @endforeach
							          </div>
						        </div>
						        <img src="{{asset('img/online_icon_right@2x.png')}}" class="icon-right" alt="" id="next-img">
						      </div>
						</div>
						<div class="col-md-6 col-12 mg-t">
							<h3>{{$info['name']}}</h3>
							<p class="pt-2">Giá : 
								<span class="cost pr-4">{{$info['price']}}.000 VNĐ</span>
								<span>{{ (int)($info['price']-($info['price'] * ($info['sale_off']/100))) }}.000 VNĐ</span></p>
							<p>Tình trạng :
								@if($info['status']===1)
									<span class="stt">Còn hàng</span>
									@else
									<span class="stt">Hết hàng</span>
								@endif
							</p>
							<p>Mô tả : 
								{{$info['description']}}
							</p>
						<div class="row">
						
								<div class="col-12 col-md-6 colorNullNone">
								@if($color)
									<p>Màu Sắc :</p>
								
									@foreach($color as $key =>$item)
										<label for="color_{{$key}}" class="rel-color pr-5 label-contact" >
										<input type="radio" id="color_{{$key}}" name="inlineRadioOptionsColor"  value="{{$item}}">
										<span class="color pr-2">{{$item}} 
										</span>
										</label>
										<br>
									@endforeach
								@else
									<p></p>
								@endif
								</div>
							
							<div class="col-12 col-md-6">
								<label for="qty" class="label-contact" >Số lượng</label>
								<select name="" id="qtyPd">
									@for($i= 1 ; $i < $info['quantity'] ; $i++)
									<option value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							</div>

							{{-- <div class="row pb-5 sizeNullNone">
								<div class="col-12 col-md-6">
									@if($infoSize)
										<p>Size:</p>
									
										@foreach($infoSize as $key)
											<label for="size_{{$key}}" class="rel-color pr-5 label-contact" >
											<input type="radio" id="size_{{$key}}" name="inlineRadioOptionsSize"  value="{{$key}}">
											<span class="color">{{$key}}</span>
											</label>
											<br>
										@endforeach
									@else
										<p></p>
									@endif
								</div>
								
							
							</div> --}}
							
							<button class="btn btn-block  btn-success btn-add mr-5 mt-5" id="btn-ca">Thêm vào giỏ hàng</button>	
								
						</div>
					</div>
					<div class="row product-as pt-5">
						<h3>Sản Phẩm Tương Tự</h3>
						<span class="phone-none"></span>
					</div>
					<div class="row product-main">
						<div class="container-fluid">
							<div class="row">
								@foreach($infoToo as $key =>$item)
									<div class="col-12 col-sm-4 sha-dow">
										<div class="product-size">
											<div class="img-product">
												<a href="{{route('detail',['id' => $item['id']])}}" class="a-click-moblie">
													<img src="{{URL::to('/')}}/upload/image/{{$item['url_image'][0]}}" alt="">
												</a>
												<span>{{$item['sale_off']}}%</span>
											</div>
											<div class="profile-product">
												<a href="javascript:void(0)">
													<p class="text-center"> {{$item['name']}}</p>
												</a>

												<p class="text-center profile-product-p" >{{$item['price']}}.000 VNĐ</p>
											</div>
											<div class="go-to-product">
												<a href="{{route('detail',['id' => $item['id']])}}">
													<i class="fa fa-shopping-cart"></i>
												</a>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
		<script type="text/javascript">

		 

	</script>
@endsection

@push('js')
	<script type="text/javascript">
		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-36251023-1']);
		  _gaq.push(['_setDomainName', 'jqueryscript.net']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script>

	<script type="text/javascript">
		// $.ajaxSetup({
		//     headers: {
		// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 	    }
		// });
		$.ajaxSetup({
		    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
		});

	
			$('.btn-add').click(function(){
				let self = $(this);
		  		let IdPd = "{{$info['id']}}";
		  		let qty = $('#qtyPd').val();
		  		let idColor  = $('input[name="inlineRadioOptionsColor"]:checked').next().text().trim();
		  		let idSize  = $('input[name="inlineRadioOptionsSize"]:checked').next().text().trim();
		  		let ttSp = $('.stt').text().trim();
		  		@if(Auth::user())
		  			if(ttSp === 'Hết hàng'){
		  				alert('Xin lỗi sản phẩm đã hết hàng . Quý khách vui lòng chọn sản phẩm khác');
		  			}else{
			  			if($.isNumeric(IdPd)){
				  			$.ajax({
				  				headers: {
							          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
				  				url: "{{ route('Cart') }}",
				  				type: "POST" ,
				  				data:{id:IdPd,qty:qty,color:idColor,size:idSize},
				  				beforeSend:function(){
				  					self.text('Đang thêm vào giỏ hàng...');
				  				},
				  				success: function(result){
									self.text('Thêm thành công');
									result = $.trim(result);
									if(result === 'OK') {
										alert('Thêm vào giỏ hàng thành công');
									} else {
										alert('Lỗi khi thêm vào giỏ hàng');
									}
								}
				  			})
			  			}
			  		}
			  	@else
			  		alert('Bạn cần phải đăng nhập để có thể mua hàng');
			  	@endif

			});

	</script>
	{{-- <script type="text/javascript">
		$(document).ready(function(){
			if($('.sizeNull').val="Sản phẩm này không có size"){
				$('.sizeNullNone').css('display','none');
			}
			if($('.colorNull')){
				$('.colorNullNone').css('display','none');
			}
			
		});
	</script> --}}
	<script type="text/javascript" src="{{asset('js/scroll.js')}}"></script>
@endpush
