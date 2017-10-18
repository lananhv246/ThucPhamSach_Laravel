@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-md-6">
            <h2>Cập Nhật Thông Tin Cho {!! $data->name !!}</h2>
            <!-- thong bao loi-->
            {!! Form::model($data,
            ['route' => ['users.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, array('class'=>'form-control')) !!}

            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, array('disabled' => 'disabled','class'=>'form-control')) !!}

            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', array('class'=>'form-control')) !!}

            {!! Form::label('password_confirmation', 'password confirmation:') !!}
            {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}

            {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection