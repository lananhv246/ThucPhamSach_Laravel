@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::open(['route' => 'phieuxuatkho.store','enctype'=>"multipart/form-data"]) !!}

            {!! Form::label('ten_phieuxuatkho', 'Tên Phiếu  Xuất Kho:') !!}
            {!! Form::text('ten_phieuxuatkho', null, array('class'=>'form-control')) !!}

            {!! Form::label('admin', 'Chọn Admin:') !!}
            {!! Form::select('id_admin',$admin, null,
                ['id' => 'admin', 'class' => 'form-control', 'placeholder' => 'Chọn Admin']) !!}

            {!! Form::label('khachhang', 'Chọn Khách Hàng:') !!}
            {!! Form::select('id_khachhang',$khachhang, null,
                ['id' => 'id_khachhang', 'class' => 'form-control', 'placeholder' => 'Chọn Khách Hàng']) !!}

            {!! Form::label('tongsoluong', 'Tổng Số Lượng:') !!}
            {!! Form::text('tongsoluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('tonggia', 'Tổng gia:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitien', 'Đơn vị tiền:') !!}
            {!! Form::text('donvitien', null, array('class'=>'form-control')) !!}

            <a href="{{route('phieuxuatkho.index') }}" class="btn btn-sm red btn-danger">
                <span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>

            {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            {!! Form::close() !!}
        </div>
@endsection