@extends('admin.bill.base')

@section('content')
	<div class="container-fuild h-100">
		<div class="tttt">

			<div class="row pt-4">
				<div class="col-6">
					<h6 class="pl-4">Hoàng Quân Shop</h6>
					<h6 class="pl-4">Địa chỉ : 141 Chiến Thắng - Hà Đông - Hà Nội</h6>
					<h6 class="pl-4">Điện thoại : 0972365339</h6>
				</div>

				<div class="col-6">
					<h6 class="float-right pr-5 pt-3">Ngày: {{$date}}</h6>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<h2 class="text-center">Thông tin đơn hàng</h2>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<h6 class="pl-4">Người đặt hàng : {{$name}}</h6>
					<h6 class="pl-4">Địa chỉ : {{$address}}</h6>
					<h6 class="pl-4">Số điện thoại : {{$phone}}</h6>
				</div>
			</div>
			<div class="row pt-5">
				<table class="tab">
					<thead>
						<tr>
							<td>Tên sản phẩm</td>
							<td>Số lượng</td>
							<td>Size</td>
							<td>Color</td>
							<td>Giá tiền</td>	
							
						</tr>
					</thead>
					<tbody>
						@foreach($product as $k =>$item)
						<tr>
							<td>{{$item['name']}}</td>
							<td>{{$item['qty']}}</td>
							<td>{{$item['options']['size']}}</td>
							<td>{{$item['options']['color']}}</td>
							<td>
								{{ 
									(int)($item['price'] - ($item['price'] * ( $item['options']['sale'] / 100 ) ) ) 
								}}.000 VNĐ
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="row">
				<div class="col ">
					<h6 class="pt-5 pl-4">Phương thức thanh toán : Tiền mặt</h6>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<a href="{{route('admin.pdf',['id'=>$id])}}" class="pt-3 pr-5 float-right">Tải xuống</a>
				</div>
			</div>
		</div>
	</div>
@endsection
