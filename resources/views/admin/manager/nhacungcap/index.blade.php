@extends('admin.admin_home')
@section('admins')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Nhà Cung Cấp</dt></h3></div>
        <div class="panel-body">
            <table class="table table-hover">
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
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $nhacc)
                    <tr>
                        <td>{!! $nhacc->id !!}</td>
                        <td>{!! $nhacc->ten_ncc !!}</td>
                        <td>{!! $nhacc->email !!}</td>
                        <td>{!! $nhacc->diachi !!}</td>
                        <td>{!! $nhacc->dienthoai !!}</td>
                        <td>{!! $nhacc->lat !!} - {!! $nhacc->lng !!}</td>
                        <td>{!! $nhacc->maso_thue !!}</td>
                        <td>{!! $nhacc->ghichu !!}</td>
                        <td>
                            <a href="{{route('nhacungcap.show',[$nhacc->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['nhacungcap.destroy', $nhacc->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('nhacungcap.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
            <!-- phan trang -->
            {!! $data->links() !!}
        </div>
    </div>
@endsection