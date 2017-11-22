@extends('layouts.master')
@section('content')
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'diachikh.store','enctype'=>"multipart/form-data",'files'=>true ]) !!}

                {!! Form::label('id_khachhang', 'Chọn Khách Hàng:') !!}
                {!! Form::select('id_khachhang',$khachhang, null,
                    ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}

                {!! Form::label('diachi', 'Địa Chỉ:') !!}
                {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                <div id="map-canvas"></div>

                {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

                {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}

            <a href="{{route('diachikh.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Back</a>
            {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
            <script type="text/javascript" src="{{ asset('js/map.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                    type="text/javascript"></script>
        </div>
@endsection

