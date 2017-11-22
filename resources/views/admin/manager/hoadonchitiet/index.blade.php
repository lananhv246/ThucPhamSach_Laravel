@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Hóa Đơn Chi Tiết</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Hóa Đơn</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tiền</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $hdct)
                    <tr>
                        <td>{!! $hdct->id !!}</td>
                        <td>{!! $hdct->hoadon->ten_hoadon !!}</td>
                        <td>{!! $hdct->sanpham->ten_sanpham !!}</td>
                        <td>{!! $hdct->soluong !!}</td>
                        <td>{!! $hdct->dongia !!}</td>
                        <td>{!! $hdct->donvitien !!}</td>
                        <td>{!! $hdct->donvitinh !!}</td>
                        <td>
                            <a href="{{route('hoadonchitiet.show',[$hdct->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['hoadonchitiet.destroy', $hdct->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('hoadonchitiet.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
            <!-- phan trang -->
            {!! $data->links() !!}
        </div>
@endsection