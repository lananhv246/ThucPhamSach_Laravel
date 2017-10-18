@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Phiếu Xuất Kho Chi Tiết</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tồn Kho</th>
                    <th>Phiếu Xuất Kho</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thuế</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $phieuxuatkhochitiet)
                    <tr>
                        <td>{!! $phieuxuatkhochitiet->id !!}</td>
                        <td>{!! $phieuxuatkhochitiet->tonkho->id_sanpham !!}</td>
                        <td>{!! $phieuxuatkhochitiet->phieuxuatkho->ten_phieuxuatkho !!}</td>
                        <td>{!! $phieuxuatkhochitiet->soluong !!}</td>
                        <td>{!! $phieuxuatkhochitiet->dongia !!}</td>
                        <td>{!! $phieuxuatkhochitiet->thue !!}</td>
                        <td>
                            <a href="{{route('phieuxuatkhochitiet.show',[$phieuxuatkhochitiet->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['phieuxuatkhochitiet.destroy', $phieuxuatkhochitiet->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('phieuxuatkhochitiet.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>
            <!-- phan trang -->
            {!! $data->links() !!}
        </div>
@endsection