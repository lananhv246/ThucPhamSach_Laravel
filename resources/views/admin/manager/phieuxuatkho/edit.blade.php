@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['phieuxuatkho.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('ten_phieuxuatkho', 'Tên Phiếu Xuất Kho:') !!}
            {!! Form::text('ten_phieuxuatkho', null, array('class'=>'form-control')) !!}

            {!! Form::label('id_admin', 'Tên Admin:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_admin',$admin, $data->id_admin,
                ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Please Choose Admin']) !!}

            {!! Form::label('id_khachhang', 'Tên Khách Hàng:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_khachhang',$khachhang, $data->id_khachhang,
                ['id' => 'khachhang', 'class' => 'form-control', 'placeholder' => 'Please Choose Admin']) !!}

            {!! Form::label('tongsoluong', 'Tổng Số Lượng:') !!}
            {!! Form::text('tongsoluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('tonggia', 'Tổng giá:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitien', 'Đơn vị tiền:') !!}
            {!! Form::text('donvitien', null, array('class'=>'form-control')) !!}

                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection