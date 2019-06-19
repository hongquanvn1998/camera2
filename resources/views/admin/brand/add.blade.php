@extends('admin.base')

@section('style')
@endsection

@section('content')
	<form action="{{route('admin.handleAddBrand')}}" class="pt-5" method="POST">
		@csrf
		<div class="form-row">
			<div class="col-md-12">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="address">Address</label>
						<input type="text" id="address" name="address" class="form-control">
					</div>
				</div>


				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="description">Description</label>
						<input type="text" id="description" name="description" class="form-control">
					</div>
				</div>

				<div class="form-row">	
					<div class="form-group col-md-12 pl-4">
							      	<h4 class="pl-2 text-danger">Status</h4>
							      	<div class="form-check">
									  <input class="form-check-input" type="radio" name="status" id="status_1" value="1">
									  <label class="form-check-label" for="status_1">
									    1
									  </label>
									</div>


									<div class="form-check">
										  <input class="form-check-input" type="radio" name="status" id="status_2" value="0" >
										  <label class="form-check-label" for="status_2">
										    0
										  </label>
									</div>
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-primary btn-block">ADD</button>
	</form>
@endsection