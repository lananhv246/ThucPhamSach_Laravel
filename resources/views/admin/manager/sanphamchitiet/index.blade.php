@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Sản Phẩm Chi Tiết</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sản Phẩm</th>
                    <th>Miêu Tả</th>
                    <th>Đánh Giá</th>
                    <th>Chế Biến</th>
                    <th>Thành Phần</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $spct)
                    <tr>
                        <td>{!! $spct->id !!}</td>
                        <td>{!! $spct->sanpham->ten_sanpham !!}</td>
                        <td>{!! $spct->mieuta !!}</td>
                        <td>{!! $spct->danhgia !!}</td>
                        <td>{!! $spct->chebien !!}</td>
                        <td>{!! $spct->thanhphan !!}</td>
                        <td>
                            <a href="{{route('sanphamchitiet.show',[$spct->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['sanphamchitiet.destroy', $spct->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('sanphamchitiet.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection