@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['tonkho.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::select('id_sanpham',$sanpham, $data->id_sanpham,
                            ['id' => 'id_sanpham', 'class' => 'form-control', 'placeholder' => 'Chọn Sản Phẩm']) !!}
            {!! Form::label('soluong', 'Số Lượng Tồn:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            {!! Form::submit('submit', array('class'=>'btn btn-submit btn-sm')) !!}

            {!! Form::close() !!}
        </div>
@endsection