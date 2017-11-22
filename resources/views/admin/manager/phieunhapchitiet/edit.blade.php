@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
            @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['phieunhapchitiet.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                {!! Form::label('phieunhap', 'Phiếu Nhập:') !!}
                {!! Form::select('id_phieunhap',$phieunhap, $data->id_phieunhap,
                    ['id' => 'id_phieunhap', 'class' => 'form-control', 'placeholder' => 'Chọn Phiếu Nhập']) !!}

                {!! Form::label('sanpham', 'Sản Phẩm:') !!}
                {!! Form::select('id_sanpham',$sanpham, $data->id_sanpham,
                    ['id' => 'id_sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}

                {!! Form::label('soluong', 'Số Lượng:') !!}
                {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

                {!! Form::label('dongia', 'Đơn Giá:') !!}
                {!! Form::text('dongia', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitinh', 'Đơn Vị Tính:') !!}
            {!! Form::select("donvitinh", ["kg" => "Kilogam", "Bó" => "Bó"], $data->donvitinh, ["class" => "form-control", "placeholder" => "Chọn đơn vị tính..."]) !!}

                {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection