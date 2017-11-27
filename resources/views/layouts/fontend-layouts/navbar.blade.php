<!-- *** NAVBAR ***
_________________________________________________________ -->
<?php
    $danhmuc = \App\DanhMucLoai::orderBy('id','ASC')->get();
    $sanhpam = \App\SanPham::orderBy('id','DESC')->skip(1)->take(5)->get();
    $sanhpam1 = DB::table('san_phams')->latest()->first();
?>
    <div class="navbar navbar-default navbar-fixed-top yamm affix" role="navigation" data-spy="affix" data-offset="50" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="/">
                    <img src="/fontend-style/img/logos.png" alt="Minimal logo" class="hidden-xs hidden-sm">
                    <img src="/fontend-style/img/logo-small.png" alt="Minimal logo" class="visible-xs visible-sm"><span class="sr-only">Trang chủ</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <!-- shopping -->
                    <a class="btn btn-primary navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">{{count(Cart::content())}}Giỏ hàng</span>
                    </a>
                    <button type="button" class="navbar-toggle btn-default" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <button type="button" class="navbar-toggle btn-default" data-toggle="modal" data-target="#login-modal">
                        <span class="sr-only">User login</span>
                        <i class="fa fa-users"></i>
                    </button>

                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="/" >Trang Chủ</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="/images/bongcai1.png" class="img-responsive hidden-xs" alt="">
                                        </div>
                                        @foreach($danhmuc as $data)
                                            <div class="col-sm-3">
                                                <h3><a href="{{route('danhmuc',[$data->id])}}">{{$data->ten_danhmuc }}</a></h3>
                                                <ul>
                                                @foreach($data->loaisanpham as $loaisanpham)
                                                    <li><a href="{{route('loaisanpham',[$loaisanpham->id])}}">{{ $loaisanpham->ten_loai}}</a>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="footer clearfix hidden-xs">
                                    <h4 class="pull-right">Mario</h4>
                                    <div class="buttons pull-left">
                                        <a href="#" class="btn btn-default"><i class="fa fa-tags"></i> Giảm giá</a>
                                        <a href="#" class="btn btn-default"><i class="fa fa-star-o"></i> Yêu thích</a>
                                        <a href="#" class="btn btn-default"><i class="fa fa-globe"></i> Thương hiệu</a>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới Thiệu</a>
                    </li>
                    <li><a href="{{route('tintuc')}}">Tin Tức</a>
                    </li>
                    <li><a href="#footer">Liên Hệ</a>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{route('shopping')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">({{count(Cart::content())}}) <span class="hidden-md">Giỏ</span></span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right">
                <button type="button" class="btn navbar-btn btn-default" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse right">
                @if (Auth::guard('admin')->user())
                <ul class="nav navbar-nav">
                    @include ('admin.admin_dropdown')
                </ul>
                @elseif(! Auth::guest())
                <ul class="nav navbar-nav">
                    @include('auth.dropdown')
                </ul>
                @else
                <button type="button" class="btn navbar-btn btn-default" data-toggle="modal" data-target="#login-modal">
                    <span class="sr-only">User login</span>
                    <i class="fa fa-users"></i>
                </button>
                @endif
            </div>

            <div class="collapse clearfix" id="search">

                {!! Form::open(['route' => ['search'], 'class'=>'navbar-form']) !!}
                    <div class="input-group">
                        <input id="ticketNum" class="form-control" type="text" name="search" list="defaultNumbers" placeholder="Search" >
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                {!! Form::close() !!}

            </div>
            <!--/.nav-collapse -->

        </div>


    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <!-- *** LOGIN MODAL ***_______________ -->

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
                            <button id="login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Đăng Nhập</button>
                        </p>
                    </form>
                    {{--  <button id="register" class="btn btn-primary"><i class="fa fa-sign-in"></i> Register</button>  --}}
                    <p class="text-center text-muted">Chưa đăng ký?</p>
                    <p class="text-center text-muted"><a href="/register"<strong>Đăng ký ngay</strong></a>Chỉ cần một vài thao tác bạn đả đăng ký thành công tài khoản để tiến hành mua hàng trong cửa hàng chúng tôi!.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- *** LOGIN MODAL END *** -->

    <!-- *** INTRO IMAGE ***
	_________________________________________________________ -->