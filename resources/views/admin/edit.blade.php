@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data,
            ['route' => ['admins.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, array('disabled' => 'disabled','class'=>'form-control')) !!}

            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, array('disabled' => 'disabled','class'=>'form-control')) !!}

                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', array('type'=>'password','class'=>'form-control')) !!}

            {!! Form::label('password_confirmation', 'password confirmation:') !!}
            {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}

                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection