<link href="{{ asset('/css/mega-menu.css') }}" rel="stylesheet">
<script src="{{ asset('/js/mega-menu.js') }}"></script>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset="50">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">My Store</a>
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
                                                <span class="fa fa-cart-plus fa-2x"></span>
                                                {!! number_format($sanhpam1->dongia,0,",","." ) !!}
                                            </button>
                                        </div><!-- End Item -->
                                    @foreach($sanhpam as $item)
                                        <div class="item">
                                            <a href="#"><img src="/images/upload/{!! $item->image !!}" class="img-responsive" alt="product 1"></a>
                                            <h4><a class="portfolio-item-image" href="{{route('product_detail',[$item->id ])}}"><small>Chi tiết sản phẩm</small></a></h4>
                                            <button class="btn green" ><a href="{{route('cart',[$item->id])}}">
                                                <span class="fa fa-cart-plus fa-2x"></span>
                                                {!! number_format($item->dongia,0,",","." ) !!}
                                                </a>
                                            </button>
                                        </div><!-- End Item -->
                                    @endforeach
                                    </div><!-- End Carousel Inner -->
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        @foreach($danhmuc as $data)
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">{!! $data->ten_danhmuc !!}</li>
                                <li class="divider"></li>
                                @foreach($data->loaisanpham as $loaisanpham)
                                <li><a href="#">{!! $loaisanpham->ten_loai !!}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li>aaaa</li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                {!! Form::open(['route' => ['search'], 'class'=>'navbar-form']) !!}
                <div class="input-group">
                    <input id="ticketNum" class="form-control" type="text" name="search" list="defaultNumbers" placeholder="Search" >
                </div>
                {!! Form::close() !!}
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-user-circle-o">Tài Khoản</span>
                        </a>
                            <ul class="dropdown-menu mega-dropdown-menu" role="menu">
                                    <li><a href="{{ url('/login') }}">
                                            <span class="fa fa-sign-in"></span>ĐĂNG NHẬP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/register') }}">
                                            <span class="fa fa-registered"></span>ĐĂNG KÝ
                                        </a>
                                    </li>
                                        {{--<!--dropdown -->--}}
                                </ul>
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
