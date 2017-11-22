@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'phieuxuatkhochitiet.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('id_tonkho', 'Tồn Kho:') !!}
            {!! Form::select('id_tonkho',$tonkho, null,
                ['id' => 'id_tonkho', 'class' => 'form-control', 'placeholder' => 'Chọn Tồn Kho']) !!}

            {!! Form::label('id_phieuxuatkho', 'Phiếu Xuất Kho:') !!}
            {!! Form::select('id_phieuxuatkho',$phieuxuatkho, null,
                ['id' => 'id_phieuxuatkho', 'class' => 'form-control', 'placeholder' => 'Phiếu Xuất Kho']) !!}

            {!! Form::label('soluong', 'Số lượng:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('dongia', 'Đơn Giá:') !!}
            {!! Form::text('dongia', null, array('class'=>'form-control')) !!}

            {!! Form::label('thue', 'Thuế:') !!}
            {!! Form::text('thue', null, array('class'=>'form-control')) !!}


            <a href="{{route('phieuxuatkhochitiet.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection