@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
            <!-- thong bao loi-->
            @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['loaisanpham.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                {!! Form::label('id_danhmuc', 'Danh Mục:') !!}
                <!-- name,(value, option), selected -->
                {!! Form::select('id_danhmuc',$danhmuc, $data->id_danhmuc,
                    ['id' => 'id_danhmuc', 'class' => 'form-control', 'placeholder' => 'Chọn Admin...']) !!}

                {!! Form::label('ten_loai', 'Tên Loại:') !!}
                {!! Form::text('ten_loai', null, array('class'=>'form-control')) !!}

                {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection