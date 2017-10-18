@extends('admin.admin_home')
@section('admins')
    <div class="col-md-8 col-md-offset-2">
        <h1>Cập nhật</h1>
        @include('flashmessage.flashmessage')
        {!! Form::model($data, ['route' => ['sanpham.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

        {!! Form::label('loaisanpham', 'Loại Sản Phẩm:') !!}
            {!! Form::select('id_loai',$loai, $data->id_loai,
                ['id' => 'id_loai', 'class' => 'form-control', 'placeholder' => 'Chọn Loại Sản Phẩm']) !!}

            {!! Form::label('ten_sanpham', 'Tên Sản Phẩm:') !!}
            {!! Form::text('ten_sanpham', null, array('class'=>'form-control')) !!}
            
            {!! Form::label('giacu', 'Giá:') !!}
            {!! Form::text('giacu', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitien', 'Đơn Vị Tiền:') !!}
            {!! Form::text('donvitien', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitinh', 'Đơn Vị Tính:') !!}
            {!! Form::text('donvitinh', null, array('class'=>'form-control')) !!}

            {!! Form::label('giamgia', 'Giảm Giá:') !!}
            {!! Form::select('giamgia', ['0.05' => '5%', '0.1' => '10%', '0.2' => '20%'], $data->giamgia, ['class' => 'form-control']) !!}

            {!! Form::label('image', 'Hình Ảnh:') !!}
            {!! Form::file('image', array('class'=>'form-control')) !!}
            {!! Form::hidden('oldImage', $data->image) !!}
            <img src="/images/upload/{!! old('image', isset($data) ? $data['image'] : null) !!}" class="img-responsive">

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            
        {!! Form::close() !!}
    </div>
@endsection