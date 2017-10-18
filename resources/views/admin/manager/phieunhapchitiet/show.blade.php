@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Phiếu Nhập Chi Tiết</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Phiếu Nhập</th>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Đơn Vị Tiền</th>
                        <th>Đơn Vị Tính</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $data->id !!}</td>
                            <td>{!! $data->phieunhap->ten_phieunhap !!}</td>
                            <td>{!! $data->sanpham->ten_sanpham !!}</td>
                            <td>{!! $data->soluong !!}</td>
                            <td>{!! $data->dongia !!}</td>
                            <td>{!! $data->donvitien !!}</td>
                            <td>{!! $data->donvitinh !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Date Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->created_at !!}</td>
                    </tr>
                    <tr>
                        <td>{!! $data->updated_at !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('phieunhapchitiet.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            <a href="{{route('phieunhapchitiet.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection