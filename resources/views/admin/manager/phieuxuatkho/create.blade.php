@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'phieuxuatkho.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('id_admin', 'Admin' ) !!}
            {!! Form::text('id_admin', Auth::guard('admin')->user()->name, array('disabled'=>'disabled','class'=>'form-control') ) !!}

            {!! Form::label('khachhang', 'Chọn Khách Hàng:') !!}
            {!! Form::select('id_khachhang',$khachhang, null,
                ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}

            {!! Form::label('tongso_sanpham', 'Tổng Số sản phẩm:') !!}
            {!! Form::text('tongso_sanpham', null, array('class'=>'form-control')) !!}

            {!! Form::label('tonggia', 'Tổng giá:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            <a href="{{route('phieuxuatkho.index') }}" class="btn btn-sm red btn-danger">
                <span class="fa fa-arrow-circle-left"></span>Trở về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection