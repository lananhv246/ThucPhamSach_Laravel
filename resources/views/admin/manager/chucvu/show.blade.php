@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Chức Vụ</dt></h3></div>
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admin</th>
                            <th>Tên Chức Vụ</th>
                            <th>Quyền</th>
                            <th>Cấp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $data->id !!}</td>
                            <td>{!! $data->admin->name !!}</td>
                            <td>{!! $data->ten_chucvu !!}</td>
                            <td>{!! $data->quyen !!}</td>
                            <td>{!! $data->lever !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Ngày tháng</th>
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
                            <a href="{{route('chucvu.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở về</a>
                            <a href="{{route('chucvu.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil"></span>Chỉnh sửa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection