@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'hoadon.store','enctype'=>"multipart/form-data"]) !!}
{{--  
            {!! Form::label('ten_hoadon', 'Tên Hóa Đơn:') !!}
            {!! Form::text('ten_hoadon', null, array('class'=>'form-control')) !!}  --}}

            {!! Form::label('khachhang', 'Chọn Khách Hàng:') !!}
            {!! Form::select('id_khachhang',$khachhang, null,
                ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}

            {!! Form::label('tonggia', 'Tổng Giá:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            {!! Form::label('tongso_sanpham', 'Tổng số lượng:') !!}
            {!! Form::text('tongso_sanpham', null, array('class'=>'form-control')) !!}

            <a href="{{route('hoadon.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-primary', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection