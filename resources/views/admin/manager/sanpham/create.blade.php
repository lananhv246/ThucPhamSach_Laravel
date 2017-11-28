@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm mới</h1>
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'sanpham.store','enctype'=>"multipart/form-data"]) !!}

                {!! Form::label('loaisanpham', 'Loại Sản Phẩm:') !!}
                {!! Form::select('id_loai',$loai, null,
                    ['id' => 'id_loai', 'class' => 'form-control', 'placeholder' => 'Chọn Loại Sản Phẩm']) !!}

                {!! Form::label('ten_sanpham', 'Tên Sản Phẩm:') !!}
                {!! Form::text('ten_sanpham', null, array('class'=>'form-control')) !!}
                
                {{--  {!! Form::label('giacu', 'Giá:') !!}
                {!! Form::text('giacu', null, array('class'=>'form-control')) !!}  --}}

                {!! Form::label('donvitinh', 'Đơn Vị Tính:') !!}
                {!! Form::select("donvitinh", ["kg" => "Kilogam", "Bó" => "Bó"], null, ["class" => "form-control", "placeholder" => "Chọn đơn vị tính..."]) !!}

                {!! Form::label('giamgia', 'Giảm Giá:') !!}
                {!! Form::select('giamgia', ['0' => '0%','0.05' => '5%', '0.1' => '10%', '0.2' => '20%'], null, ['class' => 'form-control', 'placeholder' => 'Chọn Giảm giá']) !!}

                {!! Form::label('image', 'Hình ảnh:') !!}
                {!! Form::file('image', array('class'=>'form-control')) !!}

            <a href="{{route('sanpham.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Back</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-primary', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection