@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Chức Vụ</dt></h3></div>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin</th>
                    <th>Tên Chức Vụ</th>
                    <th>Quyền</th>
                    <th>Lever</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $chucvu)
                <tr>
                    <td>{!! $chucvu->id !!}</td>
                    <td>{!! $chucvu->admin->name !!}</td>
                    <td>{!! $chucvu->ten_chucvu !!}</td>
                    <td>{!! $chucvu->quyen !!}</td>
                    <td>{!! $chucvu->lever !!}</td>
                    <td>
                        <a href="{{route('chucvu.show',[$chucvu->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-eye fa-2x"></span>Xem</a>
                    </td>
                    <td>
                        {!! Form::open(['route'=>['chucvu.destroy', $chucvu->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Trở về</a>
                    <a href="{{route('chucvu.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Thêm mới</a>
                </tr>
            </tbody>
        </table>
        <!-- phan trang -->
        {!! $data->links() !!}
    </div>
@endsection