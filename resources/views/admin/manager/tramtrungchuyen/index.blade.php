@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Trạm Trung Chuyển</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên Trạm</th>
                    <th>Địa Chỉ</th>
                    <th>Điện Thoại</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $tram)
                    <tr>
                        <td>{!! $tram->id !!}</td>
                        <td>{!! $tram->ten_tram !!}</td>
                        <td>{!! $tram->diachi !!}</td>
                        <td>{!! $tram->dienthoai !!}</td>
                        <td>
                            <a href="{{route('tramtrungchuyen.show',[$tram->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['tramtrungchuyen.destroy', $tram->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('tramtrungchuyen.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection