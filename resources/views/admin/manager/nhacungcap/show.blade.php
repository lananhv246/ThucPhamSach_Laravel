@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Nhà Cung Cấp</dt></h3></div>
            <div class="col-md-10">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên Nhà cung cấp</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                        <th>lat - lng</th>
                        <th>Mã Số Thuế</th>
                        <th>Ghi Chú</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $data->id !!}</td>
                            <td>{!! $data->ten_ncc !!}</td>
                            <td>{!! $data->email !!}</td>
                            <td>{!! $data->diachi !!}</td>
                            <td>{!! $data->dienthoai !!}</td>
                            <td>{!! $data->lat !!} - {!! $data->lng !!}</td>
                            <td>{!! $data->maso_thue !!}</td>
                            <td>{!! $data->ghichu !!}</td>
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
                            <a href="{{route('nhacungcap.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            <a href="{{route('nhacungcap.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection