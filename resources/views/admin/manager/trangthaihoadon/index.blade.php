@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Trạng Thái Đơn Hàng</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Trạng Thái</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $trangthai)
                    <tr>
                        <td>{!! $trangthai->id !!}</td>
                        <td>{!! $trangthai->ten_trangthai !!}</td>
                        <td>
                            <a href="{{route('trangthaihoadon.show',[$trangthai->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['trangthaihoadon.destroy', $trangthai->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('trangthaihoadon.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection