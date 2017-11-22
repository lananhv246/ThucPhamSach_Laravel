@extends('admin.admin_home')
@section('admins')
    <div class="col-md-8 col-md-offset-2">
        <h1>Thẹm Mới</h1>
        <!-- thong bao loi-->
        @include('flashmessage.flashmessage')
        {!! Form::open(['route' => 'nhacungcap.store']) !!}
            
            {!! Form::label('ten_ncc', 'Tên Nhà Cung Cấp:') !!}
            {!! Form::text('ten_ncc', null, array('class'=>'form-control')) !!}

            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, array('class'=>'form-control')) !!}


            {!! Form::label('diachi', 'Địa Chỉ:') !!}
            {!! Form::text('diachi', null, array('class'=>'form-control', 'id'=>'searchmap')) !!}

            <div id="map-canvas"></div>

            {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

            {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}
            
            {!! Form::label('dienthoai', 'Điện Thoại:') !!}
            {!! Form::text('dienthoai', null, array('class'=>'form-control')) !!}


            {!! Form::label('maso_thue', 'Mã Số Thuế:') !!}
            {!! Form::text('maso_thue', null, array('class'=>'form-control')) !!}

            {!! Form::label('ghichu', 'Ghi Chú:') !!}
            {!! Form::textarea('ghichu', null, array('class'=>'form-control')) !!}

        <a href="{{route('nhacungcap.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

        {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
        {!! Form::close() !!}
    </div>
    <script type="text/javascript" src="{{ asset('js/map.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
            type="text/javascript"></script>
@endsection