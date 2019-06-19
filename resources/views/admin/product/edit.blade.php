@extends('admin.base')
	
@section('style')
	<style type="text/css">
		.height-img{
			max-height: 100px;
		}
	</style>
@endsection

@section('content')
	<form action="{{ route('admin.handleEditProducts',['id'=>$info['id']]) }}" method="POST" enctype="multipart/form-data" class="pt-5"> 
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
		<div class="form-row">
			<div class="col-12">
				  <div class="form-row">
					    <div class="form-group col-md-12 col-12">
					      <h4 class="text-danger">Name</h4>
					      <input type="text"
					      		 class="form-control"
					      		 id="nameProdcuts" 
					      		 placeholder="name" 
					      		 name="nameProdcuts"
								 value="{{ $info['name'] }}" 	
					      		 >
					    </div>
					    <div class="form-group col-md-9 col-sm-12 col-12 float-left">
					    	<h4 class="text-danger">Categories</h4>
					    	@foreach($cates as $key => $item)
					    		<div class="col-12 col-sm-12 col-md-3 float-left">
							      	<label for="categories_{{$item['id']}}">{{ $item['name_categories'] }}</label>
							      	<input type="radio" 
							      	class="float-right mr-5" 
							      	name="cate" 
							      	value="{{ $item['id'] }}"
							      	id="categories_{{$item['id']}}" 
							      	multiple
							      	{{ $item['id'] === $info['categories_id'] ? 'checked' : ''}} >
							    </div>
						    @endforeach
					      	
					    </div>

					    <div class="form-group col-md-3 col-12 col-sm-12 float-left">
						    <h4 class="text-danger">Brand</h4>
						    <select class="form-control" name="brands">
							      		@foreach($brand as $key =>$item)
									    	<option 
									    	value="{{ $item['id'] }}"
									    	 {{ $item['id'] == $info['brand_id'] ? 'selected' : ''}}>{{$item['name_brand']}}</option>
									    @endforeach
							</select>
						 </div>
				  <div class="form-group col-md-4 col-12 float-left">
				  	<h4 class="text-danger">Color</h4>
				  	@if($info['color'])
				  		<input type="text" value="{{$info['color']}}" name="color">
				  	@else
				  		<input type="text" name="color">
				  	@endif
				  </div>
				 


			    <div class="form-group col-12 col-md-4">
			      <h4 class="text-danger">Price</h4>
			      <input type="text" class="form-control" id="Price" name="price" value="{{ $info['price'] }}">
			    </div>


				    <div class="form-group col-12 col-md-4">
				      <h4 class="text-danger">Quantity</h4>
				      <input type="text" class="form-control" id="Quality" name="qty" value="{{ $info['quantity'] }}">
				    </div>


				    <div class="form-group col-12 col-md-4">
				      <h4 class="text-danger">Sale Off</h4>
				      <input type="text" class="form-control" id="sale" name="saleOff" value="{{ $info['sale_off'] }}">
				    </div>

				    <div class="form-group col-12 col-md-4">
				      <h4 class="text-danger">Description</h4>
				      <br>
				      <textarea name="description" id="" cols="30" rows="10" >{{ $info['description'] }}</textarea>
				     
				    </div>

					
					<div class="form-group col-12 col-md-3">
					    <h4 class="text-danger">Image</h4>

	   					 <input type="file" class="form-control-file" id="image" name="images[]" multiple="multiple">

				  	</div>
					<div class="form-group col-12 col-md-5 pl-5">
						@foreach($infoImage as $key =>$item)
							<img src="{{ URL::to('/') }}/upload/image/{{ $item }}" alt="" class="height-img">
						@endforeach
					</div>
				    <div class="form-group col-12 col-md-4 pl-5 ">
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
				   

				    <div class="form-group col-12 col-md-4 pl-5 ">
				      	<h4 class="text-danger">Highlight</h4>
				      	<div class="form-check">
						  <input class="form-check-input" type="radio" name="highlight" id="highlight_1" value="1" {{($info['highlight'] === 1) ? 'checked' : ''}}>
						  <label class="form-check-label" for="highlight_1">
						    1
						  </label>
						</div>


						<div class="form-check">
							  <input class="form-check-input" type="radio" name="highlight" id="highlight_2" value="0" {{($info['highlight'] === 0) ? 'checked' : ''}} >
							  <label class="form-check-label" for="highlight_2">
							    0
							  </label>
						</div>
				    </div>
				  
				  
				</div>
			<div class="col-12 ">
				<button type="submit" class="btn btn-danger btn-add btn-block">UPDATE</button>
			</div>
	</div>
		</form>
@endsection

@section('script')

@endsection