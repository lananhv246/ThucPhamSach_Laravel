@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Phiếu Nhập</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Phiếu</th>
                    <th>Trạm Trung Chuyển</th>
                    <th>Admin</th>
                    <th>Tùy chọn</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $phieunhap)
                    <tr>
                        <td>{!! $phieunhap->id !!}</td>
                        <td>{!! $phieunhap->ten_phieunhap !!}</td>
                        <td>{!! $phieunhap->tramtrungchuyen->ten_tram !!}</td>
                        <td>{!! $phieunhap->admin->email !!}</td>
                        <td>
                            <a href="{{route('phieunhap.show',[$phieunhap->id]) }}" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Show</a>
                        </td>
                        @if(count($phieunhap->phieunhapchitiet) > 0)
                        <td>có dử liệu</td>
                        @else
                        <td>
                            {!! Form::open(['route'=>['phieunhap.destroy', $phieunhap->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Back</a>
                    <a href="{{route('phieunhap.create') }}" class="btn btn-primary"><span class="fa fa-plus-circle"></span>Create</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection