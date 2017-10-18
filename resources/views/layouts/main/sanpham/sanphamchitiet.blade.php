@extends('layouts.master')
@section('content')
<div class="container">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-12">
                    <div class="product col-md-3 service-image-left">
                            <img id="item-display" src="/images/upload/{!! $data->sanpham->image !!}" alt=""></img>
                    </div>

                    <div class="container service1-items col-sm-2 col-md-2 pull-left">
                        @foreach($data->imagelist as $image)
                            <a id="item-1" class="service1-item">
                                <img src="/{!!$image->duongdan!!}" alt=""></img>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-md-7">
                        <div class="product-title">{!! $data->sanpham->ten_sanpham !!}</div>
                        <div class="product-desc">{!!$data->mieuta!!}</div>
                        <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
                        <hr>
                        <div class="product-price">{!! number_format($data->sanpham->dongia,0,",","." )!!} {!!$data->sanpham->donvitien!!}/ {!!$data->sanpham->donvitinh!!}</div>
                        <div class="product-stock">Tồn Kho : {!!$data->sanpham->tonkho["soluong"]!!}</div>
                        <hr>
                        <div class="btn-group">
                            <a href="{{route('cart',[$data->sanpham->id])}}" class="btn btn-sm red">
                                <span class="fa fa-cart-plus fa-2x"></span>Add Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 product-info">
                <ul id="myTab" class="nav nav-tabs nav_tabs">

                    <li class="active"><a href="#service-one" data-toggle="tab">Đánh Giá</a></li>
                    <li><a href="#service-two" data-toggle="tab">Thành Phần</a></li>
                    <li><a href="#service-three" data-toggle="tab">Chế Biến</a></li>
                    <li><a href="#service-four" data-toggle="tab">Thêm Nhiều Hình Ảnh</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">

                        <section class="container product-info">
                        {!!$data->danhgia!!}   
                        </section>

                    </div>
                    <div class="tab-pane fade" id="service-two">

                        <section class="container">
                            {!!$data->thanhphan!!}
                        </section>

                    </div>
                    <div class="tab-pane fade" id="service-three">
                        {!!$data->chebien!!}
                    </div>
                    <div class="tab-pane fade" id="service-four">

                        <section class="container">
                            @foreach($data->imagelist as $imagelist)
                                <img class="img-responsive" src="/{!!$imagelist->duongdan!!}" alt=""></img>
                            @endforeach
                        </section>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection