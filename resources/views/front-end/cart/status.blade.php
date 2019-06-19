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
		.over-fl{
			overflow: auto;
		}
	</style>
@endsection
@section('content')
	<section class="content pb-5 pt-5">
			<div class="container">
				<div class="row  pl-3 pb-3 link-li">
					<a href="{{route('home')}}" class="link-a"> Trang chủ / </a>
					<a href="{{route('showCart')}}" class="link-a">Giỏ hàng</a>
				</div>

				<div class="row over-fl">
					<table class="table">
					  <thead>
					    <tr>
					    <th scope="col">Hình ảnh</th>
					      <th scope="col">Tên sản phẩm</th>
					      <th scope="col">Màu sắc</th>
					      <th scope="col">Kích thước</th>
					      
					      <th scope="col">Số lượng</th>
					      <th scope="col">Giá tiền</th>
						  <th scope="col"></th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($bbbe as $key=>$item)
					    	<tr>
					    		<td>
					    		
					    		</td>
					    		<td>{{$item->name}}</td>
					    		<td>
					    			{{$item->option['color']}}
					    		</td>
					    		<td>
					    			{{$item->options['size']}}
					    		</td>
					    		

					    		<td>
					    			<input type="number" id="qty_{{$key}}" value="{{$item->qty}}">
					    			
					    		</td>


					    		<td>
					    			<p>
					    				{{( (int)($item->price - (($item->price * $item->options['sale'])/100)) )* $item->qty}}.000VNĐ
					    			</p>
					    			
					    		</td>
					    		<td>
					    			<button class="btn btn-danger delete-cart" id="{{$key}}">X</button>

					    			<button class="btn btn-success update-cart" id="{{$key}}">+</button>
					    		</td>
					    	</tr>
					    @endforeach
					  </tbody>
					  <tfoot>
					  	<tr>
					  		<td colspan="5">
					  			
					  		</td>
					  		<td>
					  			<a href="{{route('home')}}" class="btn btn-primary ">Mua sắm</a>
					  		</td>
					  		<td>
					  			<a href="{{route('payment')}}" class="btn btn-primary">Thanh toán</a>
					  		</td>
					  	</tr>
					  </tfoot>
					</table>
				</div>
			</div>
	</section>
@endsection
@section('javascript')
	<script type="text/javascript" src="{{asset('js/click-menu.js')}}"></script>
@endsection
