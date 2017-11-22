@extends('layouts.app')
@section('content')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'diachikh.store','enctype'=>"multipart/form-data",'files'=>true ]) !!}

                {!! Form::label('id_khachhang', 'Chọn Khách Hàng:') !!}
{{--                {!! Form::text('id_khachhang', Auth::user()->name, array('disabled'=>'disabled','class'=>'form-control')) !!}--}}
                {!! Form::select('id_khachhang',[Auth::user()->id => Auth::user()->name], Auth::user()->id,
                    ['id' => 'id_khachhang', 'class' => 'form-control']) !!}

                {!! Form::label('diachi', 'Địa Chỉ:') !!}
                {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}
                <div><h4 class="text-danger">vui lòng xem đúng địa chỉ trên map để tiện cho chúng tôi giao hàng.</h4></div>
                <div id="map-canvas"></div>

                {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

                {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}

            <a href="{{route('diachikh.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
            <script type="text/javascript" src="{{ asset('js/map.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                    type="text/javascript"></script>
        </div>
@endsection

