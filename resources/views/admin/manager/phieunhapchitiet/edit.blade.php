@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
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

            {!! Form::label('donvitien', 'Đơn Vị Tiền:') !!}
            {!! Form::text('donvitien', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitinh', 'Đơn Vị Tính:') !!}
            {!! Form::text('donvitinh', null, array('class'=>'form-control')) !!}

                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection