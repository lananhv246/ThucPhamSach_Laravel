@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Phiếu Xuất Kho</dt></h3></div>
            @foreach($data as $phieuxuatkho)
            @endforeach
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Phiếu Xuất Kho</th>
                    <th>Admin</th>
                    <th>Khách Hàng</th>
                    <th>Tổng số sản phẩm</th>
                    <th>Tổng Giá</th>
                    <th>Tình Trạng</th>
                    <th>Nợ</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $phieuxuatkho)
                    <tr>
                    {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        {{--  <td>{!! $phieuxuatkho->id !!}</td>
                        <td>{!! $phieuxuatkho->ten_phieuxuatkho !!}</td>
                        <td>{!! $phieuxuatkho->admin->email !!}</td>
                        <td>{!! $phieuxuatkho->khachhang->email !!}</td>
                        <td>{!! $phieuxuatkho->tongso_sanpham !!}</td>
                        <td>{!! $phieuxuatkho->tonggia !!}</td>
                        <td>{!! $phieuxuatkho->donvitien !!}</td>  --}}
                        {{--  array  --}}
                        <td>{!! $phieuxuatkho["id"] !!}</td>
                        <td>{!! $phieuxuatkho["ten_phieuxuatkho"] !!}</td>
                        <td>{!! $phieuxuatkho->admin["email"] !!}</td>
                        <td>{!! $phieuxuatkho->khachhang["email"] !!}</td>
                        <td>{!! $phieuxuatkho["tongso_sanpham"] !!}</td>
                        <td>{!! $phieuxuatkho["tonggia"] !!}</td>
                        <td>
                            @if($phieuxuatkho->id_admin != null)
                            Đả Duyệt
                            @else
                            Chưa Duyệt
                            @endif
                        </td>
                        <td>
                        <?php $count = 0 ?>
                            @if(isset($phieuxuatkho->phieuxuatkhochitiet))
                            @foreach($phieuxuatkho->phieuxuatkhochitiet as $pxkct)
                            <?php $count += isset($pxkct->donhangno) ?>
                            @endforeach
                            @if($count != 0)
                            <div>Có</div>
                            @else
                            <div>0</div>
                            @endif
                            @else
                            <div>không có pxkct</div>
                            @endif
                        
                        </td>
                        <td>
                            <a href="{{route('phieuxuatkho.show',[$phieuxuatkho->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Xem</a>
                        </td>
                        <td>
                        @if($phieuxuatkho->id_admin != null)
                            Đả Giao hàng
                        @else
                            {!! Form::open(['route'=>['phieuxuatkho.destroy', $phieuxuatkho->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                    <a href="{{route('phieuxuatkho.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle"></span>Thêm Mới</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
    </div>
@endsection