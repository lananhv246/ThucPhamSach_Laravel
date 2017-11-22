@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Cập Nhật</h1>
        @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['sanphamchitiet.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('id_sanpham', 'Tên Sản Phẩm:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_sanpham',$sanpham, $data->id_sanpham,
                ['id' => 'id_sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}

            {!! Form::label('mieuta', 'Miêu Tả:') !!}
            {!! Form::textarea('mieuta', null, array('class'=>'form-control')) !!}

            {!! Form::label('danhgia', 'Đánh Giá:') !!}
            {!! Form::textarea('danhgia', null, array('class'=>'form-control')) !!}

            {!! Form::label('chebien', 'Chế Biến:') !!}
            {!! Form::textarea('chebien', null, array('class'=>'form-control')) !!}

            {!! Form::label('thanhphan', 'Thành Phần:') !!}
            {!! Form::textarea('thanhphan', null, array('class'=>'form-control')) !!}

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection