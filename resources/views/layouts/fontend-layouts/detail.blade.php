@extends('layouts.fontend-layouts.master')
@section('content')
<script>
    $(document).ready(function(){
         $('#add-cart').on('click', function(){
            var idpro = $('#idsanpham').val();
            var namepro = $('#tensanpham').val();
            //alert(idpro);
            $.ajax({
                url: '<?php echo url('add/cart')?>/'+idpro,
                type: 'GET',
                dataType: 'html',
                data: "idpro="+idpro+"& namepro="+namepro,
                success: function(data){
                    alert('sản phẩm '+namepro+' đả được thêm vào giỏ hàng');
                }
            });
         });
    })
</script>
<div id="all">
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="/">Trang chủ</a>
                    </li>
                    <li><a href="/danhmuc/{{$data->loaisanpham->danhmucloai->id}}">Danh mục</a>
                    </li>
                    <li><a href="/loaisanpham/{{$data->loaisanpham->id}}">Loại Sản phẩm</a>
                    </li>
                    <li>{{$data->ten_sanpham}}</li>
                </ul>
                <div class="box text-center">

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h1>{{$data->ten_sanpham}}</h1>
                            <p class="text-muted">Các sản phẩm của cửa hàng.</p>
                        </div>
                    </div>
                </div>


            </div>

            <!-- *** LEFT COLUMN ***________________ -->

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div>
                            <img src="/images/upload/{!! $data->image !!}" alt="" class="img-responsive">
                        </div>
                        @if($data->giamgia == 0)
                            @if($data->id > 40)
                                <!-- top -->
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            @else
                            @endif
                        @else
                            @if($data->id > 40)
                            <!-- top sale -->
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            @else
                            <!--sale -->
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            @endif
                        @endif
                        <!-- /.ribbon -->

                        <!-- /.ribbon -->

                    </div>
                    <div class="col-sm-6">
                        <div class="box">

                            <form>
                                <input class="tokens" type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="idsanpham" id="idsanpham" value="{!!$data->id !!}"/>
                                <input type="hidden" name="ten_sampham" id="tensanpham" value="{!!$data->ten_sanpham !!}"/>
                        
                            @if($data->giamgia != 0)
                                    <p class="price"><del>{!! number_format($data->giacu,0,",","." ) !!} 
                                    </del> {!! number_format($data->dongia,0,",","." ) !!} 
                                ₫/{!! $data->donvitinh !!}</p>
                            @else
                                <p class="price">{!! number_format($data->dongia,0,",","." ) !!} 
                                ₫/{!! $data->donvitinh !!}</p>
                            @endif
                                <p class="text-center">
                                    <a href="#" id="add-cart" type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                    <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Yêu thích"><i class="fa fa-heart-o"></i>
                                    </button>
                                </p>

                            </form>
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <div class="row" id="thumbs">
                        @if(count($data->sanphamchitiet) > 0)
                            @foreach($data->sanphamchitiet->imagelist as $images)
                            @if(count($images) > 0)
                            <div class="col-sm-3">
                                <a href="/{{$images->duongdan}}" class="thumb">
                                    <img src="/{{$images->duongdan}}" alt="" class="img-responsive">
                                </a>
                            </div>
                            @else
                            <div class="col-sm-3">
                                Không có  chi tiết
                            </div>
                            @endif
                            @endforeach
                            @else
                            <div class="col-sm-3">
                                Không có  chi tiết
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                @if(count($data->sanphamchitiet) != 0)
                <div class="box" id="details">
                    <p>
                        <h4>Miêu tả</h4>
                        <p>{{$data->sanphamchitiet->mieuta}}</p>
                        <h4>Đánh giá</h4>
                        <ul>
                            <li>{{$data->sanphamchitiet->danhgia}}</li>
                            
                        </ul>
                        <h4>Chế biến</h4>
                        <ul>
                            <li>{{$data->sanphamchitiet->chebien}}</li>
                        </ul>

                        <blockquote>
                            <p><em>{{$data->sanphamchitiet->thanhphan}}</em>
                            </p>
                        </blockquote>
                </div>
                @else
                @endif
                <div class="box social" id="product-social">
                    <h4>Chia sẽ</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>

            </div>
            <!-- /.col-md-9 -->


            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***_________ -->

            <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***_____ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Danh mục</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                               <?php $countsp = 0 ?>
                                @foreach($danhmuc as $listdanhmuc)
                                    @if(count($listdanhmuc->loaisanpham) != 0)
                                        @foreach($listdanhmuc->loaisanpham as $listloai)
                                            @if(count($listloai->sanpham) != 0)
                                                @foreach($listloai->sanpham as $sp)
                                                    <?php $countsp += count($sp); ?>
                                                @endforeach
                                            @else
                                            @endif
                                        @endforeach
                                    <a href="{{route('danhmuc',[$listdanhmuc->id])}}">{{$listdanhmuc->ten_danhmuc}}<span class="badge pull-right">{{$countsp}}</span></a>
                                    <ul>
                                        @foreach($listdanhmuc->loaisanpham as $listloai)
                                        <li><a href="{{route('loaisanpham',[$listloai->id])}}">{{$listloai->ten_loai}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    @endif
                                @endforeach
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
                <!-- /.col-md-3 -->
            <!-- *** RIGHT COLUMN END *** -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
</div>
<!-- /#all -->
@endsection