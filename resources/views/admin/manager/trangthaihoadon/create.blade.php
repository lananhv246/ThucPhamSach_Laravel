@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New</h1>
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'trangthaihoadon.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('ten_trangthai', 'Tên Trạng Thái:') !!}
            {!! Form::text('ten_trangthai', null, array('class'=>'form-control')) !!}

            <a href="{{route('trangthaihoadon.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Back</a>

            {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection