@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Đại Chỉ Khách Hàng</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Điện Thoại</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->user->email !!}</td>
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
                            <a href="{{route('diachikh.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Back</a>
                            <a href="{{route('diachikh.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection