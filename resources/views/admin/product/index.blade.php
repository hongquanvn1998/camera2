@extends('admin.base')

@section('style')
  <style>
    ul.pagination{
    margin:auto;
    }
    table.table tbody tr td{
      height: 80px;
      line-height: 80px;
      width: auto;
    }
  </style>
@endsection

@section('content')
<div class="row">
  <table class="table">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Categories</th>
          <th scope="col">Color</th>
          <th scope="col">Brands</th>
          <th scope="col">Price</th>
          <th scope="col">Quanty</th>
          
          <th scope="col">Sale Off</th>
          <th scope="col">New</th>
          <th scope="col">HighLight</th>
          <th scope="col" ><a href="{{route('admin.AddProduct')}}" class="btn btn-danger">ADD</a></th>

        </tr>
    </thead>
    <tbody>
      @foreach($infoPd as $key =>$item)
        <tr id="row_{{ $item['id'] }}">
          <td>{{$item['id']}}</td>
          <td>{{$item['name']}}</td>
          <td>
            <img src="{{URL::to('/')}}/upload/image/{{$item['url_image'][0]}}" alt="" width="100">
          </td>

          <td>
            {{$item['name_categories']}}
          </td>

          <td>
            
          {{$item['color']}}
          </td>

          <td>
            {{$item['name_brand']}}
          </td>
          
           
          
         

          


          <td>{{$item['price']}}</td>
          <td>{{$item['quantity']}}</td>
          <td>{{$item['sale_off']}}</td>
          <td>{{$item['highlight']}}</td>
          
          <td>
            <button class="btn btn-danger btn-delete" id="{{ $item['id'] }}">Delete</button>
          </td>

          <td>
            <a href="{{ route('admin.editProduct',['id'=>$item['id']]) }}" class="btn btn-danger">Edit</a>
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
</div>
<div class="row">
   {{ $link->appends(request()->query())->links() }}
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

        let idPd = self.attr('id');
        alert(idPd);
        if($.isNumeric(idPd)){
          $.ajax({
            
            url: "{{ route('admin.deleteProduct') }}",
            type:"POST",
            data: {id:idPd},
            beforeSend: function(){

              self.text('loading');
            },
            success: function(result){
              self.text('delete');
              result = $.trim(result);
              if(result==="OK"){
                alert('Delete Success');
                $('#row_'+idPd).hide();
              }
              else{
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