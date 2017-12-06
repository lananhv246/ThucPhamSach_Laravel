@extends('layouts.fontend-layouts.master')
@section('content')
<style>

#map-canvas{
    width: 405px;
    height: 250px;
}
</style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                        type="text/javascript"></script>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12 clearfix">
                    <ul class="breadcrumb">
                        <li><a href="/">Trang chủ</a>
                        </li>
                        <li>Kiểm tra - địa chỉ</li>
                    </ul>

                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Kiểm tra - địa chỉ</h1>
                                @if($errors->has('errorlogin'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{$errors->first('errorlogin')}}
                                    </div>
                                @endif
                                @include('flashmessage.flashmessage')
                                <!-- thong bao loi-->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 clearfix" id="checkout">
                
                    <div class="box">
                        {!! Form::model($data,
                            ['route' => ['users.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                </li>
                                {{--  <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li> --}}
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Xem lại đơn hàng</a>
                                </li> 
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Form::label('name', 'Tên Khách Hàng:') !!}
                                        {!! Form::text('name', null, array('class'=>'form-control')) !!}

                                        {!! Form::label('email', 'Email:') !!}
                                        {!! Form::text('email', null, array('class'=>'form-control')) !!}

                                        {!! Form::label('password', 'Mật Khẩu:') !!}
                                        {!! Form::password('password', array('class'=>'form-control')) !!}

                                        {!! Form::label('password_confirmation', 'Xác Nhận:') !!}
                                        {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}

                                    </div>
                                    <div class="col-sm-6">
                                    @if(isset($data->diachikh))
                                            {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                                            {!! Form::text('dienthoai', $data->diachikh->dienthoai, array('class'=>'form-control')) !!}
                                            {!! Form::label('diachi', 'Địa Chỉ:') !!}
                                            {!! Form::text('diachi', $data->diachikh->diachi, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                                            <div id="map-canvas"></div>

                                            
                                            {!! Form::hidden('lat', $data->diachikh->lat, array('class'=>'form-control', 'id'=>'lat')) !!}

                                            {!! Form::hidden('lng', $data->diachikh->lng, array('class'=>'form-control', 'id'=>'lng')) !!}
                                            <script type="text/javascript" src="{{ asset('js/fixed-position.js')}}"></script>
                                        @else
                                            {{--  {!! Form::label('id_khachhang', 'Chọn Khách Hàng:') !!}
                                            {!! Form::select('id_khachhang',$khachhang, null,
                                                ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}  --}}

                                            {!! Form::label('diachi', 'Địa Chỉ:') !!}
                                            {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                                            <div id="map-canvas"></div>

                                            {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                                            {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

                                            {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                                            {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}
                                        <script type="text/javascript" src="{{ asset('js/map.js')}}"></script>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu Trữ</button>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('shopping')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở về giỏ hàng</a>
                                </div>
                                @if(Auth::check())
                                    @if(isset(Auth::user()->diachikh))
                                        @if(count(Cart::content())!= 0)
                                        <div class="pull-right">
                                            <a href="{{route('checkout2')}}" type="button" class="btn btn-primary">Thanh toán<i class="fa fa-chevron-right"></i></a>
                                        </div>
                                        @else
                                        @endif
                                    @else
                                    <div class="pull-right">
                                        <a href="{{route('users.edit',[$data->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span>vui lòng cập nhật thông tin</a>
                                    </div>
                                    @endif

                                @else
                                    @include('auth.login')
                                @endif
                            </div>
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
                                @if(count(Cart::content())!= 0)
                                    <tr>
                                        <td>Tổng giá đơn hàng</td>
                                        <th>{{Cart::subtotal()}}₫</th>
                                    </tr>
                                    <tr>
                                        <td>Thuế</td>
                                        <th>{{Cart::tax()}}₫</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng tiền</td>
                                        <th>{{Cart::total()}}₫</th>
                                    </tr>
                                @else
                                <tr><td>Bạn chưa mua sản phẩm nào</td></tr>
                                @endif
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