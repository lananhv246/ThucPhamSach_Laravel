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
                        <th>Khách Hàng</th>
                        <th>Tổng Giá</th>
                        <th>Tổng số sản phẩm</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->ten_hoadon !!}</td>
                        <td>{!! $data->user->email !!}</td>
                        <td>{!! $data->tonggia !!}</td>
                        <td>{!! $data->tongso_sanpham !!}</td>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hóa Đơn</th>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Tổng Thuế</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data->hoadonchitiet))
                    @foreach($data->hoadonchitiet as $chitiet)
                    <tr>
                        <td>{!! $chitiet->id !!}</td>
                        <td>{!! $chitiet->hoadon->ten_hoadon !!}</td>
                        <td>{!! $chitiet->sanpham->ten_sanpham !!}</td>
                        <td>{!! $chitiet->soluong !!}</td>
                        <td>{!! $chitiet->dongia !!}</td>
                        <td>{!! $chitiet->thue !!}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>Không có chi tiết</td>
                    </tr>
                    @endif
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
                            <a href="{{route('hoadon.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                            {{--  <a href="{{route('hoadon.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil"></span>Sửa</a>  --}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection