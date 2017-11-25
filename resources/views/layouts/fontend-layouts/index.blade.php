
<?php 
    $sanhpam = \App\SanPham::orderBy('id','DESC')->get();
?>
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<div id="index-main">
    <!--<div id="intro">
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="carousel-caption">
                        <h1>Mario Shop<br>Cung cấp thực phẩm trực tuyến.</h1>
                        <h3>Thực phẩm bẩn hiện nay đang trở thành nỗi lo thường trực của nhiều gia đình. Thông tin liên tiếp về thực phẩm nhiễm khuẩn, không đạt chất lượng vệ sinh an toàn thực phẩm đã gây tâm lý hoang mang tới người tiêu dùng.</h3>

                        {{--  <p><a class="btn btn-lg btn-primary scroll-to" href="#content" role="button">View our top picks<br class="hidden-md hidden-lg"> for this week</a>
                        </p>
                        <p><a class="btn btn-lg btn-default" href="index-2.html" role="button">View alternative homepage</a>
                        </p>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
        <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>cửa hàng thực phẩm sạch</h3>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>chuyên cung cấp các loại thực phẩm từ khấp nơi</h3>
                </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3"></div>
            <div class="hero">
                <hgroup>
                    <h1>MARIO VU NGUYEN</h1>
                    <h3>chất lượng hàng đầu đáng tin cậy</h3>
                </hgroup>
            </div>
        </div>
    </div>
</div>
    <!-- *** INTRO IMAGE END *** -->

    <div id="all">
        <!-- *** ADVANTAGES ***__________________ -->

        <div id="advantages">

            <div class="container">

                <div class="col-md-12">

                    <div class="box text-center">
                        <div class="same-height-row row">
                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-heart-o"></i>
                                    </div>
                                    <h4><a href="#">KHÁCH HÀNG HÀI LÒNGs</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-tags"></i>
                                    </div>
                                    <h4><a href="#">Giá cả hợp lý</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-send-o"></i>
                                    </div>
                                    <h4><a href="#">Giao hàng nhanh chóng</a></h4>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="box same-height clickable no-border text-center-xs text-center-sm">
                                    <div class="icon"><i class="fa fa-refresh"></i>
                                    </div>
                                    <h4><a href="#">Phương thức đổi trả mới</a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>

                </div>


            </div>
            <!-- /.container -->

        </div>
        <!-- /#advantages -->

        <!-- *** ADVANTAGES END *** -->
        <!-- *** CONTENT ***_______________________________-->
        <div id="content">
            <div class="container">
                <div class="col-sm-12">
                    <div class="box text-center">
                        <h3 class="text-uppercase">Sản Phẩm Mới</h3>

                        <h4 class="text-muted"><span class="accent">Miễn phí giao hàng </span>tất cả hóa đơn</h4>
                    </div>
                    <div class="row products">
                        @foreach($sanhpam as $data)
                            @if($data->giamgia == 0)
                                @if($data->id > 40)
                                    <!-- top -->
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product">
                                            <div class="image">
                                                <a href="detail.html">
                                                    <img class="img-responsive" src="/images/upload/{!! $data->image !!}" alt="...">
                                                </a>
                                                <div class="quick-view-button">
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                        <span class="sr-only">Chi tiết</span>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                            <span class="sr-only">User login</span>
                                                            <i class="fa fa-users"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                            <span class="sr-only">User login</span>
                                                            <i class="fa fa-users"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.image -->
                                            <div class="text">
                                                <h3><a href="detail.html">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price"> {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->
                                            <!-- /.ribbon -->

                                            <div class="ribbon new">
                                                <div class="theribbon">NEW</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                @else
                                <!--nomal -->
                                <div class="col-md-3 col-sm-4">
                                    <div class="product">
                                        <div class="image">
                                            <a href="detail.html">
                                                <img class="img-responsive" src="/images/upload/{!! $data->image !!}" alt="...">
                                            </a>
                                            <div class="quick-view-button">
                                                <div class="col-md-4">
                                                    <a href="#" data-toggle="modal" data-target="#product-quick-view-modal1" class=" btn-none btn btn-default">
                                                    <span class="sr-only">Chi tiết</span>
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" data-toggle="modal" data-target="#product-quick-view-modal1" class=" btn-none btn btn-default">
                                                        <span class="sr-only">User login</span>
                                                        <i class="fa fa-users"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" data-toggle="modal" data-target="#product-quick-view-modal1" class=" btn-none btn btn-default">
                                                        <span class="sr-only">User login</span>
                                                        <i class="fa fa-users"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.image -->
                                        <div class="text">
                                            <h3><a href="detail.html">{{$data->ten_sanpham}}</a></h3>
                                            <p class="price">
                                            {!! number_format($data->dongia,0,",","." ) !!} 
                                            ₫/{!! $data->donvitinh !!}</p>
                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                                @endif
                            @else
                                @if($data->id > 40)
                                    <!-- top sale -->
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product">
                                            <div class="image">
                                                <a href="detail.html">
                                                    <img class="img-responsive" src="/images/upload/{!! $data->image !!}" alt="...">
                                                </a>
                                                <div class="quick-view-button">
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                        <span class="sr-only">Chi tiết</span>
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                            <span class="sr-only">User login</span>
                                                            <i class="fa fa-users"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                            <span class="sr-only">User login</span>
                                                            <i class="fa fa-users"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.image -->
                                            <div class="text">
                                                <h3><a href="detail.html">{{$data->ten_sanpham}}</a></h3>
                                                <p class="price"><del>{!! number_format($data->giacu,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</del> {!! number_format($data->dongia,0,",","." ) !!} 
                                                ₫/{!! $data->donvitinh !!}</p>
                                            </div>
                                            <!-- /.text -->

                                            <div class="ribbon sale">
                                                <div class="theribbon">SALE</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->

                                            <div class="ribbon new">
                                                <div class="theribbon">NEW</div>
                                                <div class="ribbon-background"></div>
                                            </div>
                                            <!-- /.ribbon -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                @else
                            <!--sale -->
                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="image">
                                        <a href="detail.html">
                                            <img class="img-responsive" src="/images/upload/{!! $data->image !!}" alt="...">
                                        </a>
                                        <div class="quick-view-button">
                                            <div class="col-md-4">
                                                <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                <span class="sr-only">Chi tiết</span>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                    <span class="sr-only">User login</span>
                                                    <i class="fa fa-users"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" data-toggle="modal" data-target="#product-quick-view-modal2" class=" btn-none btn btn-default">
                                                    <span class="sr-only">User login</span>
                                                    <i class="fa fa-users"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.image -->
                                    <div class="text">
                                        <h3><a href="detail.html">{{$data->ten_sanpham}}</a></h3>
                                        <p class="price"><del>{!! number_format($data->giacu,0,",","." ) !!} 
                                        ₫/{!! $data->donvitinh !!}</del> {!! number_format($data->dongia,0,",","." ) !!} 
                                        ₫/{!! $data->donvitinh !!}</p>
                                    </div>
                                    <!-- /.text -->

                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    <!-- /.ribbon -->
                                </div>
                                <!-- /.product -->
                            </div>
                            @endif
                            @endif
                            <!-- modal -->
                            <!--detail -->
                            <div class="modal fade" id="product-quick-view-modal1" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            <div class="row quick-view product-main">
                                                <div class="col-sm-6">
                                                    <div class="quick-view-main-image">
                                                        <img src="/fontend-style/img/detailbig1.jpg" alt="" class="img-responsive">
                                                    </div>

                                                    <div class="row thumbs">
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig1.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig2.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare2.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig3.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare3.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">

                                                    <h2>White Blouse Armani</h2>

                                                    <p class="text-muted text-small text-center">White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>

                                                    <div class="box">

                                                        <form>
                                                            <div class="sizes">

                                                                <h3>Available sizes</h3>

                                                                <label for="size_s">
                                                                    <a href="#">S</a>
                                                                    <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                                                </label>
                                                                <label for="size_m">
                                                                    <a href="#">M</a>
                                                                    <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                                                </label>
                                                                <label for="size_l">
                                                                    <a href="#">L</a>
                                                                    <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                                                </label>

                                                            </div>

                                                            <p class="price">$124.00</p>

                                                            <p class="text-center">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                                                </button>
                                                            </p>


                                                        </form>
                                                    </div>
                                                    <!-- /.box -->

                                                    <div class="quick-view-social">
                                                        <h4>Show it to your friends</h4>
                                                        <p>
                                                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.modal-dialog-->
                            </div>
                            <div class="modal fade" id="product-quick-view-modal2" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            <div class="row quick-view product-main">
                                                <div class="col-sm-6">
                                                    <div class="quick-view-main-image">
                                                        <img src="/fontend-style/img/detailbig1.jpg" alt="" class="img-responsive">
                                                    </div>

                                                    <div class="ribbon ribbon-quick-view new">
                                                        <div class="theribbon">NEW</div>
                                                        <div class="ribbon-background"></div>
                                                    </div>
                                                    <!-- /.ribbon -->

                                                    <div class="row thumbs">
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig1.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig2.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare2.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig3.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare3.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">

                                                    <h2>White Blouse Armani</h2>

                                                    <p class="text-muted text-small text-center">White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>

                                                    <div class="box">

                                                        <form>
                                                            <div class="sizes">

                                                                <h3>Available sizes</h3>

                                                                <label for="size_s">
                                                                    <a href="#">S</a>
                                                                    <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                                                </label>
                                                                <label for="size_m">
                                                                    <a href="#">M</a>
                                                                    <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                                                </label>
                                                                <label for="size_l">
                                                                    <a href="#">L</a>
                                                                    <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                                                </label>

                                                            </div>

                                                            <p class="price">$124.00</p>

                                                            <p class="text-center">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                                                </button>
                                                            </p>


                                                        </form>
                                                    </div>
                                                    <!-- /.box -->

                                                    <div class="quick-view-social">
                                                        <h4>Show it to your friends</h4>
                                                        <p>
                                                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.modal-dialog-->
                            </div>
                            <div class="modal fade" id="product-quick-view-modal3" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                            <div class="row quick-view product-main">
                                                <div class="col-sm-6">
                                                    <div class="quick-view-main-image">
                                                        <img src="/fontend-style/img/detailbig1.jpg" alt="" class="img-responsive">
                                                    </div>

                                                    <div class="ribbon ribbon-quick-view sale">
                                                        <div class="theribbon">SALE</div>
                                                        <div class="ribbon-background"></div>
                                                    </div>
                                                    <!-- /.ribbon -->

                                                    <div class="row thumbs">
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig1.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig2.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare2.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <a href="/fontend-style/img/detailbig3.jpg" class="thumb">
                                                                <img src="/fontend-style/img/detailsquare3.jpg" alt="" class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">

                                                    <h2>White Blouse Armani</h2>

                                                    <p class="text-muted text-small text-center">White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>

                                                    <div class="box">

                                                        <form>
                                                            <div class="sizes">

                                                                <h3>Available sizes</h3>

                                                                <label for="size_s">
                                                                    <a href="#">S</a>
                                                                    <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                                                </label>
                                                                <label for="size_m">
                                                                    <a href="#">M</a>
                                                                    <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                                                </label>
                                                                <label for="size_l">
                                                                    <a href="#">L</a>
                                                                    <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                                                </label>

                                                            </div>

                                                            <p class="price">$124.00</p>

                                                            <p class="text-center">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                                                                </button>
                                                            </p>


                                                        </form>
                                                    </div>
                                                    <!-- /.box -->

                                                    <div class="quick-view-social">
                                                        <h4>Show it to your friends</h4>
                                                        <p>
                                                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.modal-dialog-->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                        <!-- /.col-md-4 -->

                    </div>
                    <!-- /.products -->

                </div>
                <!-- /.col-sm-12 -->

            </div>
            <!-- /.container --><!-- *** PROMO BAR ***
_________________________________________________________ -->

            <div class="bar background-image-fixed-2 no-mb color-white text-center">
                <div class="dark-mask"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="icon icon-lg"><i class="fa fa-file-code-o"></i>
                            </div>
                            <h1>Bạn muốn biết nhiều hơn?</h1>
                            <p class="lead">Chúng tôi có một số bài đăng về thực phẩm sạch, bạn có thể xem qua.</p>
                            <p class="loadMore">
                                <a href="#bai-dang" class="btn btn-primary"><i class="fa fa-chevron-down"></i> Load more</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- *** PROMO BAR END *** -->


            <div class="container">
                <div class="col-sm-12">
                    <!-- *** BLOG HOMEPAGE ***___ -->
                    <div class="box text-center" id="bai-dang">
                        <h3 class="text-uppercase">Các Bài Đăng Về Sản Phẩm</h3>

                        <p class="text-italic text-large">Có gì mới về <strong>Thực Phẩm Sạch? </strong><span class="accent">Kiểm tra bài đăng!</span>
                        </p>
                    </div>
                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Giới thiệu</a></h4>
                                <p class="author-category">Bởi <a href="#">Admin</a> trong <a href="#">Mario Fresh Food Shop</a>
                                </p>
                                <hr>
                                <p class="intro">Về mặt sinh học, thịt sạch là thịt không có ký sinh trùng và vi trùng: hai loại ký sinh trùng nguy hiểm thường có trong thịt động vật là giun bao (Trichinella)
                                 và sán dây (Taenia solium). Nếu chúng ta ăn thịt bị nhiễm giun bao do không nấu kỹ, trứng giun bao không chết  vào ruột  nở thành giun rồi qua vách ruột theo máu đi đến cơ, nằm lại ở cơ gây đau nhức cơ, có thể dẩn đến chết.
                                  Trứng sán dây cũng nằm trong cơ thịt động vật (thịt gạo), 
                                 khi chúng ta ăn phải thịt này, trứng vào ruột sẽ nở thành sán trưởng thành bám chắc vào thành ruột, tranh giành các chất dinh dưỡng và làm cho chúng ta gầy yếu, bệnh hoạn..</p>
                            
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Các bài đăng về thực phẩm sạch</a></h4>
                                <p class="author-category">Bởi <a href="#">Admin</a> trong <a href="#">Mario Fresh Food Shop</a>
                                </p>
                                <hr>
                                <p class="intro">Khi nói đến việc mua thực phẩm hàng ngày ở Việt Nam, người tiêu dùng hầu như không có sự lựa chọn nào khác ngoài thực phẩm không rõ nguồn gốc xuất xứ
                                 Ngày càng xuất hiện thêm nhiều mối lo ngại đến thực phẩm nghèo chất dinh dưỡng và lạm dụng chất bảo quản.Báo chí hàng ngày nhan nhản các tin tức về thực phẩm bẩn.
                                 Do đó, vấn đề an toàn thực phẩm ngày càng được chú trọng.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                    <!-- *** BLOG HOMEPAGE END *** -->
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->

</div>

