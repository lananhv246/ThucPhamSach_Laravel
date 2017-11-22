@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['hangcungcap.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            <!-- name,(value, option), selected -->
                {!! Form::label('id_ncc', 'Chọn Nhà Cung Cấp:') !!}
                {!! Form::select('id_ncc',$ncc,$data->id_ncc,
                    ['id' => 'id_ncc', 'class' => 'form-control', 'placeholder' => 'Chọn Nhà Cung Cấp']) !!}

                {!! Form::label('id_tram', 'Chọn Trạm:') !!}
                {!! Form::select('id_tram',$tramtc,$data->id_tram,
                    ['id' => 'id_tram', 'class' => 'form-control', 'placeholder' => 'Chọn Trạm']) !!}

                {!! Form::label('giatri', 'Giá Trị:') !!}
                {!! Form::text('giatri', null, array('class'=>'form-control')) !!}

                {!! Form::submit('lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection