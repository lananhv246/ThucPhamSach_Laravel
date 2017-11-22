@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Phiếu Nhập Chi Tiết</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $pnct)
                    <tr>
                        <td>{!! $pnct->id !!}</td>
                        <td>{!! $pnct->phieunhap->ten_phieunhap !!}</td>
                        <td>{!! $pnct->sanpham->ten_sanpham !!}</td>
                        <td>{!! $pnct->soluong !!}</td>
                        <td>{!! $pnct->dongia !!}</td>
                        <td>{!! $pnct->donvitinh !!}</td>
                        <td>
                            <a href="{{route('phieunhapchitiet.show',[$pnct->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['phieunhapchitiet.destroy', $pnct->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trờ Về</a>
                    <a href="{{route('phieunhapchitiet.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>

@endsection