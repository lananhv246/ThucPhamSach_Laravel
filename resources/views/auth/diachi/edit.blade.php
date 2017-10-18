@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['diachikh.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                {!! Form::label('id_khachhang', 'Khách Hàng:') !!}
                <!-- name,(value, option), selected -->
                {!! Form::select('id_khachhang',$khachhang, $data->id_khachhang,
                    ['id' => 'id_khachhang', 'class' => 'form-control','disabled' => 'disabled', 'placeholder' => 'Chọn Khách Hàng']) !!}

                {!! Form::label('diachi', 'Địa Chỉ:') !!}
                {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

                <div id="map-canvas"></div>

                {!! Form::label('dienthoai', 'Số Điện Thoại:') !!}
                {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}

                {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}

                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
            <script type="text/javascript" src="{{ asset('js/fixed-position.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                    type="text/javascript"></script>
        </div>
@endsection