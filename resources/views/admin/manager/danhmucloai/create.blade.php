@extends('admin.admin_home')
@section('admins')
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New</h1>
        @include('flashmessage.flashmessage')
        <!-- thong bao loi-->
        {!! Form::open(['route' => 'danhmucloai.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('ten_danhmuc', 'Tên Danh Mục:') !!}
            {!! Form::text('ten_danhmuc', null, array('class'=>'form-control')) !!}

        <a href="{{route('danhmucloai.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
        {!! Form::submit('submit', array('class'=>'btn btn-success btn=sm', 'style' => 'margin:20px 0px')) !!}
        {!! Form::close() !!}
    </div>
@endsection