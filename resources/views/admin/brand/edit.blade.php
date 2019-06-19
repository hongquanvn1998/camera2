@extends('admin.base')

@section('content')
	<div class="content pt-4">
			<form action="{{route('admin.handleEditBrand',['id'=>$info['id']])}}" method="post">
				@csrf

				<div class="form-group">
					<label for="name">Name Brand</label>
					<input type="text" class="form-control" value="{{$info['name_brand']}}" name="name" id="name">
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" value="{{$info['address']}}" name="address" id="address">
				</div>

				<div class="form-group">
					<h4 class="text-danger">Status</h4>
				      	<div class="form-check">
						  <input class="form-check-input" type="radio" name="status" id="status_1" value="1" {{($info['status'] = 1) ? 'checked' : ''}}>
						  <label class="form-check-label" for="status_1">
						    1
						  </label>
						</div>


						<div class="form-check">
							  <input class="form-check-input" type="radio" name="status" id="status_2" value="0" {{($info['status'] === 0) ? 'checked' : ''}}>
							  <label class="form-check-label" for="status_2">
							    0
							  </label>
						</div>
				</div>
				
				<div class="form-group">
					<label for="description">Mô tả</label>

					<input type="text" class="form-control" value="{{$info['description']}}" name="description" id="description">
				</div>
				
				<button class="btn btn-block  btn-primary mt-5">UPDATE</button>
			</form>
	</div>
@endsection