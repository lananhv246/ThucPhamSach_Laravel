@extends('layouts.fontend-layouts.master')
@section('content')
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <h2>Cập Nhật Thông Tin Cho {!! $data->name !!}</h2>

                @if($errors->has('errorlogin'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{$errors->first('errorlogin')}}
                    </div>
                @endif
                <!-- thong bao loi-->
                {!! Form::model($data,
                ['route' => ['users.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}
                <div class="col-md-6">
                {!! Form::label('name', 'Tên Khách Hàng:') !!}
                {!! Form::text('name', null, array('class'=>'form-control')) !!}

                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, array('class'=>'form-control')) !!}

                {!! Form::label('password', 'Mật Khẩu:') !!}
                {!! Form::password('password', array('class'=>'form-control')) !!}

                {!! Form::label('password_confirmation', 'Xác Nhận:') !!}
                {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}

                {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
                </div>
                <div class="col-md-6">
                @if(isset($data->diachikh))
                    {!! Form::label('id_khachhang', 'Khách Hàng:') !!}
                    <!-- name,(value, option), selected -->
                    {{--  {!! Form::select('id_khachhang',$khachhang, $data->id_khachhang,
                        ['id' => 'id_khachhang', 'class' => 'form-control','disabled' => 'disabled', 'placeholder' => 'Chọn Khách Hàng']) !!}  --}}

                    {!! Form::label('diachi', 'Địa Chỉ:') !!}
                    {!! Form::text('diachi', $data->diachikh->diachi, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                    <div id="map-canvas"></div>

                    {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                    {!! Form::text('dienthoai', $data->diachikh->dienthoai, array('class'=>'form-control')) !!}

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
                {!! Form::close() !!}
            </div>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                        type="text/javascript"></script>
        </div>
    </div>
</div>
@endsection