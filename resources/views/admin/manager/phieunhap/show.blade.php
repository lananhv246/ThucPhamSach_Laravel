@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Phiếu Nhập</dt></h3></div>
            <div class="col-md-10">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Phiếu</th>
                            <th>Trạm Trung Chuyển</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $data->id !!}</td>
                            <td>{!! $data->ten_phieunhap !!}</td>
                            <td>{!! $data->tramtrungchuyen->ten_tram !!}</td>
                            <td>{!! $data->admin->email !!}</td>
                        </tr>
                    </tbody>
                </table>
                
                <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Đơn vị tính</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->phieunhapchitiet->count() > 0)
                            @foreach($data->phieunhapchitiet as $pnct)
                                <tr>
                                    <td>{!! $pnct->sanpham->ten_sanpham !!}</td>
                                    <td>{!! $pnct->soluong !!}</td>
                                    <td>{!! $pnct->dongia!!}</td>
                                    <td>{!! $pnct->donvitinh !!}</td>
                                </tr>
                            @endforeach
                        @else
                        {{--  <div>close</div>  --}}
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
                       <td> Ngày Thêm :{!! $data->created_at !!}</td>
                    </tr>
                    <tr>
                        <td>Ngày Cập Nhật :{!! $data->updated_at !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('phieunhap.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Back</a>
                            <a href="{{route('phieunhap.edit',[$data->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span>Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection