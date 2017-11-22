@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'hangcungcap.store','enctype'=>"multipart/form-data"]) !!}

                {!! Form::label('id_ncc', 'Chọn Nhà Cung Cấp:') !!}
                {!! Form::select('id_ncc',$ncc, null,
                    ['id' => 'id_ncc', 'class' => 'form-control', 'placeholder' => 'Chọn Nhà Cung Cấp']) !!}

                {!! Form::label('id_tram', 'Chọn Trạm:') !!}
                {!! Form::select('id_tram',$tramtc, null,
                    ['id' => 'id_tram', 'class' => 'form-control', 'placeholder' => 'Chọn Trạm']) !!}

                {!! Form::label('giatri', 'Giá Trị:') !!}
                {!! Form::text('giatri', null, array('class'=>'form-control')) !!}

            <a href="{{route('hangcungcap.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection