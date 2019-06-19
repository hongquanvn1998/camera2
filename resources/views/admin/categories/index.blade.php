@extends('admin.base')

@section('style')
@endsection

@section('content')
	<div class="content">
			<table class="table mt-5" width="100%">
			  	<thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Status</th>
				      <th scope="col">Id_Parent</th>
				      <th scope="col">Description</th>
				      <th scope="col" >
						<a href="{{route('admin.addCategories')}}" class="btn btn-danger ml-5">ADD</a>
				      </th>
				    </tr>
			  	</thead>
				<tbody>
				    @foreach($info as $key =>$item)
						<tr id="row_{{$item['id']}}">
							<td>{{$item['id']}}</td>
							<td>{{$item['name_categories']}}</td>
							<td>{{$item['status']}}</td>
							<td>{{$item['id_parent']}}</td>
							<td>
								<button class="btn btn-danger btn-delete" id="{{$item['id']}}">DELETE</button>
							</td>
							<td>
								<a href="{{route('admin.editCategories',['id'=>$item['id']])}}" class="btn btn-danger">EDIT</a>
							</td>
						</tr>
				    @endforeach
				</tbody>
			</table>
			<div class="row">
			   {{ $link->appends(request()->query())->links() }}
			</div>
	</div>
@endsection
@section('javascript')
	<script type="text/javascript">
		$.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });
	    $(function(){
	    	$('.btn-delete').click(function(){
	    		let self = $(this);

	    		let idBrand = self.attr('id');
	    		if($.isNumeric(idBrand)){
	    			$.ajax({
	    				url:"{{route('admin.deleteCategories')}}",
	    				type:"POST",
	    				data:{id:idBrand},
	    				beforeSend:function(){
	    					self.text('Loading');
	    				},
	    				success:function(result){
	    				  self.text('delete');
			              result = $.trim(result);
			              if(result==="OK"){
			                alert('Delete Success');
			                $('#row_'+idBrand).hide();
			              }else{
			                alert("delete fail");
			              }
			              return false;
			            }

	    			})
	    		}
	    });
	    });
	</script>
@endsection