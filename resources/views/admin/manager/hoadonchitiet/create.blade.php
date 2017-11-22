@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'hoadonchitiet.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('hoadon', 'Hóa Đơn:') !!}
            {!! Form::select('id_hoadon',$hoadon, null,
                ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Chọn Hóa Đơn']) !!}

            {!! Form::label('sanpham', 'Sản Phẩm:') !!}
            {!! Form::select('id_sanpham',$sanpham, null,
                ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Sản Phẩm']) !!}

            {!! Form::label('soluong', 'Số lượng:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('dongia', 'Đơn Giá:') !!}
            {!! Form::text('dongia', null, array('class'=>'form-control')) !!}

            {!! Form::label('thue', 'Thuế:') !!}
            {!! Form::text('thue', null, array('class'=>'form-control')) !!}


            <a href="{{route('hoadonchitiet.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection