@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Sản Phẩm Chi Tiết</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Miêu Tả</th>
                        <th>Đánh Giá</th>
                        <th>Chế Biến</th>
                        <th>Thành Phần</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->sanpham->ten_sanpham !!}</td>
                        <td>{!! $data->mieuta !!}</td>
                        <td>{!! $data->danhgia !!}</td>
                        <td>{!! $data->chebien !!}</td>
                        <td>{!! $data->thanhphan !!}</td>
                    </tr>
                    <tr>
                        <div>
                            @foreach($data->imagelist as $images)
                                <div class="col-md-2">
                                    <img src="/{!! $images->duongdan !!}" class="img-responsive"/>
                                </div>
                            @endforeach
                        </div>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Ngày Tháng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ngày Thêm: {!! $data->created_at !!}</td>
                    </tr>
                    <tr>
                        <td>Ngày Cập Nhật{!! $data->updated_at !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('sanphamchitiet.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                            <a href="{{route('sanphamchitiet.edit',[$data->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span>Chỉnh Sửa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection