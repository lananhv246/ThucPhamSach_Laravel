@extends('admin.admin_home')
@section('admins')
<script>
        $(document).ready(function(){
            function addrow() {
                var $n = $('#addrow').children().length + 1;
                $("#addrow").append(
                    '<tr class="row' + $n + '">' +
                        '<td>{!! Form::select("id_sanphammoi[]",$sanpham, null,["id" => "id_sanpham", "class" => "form-control", "placeholder" => "Chọn Sản Phẩm"]) !!}</td>' +
                        '<td>{!! Form::text("soluongmoi[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::text("dongiamoi[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::select("donvitinhmoi[]", ["kg" => "Kilogam", "Bó" => "Bó"], null, ["class" => "form-control"]) !!}</td>' +
                        '<td><div class="delete_order_pro' + $n + '"><span class="fa fa-minus btn btn-sm red btn-danger" aria-hidden="true"></span></div></td>' +
                    '</tr>'
                );
                $('.delete_order_pro' + $n).on('click', function (e) {
//                        alert($n);
                    e.preventDefault();
                    $('.row' + $n).remove();
                });
            }

            $('#add_order_pro').click(function () {
                addrow();
            });
        });
    </script>
        <div class="col-md-12">
            @include('flashmessage.flashmessage')
            {!! Form::model($data, ['route' => ['phieunhap.update', $data->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Phiếu Nhập</h3>
                    <div class="col-md-12">
                        <div class="col-md-4">
                        {!! Form::label('tramtrungchuyen', 'Trạm Trung Chuyển:') !!}
                        {!! Form::select('id_tram',$tramtc, $data->id_tram,
                            ['id' => 'id_tram', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                        {!! Form::label('id_admin', 'Admin' ) !!}
                        {!! Form::label('id_admin', Auth::guard('admin')->user()->name, array('disabled'=>'disabled','class'=>'form-control') ) !!}
                        </div>
                        {{--  <div class="col-md-4">
                        {!! Form::label('ten_phieunhap', 'Tên Phiếu:') !!}
                        {!! Form::text('ten_phieunhap', null, array('class'=>'form-control')) !!}
                        </div>  --}}
                    </div>
                        {!! Form::submit('Sửa', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
                </div>
                <div class="panel-body">
                    <h3>Phiếu Nhập Chi Tiết</h3>
                    <!-- thong bao loi-->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Đơn vị tính</th>
                            <th><div id="add_order_pro"><a class="btn btn-sm red btn-danger" ><span class="fa fa-plus-circle fa-2x"></span>Thêm</a></div></th>
                        </tr>
                        </thead>
                        <tbody id="addrow">
                        @if($data->phieunhapchitiet->count() > 0)
                            @foreach($data->phieunhapchitiet as $pnct)
                                <tr>
                                    <td>{!! Form::select("id_sanpham[]",$sanpham, $pnct->id_sanpham,["id" => "id_sanpham", "class" => "form-control", "placeholder" => "Chọn Sản Phẩm"]) !!}</td>
                                    <td>{!! Form::text("soluong[]", $pnct->soluong, array("class"=>"form-control")) !!}</td>
                                    <td>{!! Form::text("dongia[]", $pnct->dongia, array("class"=>"form-control")) !!}</td>
                                    <td>{!! Form::select("donvitinh[]", ["kg" => "Kilogam", "Bó" => "Bó"], $pnct->donvitinh, ["class" => "form-control", "placeholder" => "Chọn đơn vị tính..."]) !!}</td>
                                    <td><a href="{{route('phieunhapchitiet.show',[$pnct->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Xem</a></td>
                                    {{--  <td>{!! Form::open(['route'=>['phieunhapchitiet.destroy', $pnct->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-success btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}</td>  --}}
                                </tr>
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