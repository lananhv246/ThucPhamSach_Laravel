
@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Kiểm tra hàng</li>
                </ol>
            </div>    
            <div class="panel-body">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="heading">
                        <h2>Kiểm tra hàng</h2>
                    </div>
                    <div id="UpdateCart">
                        <div class="table-responsive col-md-8">
                        @if(count($cart))
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu text-center">
                                        <td class="image">Item</td>
                                        <td class="id_sp">ID</td>
                                        <td class="name">Tên SP</td>
                                        <td class="gia">Giá</td>
                                        <td class="quantity">Số Lượng</td>
                                        <td class="total">Tổng Giá</td>
                                    </tr>
                                
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr class="text-center">
                                            <td class="image">
                                                <a href="{{route('product_detail',[$item->id])}}"><img src="/images/upload/{{   $item->options->has('img') ? $item->options->img : '' }}" alt="" style="width: 180px; height: 150px;" class="img-responsive"></a>
                                            </td>
                                            <td class="id_sp">
                                                <a href="{{route('product_detail',[$item->id])}}"><span><p>{{$item->id}}</p></span></a>
                                            </td>
                                            <td class="name">
                                                <a href="{{route('product_detail',[$item->id])}}"><span><p>{{$item->name}}</p></span></a>
                                            </td>
                                            <td class="cart_price">
                                                <p>${{number_format($item->price,0,",","." )}}</p>
                                            </td>
                                            <td>
                                                <p>{{$item->qty}}</p>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">${{number_format($item->subtotal,0,",","." )}}</p>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h3>Thông Tin Khách Hàng</h3>
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu text-center">
                                        <td class="khachhang">Khách Hàng</td>
                                        <td class="diachi">Địa Chỉ</td>
                                        <td class="dienthoai">Số Điện Thoại</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($thongtin))
                                    <tr class="text-center">
                                        <td class="cart_price">
                                            <p>{{$thongtin->user->name}}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{$thongtin->diachi}}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{$thongtin->dienthoai}}</p>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <div id="map-canvas"></div>
                                        <input class="form-control" id="searchmap" name="diachi" type="hidden" value="{{$thongtin->diachi}}">
                                        <input class="form-control" id="lat" name="lat" type="hidden" value="{{$thongtin->lat}}">
                                        <input class="form-control" id="lng" name="lng" type="hidden" value="{{$thongtin->lng}}">
                                        <a href="{{route('diachikh.edit',[$thongtin->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Sửa Thông Tin</a>
                                    </tr>
                                    <script type="text/javascript" src="{{ asset('js/fixed-position.js')}}"></script>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                                            type="text/javascript"></script>
                                @else
                                    <td>Chua có thông tin chi tiết</td>
                                    <a href="{{route('diachikh.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Thêm Mới</a>
                                @endif
                                </tbody>
                            </table>

                            
                        @else
                            <p>Bạn chưa có sản phẩm nào </p>
                        @endif
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12 panel-footer">
                                <div class="heading">
                                    <h3>Tiếp Theo</h3>
                                </div>
                                <ul class="nav navbar">
                                    <div class="sub_total">
                                        <li>Tổng Số SP: <span> {{count($cart)}} </span></li>
                                    </div>
                                    <div class="sub_total">
                                        <li>Thuế: <span> {{ Cart::tax()}} </span></li>
                                    </div>
                                    <div class="sub_total">
                                        <li>Tổng Giá: <span>{{Cart::total()}} VNĐ</span></li>
                                    </div>
                                </ul>
                                <div class="chose_area">
                                    @if(Auth::check())
                                        {!! Form::open(['route'=>['checkout.store'], 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                                        <button class="btn green right" type="submit">
                                            <span class="fa fa-cart-plus fa-2x"></span>
                                            Đặt Hàng
                                        </button>
                                        {!! Form::close() !!}
                                    @else
                                        @include('auth.login')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection