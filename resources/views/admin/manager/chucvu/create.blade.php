@extends('admin.admin_home')
@section('admins')
    <div class="col-md-8 col-md-offset-2">
        <h1>Thêm mới</h1>
        @include('flashmessage.flashmessage')
        <!-- thong bao loi-->
        {!! Form::open(['route' => 'chucvu.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('admin', ' Admin:') !!}
            {!! Form::select('id_admin',$admin, null,
                ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Chọn Admin']) !!}

            {!! Form::label('ten_chucvu', 'Tên Chức Vụ:') !!}
            {!! Form::text('ten_chucvu', null, array('class'=>'form-control')) !!}
            
            {!! Form::label('quyen', 'Quyền:') !!}
            {!! Form::text('quyen', null, array('class'=>'form-control')) !!}

        {!! Form::label('lever', 'Cấp:') !!}
        {!! Form::text('lever', null, array('class'=>'form-control')) !!}

            <a href="{{route('chucvu.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
        {!! Form::close() !!}
    </div>
@endsection