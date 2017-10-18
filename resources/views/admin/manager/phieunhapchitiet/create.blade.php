@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New</h1>
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'phieunhapchitiet.store','enctype'=>"multipart/form-data"]) !!}

                {!! Form::label('phieunhap', 'Phiếu Nhập:') !!}
                {!! Form::select('id_phieunhap',$phieunhap, null,
                    ['id' => 'id_phieunhap', 'class' => 'form-control', 'placeholder' => 'Chọn Phiếu Nhập']) !!}

                {!! Form::label('sanpham', 'Sản Phẩm:') !!}
                {!! Form::select('id_sanpham',$sanpham, null,
                    ['id' => 'id_sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}

                {!! Form::label('soluong', 'Số Lượng:') !!}
                {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

                {!! Form::label('dongia', 'Đơn Giá:') !!}
                {!! Form::text('dongia', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitien', 'Đơn Vị Tiền:') !!}
            {!! Form::text('donvitien', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitinh', 'Đơn Vị Tính:') !!}
            {!! Form::text('donvitinh', null, array('class'=>'form-control')) !!}

            <a href="{{route('phieunhapchitiet.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>

            {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection