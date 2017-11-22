@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Trạm Trung Chuyển</dt></h3></div>
            <div class="col-md-10">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên Trạm</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->ten_tram !!}</td>
                        <td>{!! $data->diachi !!}</td>
                        <td>{!! $data->dienthoai !!}</td>
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
                            <a href="{{route('tramtrungchuyen.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                            <a href="{{route('tramtrungchuyen.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil"></span>Chỉnh Sửa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection