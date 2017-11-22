{{--  <link href="{{ asset('/css/mega-menu.css') }}" rel="stylesheet">  --}}
{{--  <script src="{{ asset('/js/mega-menu.js') }}"></script>  --}}
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset="50">
    <div class="container">
    
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">MarioNguyen</a>
        </div>

        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm <span class="caret"></span></a>
                    <ul class="dropdown-menu mega-dropdown-menu">
                    <?php
                        $danhmuc = \App\DanhMucLoai::orderBy('id','ASC')->get();
                        $sanhpam = \App\SanPham::orderBy('id','DESC')->skip(1)->take(5)->get();
                        $sanhpam1 = DB::table('san_phams')->latest()->first();
                    ?>            
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Sản Phẩm Mới</li>
                                <div id="menCollection" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img src="/images/upload/{!! $sanhpam1->image !!}" class="img-responsive" alt="product 1"></a>
                                            <h4><a class="portfolio-item-image" href="{{route('product_detail',[$sanhpam1->id ])}}"><small>Chi tiết sản phẩm</small></a></h4>
                                            <button class="btn green" >
                                                <span class="fa fa-cart-plus"></span>
                                                {!! number_format($sanhpam1->dongia,0,",","." ) !!}
                                            </button>
                                        </div><!-- End Item -->
                                    @foreach($sanhpam as $item)
                                        <div class="item">
                                            <a href="#"><img src="/images/upload/{!! $item->image !!}" class="img-responsive" alt="product 1"></a>
                                            <h4><a class="portfolio-item-image" href="{{route('product_detail',[$item->id ])}}"><small>Chi tiết sản phẩm</small></a></h4>
                                            <a href="{{route('cart',[$item->id])}}"><button class="btn green" >
                                                <span class="fa fa-cart-plus"></span>
                                                {!! number_format($item->dongia,0,",","." ) !!}
                                            </button></a>
                                        </div><!-- End Item -->
                                    @endforeach
                                    </div><!-- End Carousel Inner -->
                                    <!-- Controls -->
                                    {{--  <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>  --}}
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#all-product">Xem Tất cả các sản phẩm<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        @foreach($danhmuc as $data)
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header"><a href="{{route('locsanpham',[$data->id])}}" style="color: red;">{!! $data->ten_danhmuc !!}</a></li>
                                <li class="divider"></li>
                                @foreach($data->loaisanpham as $loaisanpham)
                                <li><a href="{{route('locloaisp',[$loaisanpham->id])}}">{!! $loaisanpham->ten_loai !!}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li><h3>Thực Phẩm Sạch Thương Hiệu Việt</h3></li>
                        <li class="divider"></li>
                        <li><img src="/images/S07.jpg" style="height: 200px;" /></li>
                    </ul>
                </li>
                <li><a href="#">Liên Hệ</a></li>
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search</a>
                    <ul class="dropdown-menu mega-dropdown-menu">        
                        <li class="col-sm-3">
                            <ul>
                                <li><a href="#all-product">
                                    {!! Form::open(['route' => ['search'], 'class'=>'navbar-form']) !!}
                                        <div class="input-group form-group">
                                            <input id="ticketNum" class="form-control" type="text" name="search" list="defaultNumbers" placeholder="Search" >
                                            <span class="form-group">
                                            <button type="submit" class="btn red"><i class="fa fa-search"></i> Tìm</button></span>
                                        </div>
                                    {!! Form::close() !!}
                                </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tài Khoản <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>  --}}
                @if (Auth::guard('admin')->user())
                    @include ('admin.admin_dropdown')
                @elseif(! Auth::guest())
                    @include('auth.dropdown')
                @else
                    <li>
                        {{--  <a href="{{ url('/login') }}">  --}}
                        <a href="#" data-toggle="modal" data-target="#login-modal">
                            <span class="fa fa-user-circle-o">Đăng Nhập</span>
                        </a>
                            {{--  <ul class="dropdown-menu mega-dropdown-menu" role="menu">
                                    <li><a href="{{ url('/login') }}">
                                            <span class="fa fa-sign-in"></span>ĐĂNG NHẬP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/register') }}">
                                            <span class="fa fa-registered"></span>ĐĂNG KÝ
                                        </a>
                                    </li>
                                        <!--dropdown -->
                                </ul>  --}}
                            </li>            
                    @endif
                <li>
                <a href="{{route('shopping') }}">
                    <span class="fa fa-shopping-basket"></span>
                    ({!! Cart::count()!!}) Giỏ Hàng
                </a>
                </li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div>
</nav>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div id="form-login" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Đăng Nhập</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    @if($errors->has('errorlogin'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('errorlogin')}}
                        </div>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật Khẩu</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <p class="text-center">
                        <button id="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>
                </form>
                {{--  <button id="register" class="btn btn-primary"><i class="fa fa-sign-in"></i> Register</button>  --}}
                <p class="text-center text-muted">Chưa đăng ký?</p>
                <p class="text-center text-muted"><a href="#" id="register"><strong>Đăng ký ngay</strong></a>Chỉ cần một vài thao tác bạn đả đăng ký thành công tài khoản để tiến hành mua hàng trong cửa hàng chúng tôi!.</p>
            </div>
        </div>
        <div id="form-register" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="register">Đăng Ký</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Họ Tên</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Mật Khẩu</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Xác Nhận Mật Khẩu</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="col-sm-3">
                                <button type="submit" id="register" class="btn btn-primary">
                                    <span class="fa fa-registered"></span>Đăng Ký
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="text-center text-muted">Bạn đã có tài khoản.<a href="#" id="logins"><strong>Đăng Nhập</strong></a></p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#form-login').show();
        $('#form-register').hide();
        $('#register').click(function (){
            $('#form-login').hide();
            $('#form-register').show();
        });
        $('#logins').click(function (){
            $('#form-login').show();
            $('#form-register').hide();
        });
    });
</script>
