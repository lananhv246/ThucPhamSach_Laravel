@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Cập Nhật</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data,
            ['route' => ['admins.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, array('class'=>'form-control')) !!}

            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, array('class'=>'form-control')) !!}

                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', array('type'=>'password','class'=>'form-control')) !!}

            {!! Form::label('password_confirmation', 'password confirmation:') !!}
            {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}

                {!! Form::submit('Lưu', array('class'=>'btn btn-primary', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection