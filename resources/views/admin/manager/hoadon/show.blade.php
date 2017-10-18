@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Hóa Đơn</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Hóa Đơn</th>
                        <th>Admin</th>
                        <th>Khách Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Tổng Giá</th>
                        <th>Ghi Chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        <td>{!! $hoadon->id !!}</td>
                        <td>{!! $hoadon->ten_hoadon !!}</td>
                        <td>{!! $hoadon->user->email !!}</td>
                        <td>{!! $hoadon->tonggia !!}</td>
                        <td>{!! $hoadon->tongsoluong !!}</td>
                        <td>{!! $hoadon->donvitien !!}</td>
                        {{--  array  --}}
                        {{--<td>{!! $data['id'] !!}</td>--}}
                        {{--<td>{!! $data['ten_hoadon'] !!}</td>--}}
                        {{--<td>{!! $data->user['email'] !!}</td>--}}
                        {{--<td>{!! $data['tonggia'] !!}</td>--}}
                        {{--<td>{!! $data['tongsoluong'] !!}</td>--}}
                        {{--<td>{!! $data['donvitien'] !!}</td>--}}
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
                            <a href="{{route('hoadon.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            <a href="{{route('hoadon.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection