@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Chỉnh Sửa</h1>
        @include('flashmessage.flashmessage')
        <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['phieuxuatkhochitiet.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('id_tonkho', 'Tồn Kho:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_tonkho',$tonkho, $data->id_tonkho,
                ['id' => 'id_tonkho', 'class' => 'form-control', 'placeholder' => 'Chọn Tồn Kho']) !!}

            {!! Form::label('id_phieuxuatkho', 'Phiếu Xuất Kho:') !!}
            <!-- name,(value, option), selected -->
                {!! Form::select('id_phieuxuatkho',$phieuxuatkho, $data->id_phieuxuatkho,
                    ['id' => 'id_phieuxuatkho', 'class' => 'form-control', 'placeholder' => 'Chọn Phiếu Xuất kho']) !!}

            {!! Form::label('soluong', 'Số Lượng:') !!}
            {!! Form::text('soluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('dongia', 'Đơn Giá:') !!}
            {!! Form::text('dongia', null, array('class'=>'form-control')) !!}

            {!! Form::label('thue', 'Thuế:') !!}
            {!! Form::text('thue', null, array('class'=>'form-control')) !!}

            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection