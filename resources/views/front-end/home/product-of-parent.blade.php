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
		
	</style>
@endsection
@section('content')
	<section class="content pt-4">
			<div class="container pt-3">
						<div class="row  pl-3 pb-3 link-li">
							<a href="{{route('home')}}" class="link-a"> Trang chủ / </a>
							@foreach($NameParentXX as $nPP)
								<a href="{{route('allProduct',['id'=>$nPP->id])}}" class=" link-a">{{$nPP->name_parent_categories}}</a>
							@endforeach
							
						</div>
						<div class="row product-main">
							<div class="container-fluid">
								<div class="row">
										@foreach($productInParent as $pIP)
									
										<div class="col-12 col-sm-4 sha-dow">

											<div class="product-size">
												<div class="img-product">
													<a href="{{route('detail',['id'=>$pIP['id']])}}" class="a-click-moblie"><img src="{{URL::to('/')}}/upload/image/{{$pIP['url_image'][0]}}" alt=""></a>
													<span>{{$pIP['sale_off']}}%</span>
												</div>
												<div class="profile-product">
													<a href="javascript:void(0)">
														<p class="text-center">{{$pIP['name']}}</p>
													</a>

													<p class="text-center profile-product-p" > {{$pIP['price']}}.000 VNĐ</p>
												</div>
												<div class="go-to-product">
													<a href="{{route('detail',['id'=>$pIP['id']])}}">
														<i class="fa fa-shopping-cart"></i>
													</a>
												</div>
											</div>
											
										</div>
										@endforeach
									
										
								</div>

							</div>
						</div>
						<div class="row">
						   {{ $link->appends(request()->query())->links() }}
						</div>

					</div>
	</section>
@endsection
@push('js')
	<script type="text/javascript" src="{{asset('js/scroll.js')}}"></script>
@endpush