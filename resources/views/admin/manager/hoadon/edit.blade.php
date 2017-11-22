@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['hoadon.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {{--  {!! Form::label('ten_hoadon', 'Tên Hóa Đơn:') !!}
            {!! Form::text('ten_hoadon', null, array('disabled'=>'disabled','class'=>'form-control')) !!}  --}}

            {!! Form::label('id_khachhang', 'Tên Khách Hàng:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_khachhang',$khachhang, $data->id_khachhang,
                ['id' => 'khachhang', 'class' => 'form-control', 'placeholder' => 'chọn khách hàng']) !!}

            {!! Form::label('tonggia', 'Tổng Giá:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            {!! Form::label('tongso_sanpham', 'Tổng số sản phẩm:') !!}
            {!! Form::text('tongso_sanpham', null, array('class'=>'form-control')) !!}

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection