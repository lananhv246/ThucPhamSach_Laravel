@extends('layouts.app')
@section('content')
        <div class="col-md-7 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['diachikh.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                {!! Form::label('id_khachhang', 'Khách Hàng:') !!}
{{--                {!! Form::text('id_khachhang', Auth::user()->name, array('disabled'=>'disabled','class'=>'form-control')) !!}--}}
                <!-- name,(value, option), selected -->
            {!! Form::select('id_khachhang',[Auth::user()->id => Auth::user()->name], Auth::user()->id,
                ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}

                {!! Form::label('diachi', 'Địa Chỉ:') !!}
                {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                <div id="map-canvas"></div>

                {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

                {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}

                {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
            <script type="text/javascript" src="{{ asset('js/fixed-position.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                    type="text/javascript"></script>
        </div>
@endsection