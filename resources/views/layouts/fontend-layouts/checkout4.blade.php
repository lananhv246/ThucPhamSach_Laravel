@extends('layouts.fontend-layouts.master')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">

                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li>Kiểm tra - Xem lại đơn hàng</li>
                    </ul>


                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Kiểm tra - Xem lại đơn hàng</h1>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 clearfix" id="checkout">

                    <div class="box">
                        {!! Form::open(['route'=>['checkout.store'], 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{route('checkout1')}}"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Xem lại đơn hàng</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                @if(count($cart))
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Tổng giá</th>
                                                <th>Thuế</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{route('product_detail',[$item->id])}}"><img src="/images/upload/{{   $item->options->has('img') ? $item->options->img : '' }}" alt="" style="width: 180px; height: 150px;" class="img-responsive"></a>
                                                </td>
                                                <td><a href="{{route('product_detail',[$item->id])}}"><span><p>{{$item->name}}</p></span></a>
                                                </td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{number_format($item->price,0,",","." )}}₫</td>
                                                <td>{{number_format($item->subtotal,0,",","." )}}₫</td>
                                                <td>{{number_format($item->tax,0,",","." )}}₫</td>
                                                <td>{{number_format($item->total,0,",","." )}}₫</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6">Tổng</th>
                                                <th>{{Cart::total()}}₫</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                @endif
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('checkout1')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại Kiểm tra - địa chỉ</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Đặt hàng<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        
                        {!! Form::close() !!}
                        
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Tóm tắt đơn hàng</h3>
                        </div>
                        <p class="text-muted">Vận chuyển và chi phí bổ sung được tính toán dựa trên các giá trị bạn đã nhập.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Tổng số đơn hàng</td>
                                        <th>{{count($cart)}}</th>
                                    </tr>
                                    <tr>
                                        <td>Tổng giá đơn hàng</td>
                                        <th>{{Cart::subtotal()}}₫</th>
                                    </tr>
                                    <tr>
                                        <td>Thuế</td>
                                        <th>{{ Cart::tax()}}₫</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng tiền</td>
                                        <th>{{Cart::total()}}₫</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
@endsection
