@extends('layouts.fontend-layouts.master')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">

                        <li><a href="index-2.html">Trang chủ</a>
                        </li>
                        <li><a href="customer-orders.html">Đơn đặt hàng</a>
                        </li>
                        <li>Đơn đặt hàng #{{$data->id}}</li>
                    </ul>


                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Đơn đặt hàng #{{$data->id}}</h1>

                                <p class="lead">Đơn đặt hàng #{{$data->id}} đã được đặt vào <strong>22/06/2013</strong>.</p>
                                <p class="text-muted">Nếu bạn có bất kỳ câu hỏi nào, vui lòng <a href="/contact">liên hệ</a> với chúng tôi, trung tâm dịch vụ khách hàng của chúng tôi đang làm việc cho bạn 24/7.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-md-9 clearfix" id="customer-order">
                    <div class="box">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Số sản phẩm chưa giao đủ</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng Thuế</th>
                                        <th>Tổng giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data->phieuxuatkhochitiet as $chitietxk)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <a href="{{route('product_detail',[$chitietxk->tonkho->sanpham->id])}}"><img src="/images/upload/{{$chitietxk->tonkho->sanpham->image}}" alt="White Blouse Armani">
                                            </a>
                                        </td>
                                        <td><a href="#">{{$chitietxk->tonkho->sanpham->ten_sanpham}}</a>
                                        </td>
                                        <td>{{$chitietxk->soluong}}</td>
                                        @if(isset($chitietxk->donhangno))
                                        <td>{{$chitietxk->donhangno->soluong_no}}</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                        <td>{{number_format($chitietxk->dongia,0,",","." )}}₫</td>
                                        <td>{{number_format($chitietxk->thue,0,",","." )}}₫</td>
                                        <td>{{number_format($chitietxk->soluong * $chitietxk->dongia,0,",","." )}}₫</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Tổng giá đã tính thuế</th>
                                        <th>{{number_format($data->tonggia,0,",","." )}}₫</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-sm-6">
                                <h2>Hình thức thanh toán</h2>
                                <p>Giao hàng tận nhà</p>
                            </div>
                            <div class="col-sm-6">
                                <h2>Địa chỉ nhận hàng</h2>
                                <p>{{$data->khachhang->name}}
                                    <br>{{$data->khachhang->diachikh->diachi}}
                                    <br>{{$data->khachhang->diachikh->dienthoai}}
                                    <br>{{$data->khachhang->email}}
                                </p>
                            </div>
                        </div>
                        <!-- /.addresses -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Phần khác</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="{{route('users.orderhistory',[$data->khachhang->id])}}"><i class="fa fa-list"></i>Tất cả đơn đặt hàng</a>
                                </li>
                                <li>
                                    <a href="{{route('users.show',[$data->khachhang->id])}}"><i class="fa fa-user"></i>Tài khoản cá nhân</a>
                                </li>
                                <li>
                                   <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <!-- *** RIGHT COLUMN END *** -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>
    <!-- /#all -->
@endsection