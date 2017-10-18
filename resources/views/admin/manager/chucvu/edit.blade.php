@extends('admin.admin_home')
@section('admins')
    <div class="col-md-8 col-md-offset-2">
        <h1>Chỉnh Sửa</h1>
        @include('flashmessage.flashmessage')
        <!-- thong bao loi-->
        {!! Form::model($data, ['route' => ['chucvu.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

    {!! Form::label('id_admin', 'Tên Admin:') !!}
    <!-- name,(value, option), selected -->
        {!! Form::select('id_admin',$admin, $data->id_admin,
            ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Chọn Admin']) !!}

        {!! Form::label('ten_chucvu', 'Tên Chức Vụ:') !!}
        {!! Form::text('ten_chucvu', null, array('class'=>'form-control')) !!}

        {!! Form::label('quyen', 'Quyền:') !!}
        {!! Form::text('quyen', null, array('class'=>'form-control')) !!}

        {!! Form::label('lever', 'Cấp:') !!}
        {!! Form::text('lever', null, array('class'=>'form-control')) !!}

        {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

    {!! Form::close() !!}
    </div>
@endsection