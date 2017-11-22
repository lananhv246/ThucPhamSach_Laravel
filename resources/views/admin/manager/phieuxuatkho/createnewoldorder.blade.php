@extends('admin.admin_home')
@section('admins')
        <div class="col-md-12">
            @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['phieuxuatkho.storenewoldorder', $data->id],  'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Phiếu Xuất Kho Hàng chưa giao đủ</h3>
                    <div class="col-md-12">
                        <div class="col-md-4">
                        {!! Form::label('id_admin', 'Admin' ) !!}
                        {!! Form::label('id_admin', Auth::guard('admin')->user()->name, array('disabled'=>'disabled','class'=>'form-control') ) !!}
                        </div>
                        <div class="col-md-12">
                        {!! Form::submit('Thêm', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class='col-md-8'><h3>Phiếu Xuất Kho Chi Tiết</h3></div>
                    <!-- thong bao loi-->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Thuế</th>
                        </tr>
                        </thead>
                        <tbody id="addrow">
                        @if($data->phieuxuatkhochitiet->count() > 0)
                            @foreach($data->phieuxuatkhochitiet as $pxkct)
                            @if(count($pxkct->donhangno) > 0)
                                @if($pxkct->tonkho->soluong >= $pxkct->donhangno->soluong_no)
                                <tr>
                                    <td>{!! Form::text("soluong[]", $pxkct->donhangno->soluong_no, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                    <td>{!! Form::text("dongia[]", $pxkct->dongia, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                    <td>{!! Form::text("thue[]", $pxkct->thue, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                </tr>
                                @elseif($pxkct->tonkho->soluong > 0)
                                <tr>
                                    <td>{!! Form::text("soluong[]", $pxkct->tonkho->soluong, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                    <td>{!! Form::text("dongia[]", $pxkct->dongia, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                    <td>{!! Form::text("thue[]", $pxkct->thue, array('disabled'=>'disabled',"class"=>"form-control")) !!}</td>
                                </tr>
                                @else
                                @endif
                            @else
                            @endif
                            @endforeach
                        @else
                        {{--  <div>close</div>  --}}
                        @endif
                        </tbody>
                    </table>
                </div>
            {!! Form::close() !!}
        </div>
@endsection