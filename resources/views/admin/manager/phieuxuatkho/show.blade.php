@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Phiếu Xuất Kho</dt></h3></div>
            <div class="col-md-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Hóa Đơn</th>
                        <th>Admin</th>
                        <th>Khách Hàng</th>
                        <th>Tổng số sản phẩm</th>
                        <th>Tổng Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        {{--  <td>{!! $data->id !!}</td>
                        <td>{!! $data->ten_hoadon !!}</td>
                        <td>{!! $data->admin->email !!}</td>
                        <td>{!! $data->user->email !!}</td>
                        <td>{!! $data->tongsoluong !!}</td>
                        <td>{!! $data->tonggia !!}</td>
                        <td>{!! $data->donvitien !!}</td>  --}}
                        {{--  array  --}}
                        <td>{!! $data["id"] !!}</td>
                        <td>{!! $data["ten_phieuxuatkho"] !!}</td>
                        <td>{!! $data->admin["email"] !!}</td>
                        <td>{!! $data->khachhang["email"] !!}</td>
                        <td>{!! $data["tongso_sanpham"] !!}</td>
                        <td>{!! $data["tonggia"] !!}</td>
                    </tr>
                    </tbody>
                </table>
                <h4>Phiếu Xuất Kho Chi Tiết</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Phiếu Xuất Kho</th>
                        <th>Số Lượng</th>
                        <th>Đơn giá</th>
                        <th>Thuế</th>
                        <th>Nợ</th>
                        <th>Tồn</th>
                    </tr>
                    </thead?
                    <tbody>
                    @foreach($data->phieuxuatkhochitiet as $phieuxuatkhoct)
                        <tr>
                            <td>{!! $phieuxuatkhoct->id !!}</td>
                            <td>{!! $phieuxuatkhoct->tonkho->sanpham->ten_sanpham !!}</td>
                            <td>{!! $phieuxuatkhoct->phieuxuatkho->ten_phieuxuatkho !!}</td>
                            <td>{!! $phieuxuatkhoct->soluong !!}</td>
                            <td>{!! $phieuxuatkhoct->dongia !!}</td>
                            <td>{!! $phieuxuatkhoct->thue !!}</td>
                            @if(isset($phieuxuatkhoct->donhangno))
                            <td> {!! $phieuxuatkhoct->donhangno->soluong_no !!}</td>
                            @if($phieuxuatkhoct->tonkho->soluong >=  $phieuxuatkhoct->donhangno->soluong_no)
                            <td><i class="fa fa-check" aria-hidden="true">({{$phieuxuatkhoct->tonkho->soluong}})</i></td>
                            @else
                            <td><i class="fa fa-times" aria-hidden="true">({{$phieuxuatkhoct->tonkho->soluong}})</i></td>
                            @endif
                            @else
                            <td>0</td>
                            <td><i class="fa fa-check" aria-hidden="true">({{$phieuxuatkhoct->tonkho->soluong}})</i></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Ngày Tháng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ngày Thêm Mới: {!! $data["created_at"] !!}</td>
                    </tr>
                    <tr>
                        <td>Ngày Chỉnh Sủa: {!! $data["updated_at"] !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('phieuxuatkho.index') }}" class="btn btn-primary">
                                <span class="fa fa-arrow-circle-left"></span>Trở Về</a>
                            @if(count($data->id_admin) != null)
                            <a href="#" disabled class="btn btn-primary">
                                <span class="fa fa-pencil"></span>Đả duyệt hàng</a>
                            @else
                            <a href="{{route('phieuxuatkho.edit',[$data->id]) }}" class="btn btn-primary">
                                <span class="fa fa-pencil"></span>Duyệt Phiếu xuất kho</a>
                            @endif
                            <?php $cono = 0;
                                    $error = 0;
                            foreach($data->phieuxuatkhochitiet as $pxkct)
                            {
                                $hangno =\App\DonHangNo::where('id_phieu_xuat_kho_chi_tiet',$pxkct->id)->first();
                                if(count($pxkct->donhangno) > 0){
                                    $cono += count($hangno);
                                    if( $hangno->phieuxuatkhochitiet->tonkho->soluong >= $hangno->soluong_no){
                                        $error = $error +1;
                                        }
                                    else
                                        $error = $error;
                                    }
                                else{}
                            }
                             ?>
                            @if($cono != 0)
                                @if($error >0)
                                    {{--  {!! Form::open(['route'=>['phieuxuatkho.createnewoldorder', $data->id], 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                                    {!! Form::submit('giao đơn hàng nợ', ['class'=>'btn btn-success btn-sm']) !!}
                                    {!! Form::close() !!}  --}}
                                    <a href="{{route('phieuxuatkho.createnewoldorder',[$data->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span>Giao Đơn Hàng Nợ</a>
                            
                                @else
                                <div>Số lượng không đủ giao</div>
                                @endif
                            @else
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection