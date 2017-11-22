@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
        @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['hoadonchitiet.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('id_hoadon', 'Hóa Đơn:') !!}
            <!-- name,(value, option), selected -->
                {!! Form::select('id_hoadon',$hoadon, $data->id_hoadon,
                    ['id' => 'id_hoadon', 'class' => 'form-control', 'placeholder' => 'Chọn Hóa Đơn']) !!}

            {!! Form::label('id_sanpham', 'Sản Phẩm:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_sanpham',$sanpham, $data->id_sanpham,
                ['id' => 'id_sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Admin']) !!}

            {!! Form::label('soluong', 'Số Lượng:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('dongia', 'Đơn Giá:') !!}
            {!! Form::text('dongia', null, array('class'=>'form-control')) !!}


            {!! Form::label('thue', 'Thuế:') !!}
            {!! Form::text('thue', null, array('class'=>'form-control')) !!}

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection