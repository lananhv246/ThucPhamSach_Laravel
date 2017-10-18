@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New</h1>
            <!-- thong bao loi-->
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'tonkho.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('id_sanpham', 'Sản Phẩm:') !!}
            {!! Form::select('id_sanpham',$sanpham, null,
                ['id' => 'sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}

            {!! Form::label('soluong', 'Số Lượng Tồn:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            <a href="{{route('tonkho.index') }}" class="btn btn-sm red btn-danger">
                <span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>

            {!! Form::submit('submit', array('class'=>'btn btn-submit btn-sm')) !!}

            {!! Form::close() !!}
        </div>
@endsection