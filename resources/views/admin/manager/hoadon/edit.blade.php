@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['hoadon.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {!! Form::label('ten_hoadon', 'Tên Hóa Đơn:') !!}
            {!! Form::text('ten_hoadon', null, array('class'=>'form-control')) !!}

            {!! Form::label('id_khachhang', 'Tên Khách Hàng:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::select('id_khachhang',$khachhang, $data->id_khachhang,
                ['id' => 'khachhang', 'class' => 'form-control', 'placeholder' => 'Please Choose Admin']) !!}

            {!! Form::label('tonggia', 'Tổng Giá:') !!}
            {!! Form::text('tonggia', null, array('class'=>'form-control')) !!}

            {!! Form::label('tongsoluong', 'Tổng số lượng:') !!}
            {!! Form::text('tongsoluong', null, array('class'=>'form-control')) !!}

            {!! Form::label('donvitien', 'Đơn vi5 tiền:') !!}
            {!! Form::textarea('donvitien', null, array('class'=>'form-control')) !!}

                {!! Form::submit('submit', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}

            {!! Form::close() !!}
        </div>
@endsection