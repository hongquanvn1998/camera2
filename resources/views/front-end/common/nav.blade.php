<div class="lienhe">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-5 col-xs-5 lienhe-left">
                <p><i class="fa fa-phone phone-none" aria-hidden="true"></i>Hotline:0972365339</p>
            </div>
            <div class="col-md-5 col-sm-6 col-7 col-xs-7 lienhe-right">
                @if(Auth::check())
                    @if(Auth::user()->role === 0)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Giỏ hàng</button>
                                <button class="dropdown-item" type="button">Đơn hàng</button>
                                <button class="dropdown-item" type="button">Hồ sơ</button>
                                <a class="dropdown-item" href="{{-- {{route('dangxuat')}} --}}">Đăng xuất</a>
                                
                            </div>
                        </div>
                    @elseif(Auth::user()->role===1)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tài khoản
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" type="button">Quản lý</button>
                                <a class="dropdown-item" href="{{-- {{route('dangxuat')}} --}}" >Đăng xuất</button>
                                
                            </div>
                        </div>
                    @endif
                    
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" href="{{route('DangNhap')}}">Đăng nhập</a>
                            <a class="dropdown-item" href="{{route('dangky')}}">Đăng ký</a>
                            
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>  
</div>
