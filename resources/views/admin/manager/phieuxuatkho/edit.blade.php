@extends('admin.admin_home')
@section('admins')
        <div class="col-md-8 col-md-offset-2">
            <h1>Cập Nhật</h1>
            @include('flashmessage.flashmessage')
            <!-- thong bao loi-->
            {!! Form::model($data, ['route' => ['phieuxuatkho.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

            {{--  {!! Form::label('id_admin', 'Admin' ) !!}
            {!! Form::text('id_admin', Auth::guard('admin')->user()->name, array('disabled'=>'disabled','class'=>'form-control') ) !!}  --}}
            <div class="col-md-4">
            {!! Form::label('id_khachhang', 'Tên Khách Hàng:') !!}
            <!-- name,(value, option), selected -->
            {!! Form::text('id_khachhang',$data->khachhang->name,['disabled'=>'disabled','id' => 'khachhang', 'class' => 'form-control']) !!}
            </div>
            <div class="col-md-4">
            {!! Form::label('tongso_sanpham', 'Tổng Số sản phẩm:') !!}
            {!! Form::text('tongso_sanpham', null, array('disabled'=>'disabled','class'=>'form-control')) !!}
            </div>
            <div class="col-md-4">
            {!! Form::label('tonggia', 'Tổng giá:') !!}
            {!! Form::text('tonggia', null, array('disabled'=>'disabled','class'=>'form-control')) !!}
            </div>
            {!! Form::submit('Lưu', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
            @if(count($data->phieuxuatkhochitiet) >0)
            <h3>Phiếu Xuất Kho Chi Tiết</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    {{--  <th>Phiếu Xuất Kho</th>  --}}
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thuế</th>
                </tr>
                </thead>
            @foreach($data->phieuxuatkhochitiet as $pxkchitiet)
                <tbody>
                    {{--  <td>{!! Form::textarea("phieuxuatkho[]", $pxkchitiet->phieuxuatkho->ten_phieuxuatkho, array("class"=>"form-control")) !!}</td>  --}}
                    <td>{!! Form::text("soluong[]", $pxkchitiet->soluong, array("class"=>"form-control")) !!}</td>
                    <td>{!! Form::text("dongia[]", $pxkchitiet->dongia, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                    <td>{!! Form::text("thue[]", $pxkchitiet->thue, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>              
                </tbody>
            @endforeach
            </table>
            @else
            bbbb
            @endif
            {!! Form::close() !!}
        </div>
@endsection