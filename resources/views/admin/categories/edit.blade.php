@extends('admin.base')

@section('content')
	<div class="content pt-4">
			<form action="{{route('admin.handleEditCategories',['id'=>$info['id']])}}" method="post">
				@csrf

				<div class="form-group">
					<label for="name">Name Categories</label>
					<input type="text" class="form-control" value="{{$info['name_categories']}}" name="name" id="name">
				</div>

				<div class="form-group">
					<label for="parent">ID Parent</label>
					<input type="text" class="form-control" value="{{$info['id_parent']}}" name="parent" id="parent">
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
				
				<button class="btn btn-block  btn-primary mt-5">UPDATE</button>
			</form>
	</div>
@endsection