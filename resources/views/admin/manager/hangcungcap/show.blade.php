@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Hàng Cung Cấp</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nhà Cung Cấp</th>
                        <th>Trạm Trung Chuyển</th>
                        <th>Giá Trị</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->nhacungcap->ten_ncc !!}</td>
                        <td>{!! $data->tramtrungchuyen->ten_tram !!}</td>
                        <td>{!! $data->giatri !!}</td>
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
                            <a href="{{route('hangcungcap.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                            <a href="{{route('hangcungcap.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil"></span>Chỉnh Sửa</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection