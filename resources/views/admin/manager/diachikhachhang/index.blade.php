@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Địa Chỉ Khách Hàng</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dckh)
                    <tr>
                        <td>{!! $dckh->id !!}</td>
                        <td>{!! $dckh->user->email !!}</td>
                        <td>{!! $dckh->diachi !!}</td>
                        <td>{!! $dckh->dienthoai !!}</td>
                        <td>
                            <a href="{{route('diachikh.show',[$dckh->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['diachikh.destroy', $dckh->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('diachikh.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
            <!-- phan trang -->
            {!! $data->links() !!}
        </div>
@endsection