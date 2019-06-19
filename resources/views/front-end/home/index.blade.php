@extends('front-end.base')
@section('style')
	<style>
		.hiddenUl{
			display: block !important;
		}
		.i-hidden{
			display: none;
		}
	</style>
@endsection
@section('content')
<!-- Content -->
	<section class="content">
		<div class="container">
					<div class="row slide">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 mobile-none tablet-none" >
						</div>
						<div class="col-12 col-sm-12 col-md-8 col-lg-8 content-slide col-md-tablet">
							<div class="cacslide" >
								<ul>
									<li class="kichhoat">
										<div class="mot-slide">
											<img src="{{asset('img/slideshow_1.jpg')}}" alt="">
										</div>
									</li>
									<li>
										<div class="mot-slide">
											<img src="{{asset('img/slideshow_2.jpg')}}" alt="">
										</div>
									</li>
									<li>
										<div class="mot-slide">
											<img src="{{asset('img/slideshow_3.jpg')}}" alt="">
										</div>	
									</li>
								</ul>
							</div>
							<div class="chuyenslide">
								<ul>
									<li class="active">
										1
									</li>
									<li>2</li>
									<li>3</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row product-content">
						<h3>Sản Phẩm Mới</h3>
						<span></span>
					</div>
					
					<div class="row product-main">
						<div class="container-fluid">
							<div class="row"> 
								@foreach($productNew as $key =>$item)
									<div class="col-12 col-sm-4 col-md-3 col-sm-p sha-dow">
										<div class="product-size">
											<div class="img-product">
												<a href="{{route('detail',['id' => $item['id']])}}" class="a-click-moblie"><img src="upload/image/{{$item['url_image'][0]}}" alt=""></a>
												<span>{{$item['sale_off']}}%</span>
											</div>
											<div class="profile-product">
												<a href="javascript:void(0)">
													<p class="text-center"> {{$item['name']}}</p>
												</a>

												<p class="text-center profile-product-p" > {{$item['price']}}.000 VNĐ</p>
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
					

					<div class="row product-content pt-3">
						<h3>Sản Phẩm Hot</h3>
						<span></span>
					</div>
						
					
					<div class="row product-main">
						<div class="container-fluid">
							<div class="row">
									@foreach($productHot as $key =>$item)
									<div class="col-12  col-sm-4 sha-dow col-md-3">
										<div class="product-size">
											<div class="img-product">
												<a href="{{route('detail',['id'=>$item['id']])}}" class="a-click-moblie">
													<img src="upload/image/{{$item['url_image'][0]}}" alt="">
												</a>
												<span>{{$item['sale_off']}}%</span>
											</div>
											<div class="profile-product">
												<a href="javascript:void(0)">
													<p class="text-center"> {{$item['name']}}</p>
												</a>

												<p class="text-center profile-product-p" > {{$item['price']}}.000 VNĐ</p>
											</div>
											<div class="go-to-product">
												<a href="#">
													<i class="fa fa-shopping-cart icon-show-cart"></i>
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
<!-- End content -->
@endsection

@section('javascript')
	<script type="text/javascript">
	document.addEventListener("DOMContentLoaded",function(){
    var nut = document.querySelectorAll('.chuyenslide ul li');
    var slide = document.querySelectorAll('.cacslide ul li');
    var thoigian = setInterval(function(){chuyenslide()},3000);
    // console.log(nut);
    var tontai = true;
    for(var i = 0 ; i<nut.length;i++){
        nut[i].onclick = function(){
            clearInterval(thoigian);
            for(var j= 0; j<nut.length;j++){
                nut[j].classList.remove('active');
            }
            
            this.classList.add('active');
        
            var nutkichhoat= this;
            for(var u = 0 ;nutkichhoat=nutkichhoat.previousElementSibling;u++){
            }
            console.log(u);

            for(var j = 0 ;j<slide.length;j++){
                slide[j].classList.remove('kichhoat');
                // for(var i = 0 ; i<nutkichhoat[i])
                slide[u].classList.add('kichhoat');
            }
        }
    }
    function chuyenslide(){
            var vtrislide = 0;
            var slidehientai = document.querySelector('.cacslide ul li.kichhoat');
            for (vtrislide = 0; slidehientai= slidehientai.previousElementSibling; vtrislide++) {
            }
            if(vtrislide<(slide.length-1)){
                for(var i = 0 ; i<slide.length;i++){
                    slide[i].classList.remove('kichhoat');  
                    nut[i].classList.remove('active');  
                }
                 slide[vtrislide].nextElementSibling.classList.add('kichhoat');
                 nut[vtrislide].nextElementSibling.classList.add('active');
            }
            else{
                for(var i = 0 ; i<slide.length;i++){
                    slide[i].classList.remove('kichhoat');  
                    nut[i].classList.remove('active');  
                }
                 slide[0].classList.add('kichhoat');
                 nut[0].classList.add('active');
            }
    }

    var soluong = document.querySelectorAll('.option-content-left ul li select option');
    soluong.onclick=function(){
        for (var i = 0; i < soluong.length; i++) {
            console.log(soluong[i]);
        }
    };
},false);

</script>
@endsection

@push('js')
	<script type="text/javascript" src="{{asset('js/scroll.js')}}"></script>
@endpush