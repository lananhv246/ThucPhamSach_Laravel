@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Sản Phẩm</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tiền</th>
                    <th>Đơn Vị Tính</th>
                    <th>Giảm Giá</th>
                    <th>Giá Củ</th>
                    <th>Hình ảnh</th>
                    <th>Tùy chọn</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $product)
                    <tr>
                        <td>{!! $product->id !!}</td>
                        <td>{!! $product->ten_sanpham !!}</td>
                        <td>{!! $product->loaisanpham->ten_loai !!}</td>
                        <td>{!! $product->dongia !!}</td>
                        <td>{!! $product->donvitien !!}</td>
                        <td>{!! $product->donvitinh !!}</td>
                        <td>{!! $product->giamgia !!}</td>
                        <td>{!! $product->giacu !!}</td>
                        <td><img src="/images/upload/{!! $product->image !!}" class="img-responsive"></td>
                        <td>
                            <a href="{{route('sanpham.show',[$product->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Chi tiết</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['sanpham.destroy', $product->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-success  btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Trở về</a>
                    <a href="{{route('sanpham.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Thêm mới</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection