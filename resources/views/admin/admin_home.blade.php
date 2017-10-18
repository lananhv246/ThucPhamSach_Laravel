<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">--}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" type="text/javascript"></script>
    {{--  <script src="{{ asset('js/js.js') }}"></script>  --}}
    <style>
        #map-canvas{
            width: 625px;
            height: 250px;
        }
    </style>
</head>
<body>

    @if(Auth::guard('admin')->check())
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav-side-menu">
                        <div class="brand">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                </a>
                               <ul class="dropdown-menu" role="menu" style="text-align: center">
                                    <li>
                                        <a href="{{route('users.show',[Auth::id()])}}" style="color:#000">
                                            <span class="fa fa-user-circle-o">
                                            </span>Trang Cá Nhân
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" style="color:#000"
                                        onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        </div>
                        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                        <div class="menu-list">
                            <ul id="menu-content" class="menu-content collapse out">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                                    </a>
                                </li>
                                <li data-toggle="collapse" data-target="#new" class="collapsed">
                                    <a href="#"><i class="fa fa-ravelry fa-lg" aria-hidden="true"></i> Danh Mục <span class="arrow"></span></a>
                                </li>
                                <li>
                                    <ul class="sub-menu collapse" id="new">
                                        <li class="list-group-item">
                                            {!! link_to_route('admins.index', "Admin",null) !!}
                                            <span class="badge"> {{\App\Admin::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('nhacungcap.index', "Nhà Cung Cấp",null) !!}
                                        <span class="badge"> {{\App\NhaCungCap::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('tramtrungchuyen.index', "Trạm Trung Chuyển",null) !!}
                                        <span class="badge"> {{\App\TramTrungChuyen::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('hangcungcap.index', "Hàng Cung Cấp",null) !!}
                                        <span class="badge"> {{\App\HangCungCap::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('phieunhap.index', "Phiếu Nhập",null) !!}
                                        <span class="badge"> {{\App\PhieuNhap::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('phieunhapchitiet.index', "Phiếu Nhập Chi Tiết",null) !!}
                                        <span class="badge"> {{\App\PhieuNhapChiTiet::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('danhmucloai.index', "Danh Mục Loại",null) !!}
                                        <span class="badge"> {{\App\DanhMucLoai::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('loaisanpham.index', "Loại Sản Phẩm",null) !!}
                                        <span class="badge"> {{\App\LoaiSanPham::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('sanpham.index', "Sản Phẩm",null) !!}
                                        <span class="badge"> {{\App\SanPham::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('sanphamchitiet.index', "Sản Phẩm Chi Tiết",null) !!}
                                        <span class="badge"> {{\App\SanPhamChiTiet::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('imagelist.index', "Image List",null) !!}
                                        <span class="badge"> {{\App\ImagesList::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('tonkho.index', "Tồn Kho",null) !!}
                                        <span class="badge"> {{\App\TonKho::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('diachikh.index', "Địa Chỉ Khách Hàng",null) !!}
                                        <span class="badge"> {{\App\DiaChiKH::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('chucvu.index', "Chức Vụ",null) !!}
                                        <span class="badge"> {{\App\ChucVu::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('hoadon.index', "Hóa Đơn",null) !!}
                                        <span class="badge"> {{\App\HoaDon::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                        {!! link_to_route('hoadonchitiet.index', "Hóa Đơn Chi Tiết",null) !!}
                                        <span class="badge"> {{\App\HoaDonChiTiet::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            {!! link_to_route('phieuxuatkho.index', "Phiếu Xuất Kho",null) !!}
                                            <span class="badge"> {{\App\PhieuXuatKho::count()}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            {!! link_to_route('phieuxuatkhochitiet.index', "Phiếu Xuất Kho Chi Tiết",null) !!}
                                            <span class="badge"> {{\App\PhieuXuatKhoChiTiet::count()}}</span>
                                        </li>
                                    </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dashboard fa-lg"></i> Dashboard
                                        </a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                @yield('admins')
                </div>
            </div>
        </div>
    @else
        @include('errors.503')
    @endif
</body>
</html>