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
		.label-contact{
			color: red;
			width: 50%;
		}
	</style>
@endsection
@section('content')
	<section class="content pb-5 pt-5">
		<div class="container">
			<div class="row  pl-3 pb-3 link-li">
				<a href="{{route('home')}}" class="link-a"> Trang chủ / </a>
				<a href="{{route('payment')}}" class="link-a">Thanh Toán</a>
			</div>

			<div class="row .over-fl">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Color</th>
				      <th scope="col">Size</th>
				      <th scope="col">Image</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Price</th>
				      <th scope="col">Money</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php 
				  	$i = 1;
				  	$total = 0;
				  	@endphp
				    @foreach($cart as $key =>$item)
				    	<tr>
				    		<td>{{$key}}</td>
				    		<td>{{$item->name}}</td>
				    		<td>
				    			{{$item->options['color']}}
				    		</td>
				    		<td>
				    			{{$item->options['size']}}
				    		</td>
				    		<td>
				    			<img src="{{URL::to('/')}}/upload/image/{{$item->options['images'][0]}}" width="100px" height="100px"  alt="">
				    		</td>

				    		<td>
				    			<input type="number" id="qty_{{$key}}" value="{{$item->qty}}" readonly="readonly">
				    			
				    		</td>

				    		<td>
				    			{{ (int)($item->price - (($item->price * $item->options['sale'])/100)) }}.000VNĐ	
				    		</td>

				    		<td>
				    			<p>
				    				{{ (int)(($item->price - (($item->price * $item->options['sale'])/100)) * $item->qty)}}.000VNĐ
				    			</p>
				    			
				    		</td>
				    		@php
				    			$i++;
				    			$total += (int)($item->price - (($item->price * $item->options['sale'])/100)) * $item->qty;
				    		@endphp
				    	</tr>
				    @endforeach
				  </tbody>
				  <tfoot>
				  	<tr>
				  		<td colspan="7">
				  			<p class="text-danger">Total</p>
				  		</td>
				  		<td>
				  			{{ number_format($total)}}.000VNĐ 
				  		</td>
				  		
				  	</tr>
				  	<tr>

				  		
				  			<form action="{{route('paymentOrder',['id'=>Auth::user()->id])}}" method="POST">
				  				@csrf
				  				<td colspan="4">
				  					<div class="form-group">
					  					<label for="address" class="label-contact" >Ghi Chú :</label>
										<textarea class="form-control" name="note" id="address"></textarea>
									</div>
				  				</td>
				  				<td colspan="4">
				  					<button class="btn btn-block conf btn-success mt-5">Xác Nhận</button>
				  				</td>
				  				
				  			</form>
				  		
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
@push('js')
	<script type="text/javascript">
		$('conf').click(function(){


		if(Auth::user()->address == null || Auth::user()->address == null ){
			window.location.replace('{{route('updateProfile')}}');
		}
	});
	</script>
@endpush