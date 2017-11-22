@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            <!-- thong bao loi-->
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'loaisanpham.store','enctype'=>"multipart/form-data"]) !!}

                {!! Form::label('danhmuc', 'Danh Mục:') !!}
                {!! Form::select('id_danhmuc',$danhmuc, null,
                    ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Chọn Danh Mục']) !!}

                {!! Form::label('ten_loai', 'Tên Loại:') !!}
                {!! Form::text('ten_loai', null, array('class'=>'form-control')) !!}

            <a href="{{route('loaisanpham.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection