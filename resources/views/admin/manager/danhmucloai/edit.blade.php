@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data,
            ['route' => ['danhmucloai.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]
            ) !!}

                {!! Form::label('ten_danhmuc', 'Tên Danh Mục:') !!}
                {!! Form::text('ten_danhmuc', null, array('class'=>'form-control')) !!}


                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection