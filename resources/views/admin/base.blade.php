<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <link rel="stylesheet" href="{{asset('dashboard/main.css')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <div class="container-fluid">
    <div class="header">
      <div class="row">
        <div class="col-3 col-md-5 col-xl-5 col-sm-5 pl-5 avatarr">
            <img src="{{asset('dashboard/60287859_2344944049122184_9218962067514458112_n.jpg')}}" alt="" class="mr-3 mt-2 avatar">
            <p class="pt-4"> Nhóm 11</p>
        </div>
        <div class="col-9 col-md-7 col-xl-7 col-sm-7">
          <ul class="dsh">
            <li>
              <a href="{{route('admin.dashboard')}}">Trang chủ</a>
            </li>
            <li>
              <a href="">User</a>
            </li>
            <li>
              <a href="{{route('admin.product')}}">Sản phẩm</a>
            </li>
            <li>
              <a href="{{route('admin.brand')}}">Thương hiệu</a>
            </li>
            <li>
              <a href="{{route('admin.categories')}}">Danh mục</a>
            </li>
            <li>
              <a href="{{route('admin.bill')}}">Hóa đơn</a>
            </li>
            <li>
              <a href="{{route('dangxuat')}}">Đăng xuất</a>
            </li>
          </ul>
          <nav class="menu-drop-right lap-none">
                        <div>
                              <i class="fa fa-align-justify"></i>
                        </div>

                        <ul class="ul-drop-right ul-hihi-right">
                              <li><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
                                  <li><a href="{{route('admin.product')}}">Sản phẩm</a></li>
                                
                                  <li><a href="{{route('admin.brand')}}">Thương hiệu</a></li>
                                  <li><a href="{{route('admin.categories')}}" >Danh mục</a></li>
                                  <li><a href="{{route('admin.bill')}}" >Hóa đơn</a></li>
                                  <li><a href="{{route('dangxuat')}}" >Đăng xuất</a></li>
                        </ul>
                    </nav>
              
        </div>
      </div>
    </div>

    <div class="content">
      @yield('content')
    </div>
  </div>

  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/click-menu.js')}}"></script>
  <script type="text/javascript">
    if($(window).width()<550){
      $(document).ready(function(){
        $('div.avatarr').removeClass('pl-5');
      });
    }
  </script>
  @yield('javascript')
</body>
</html>