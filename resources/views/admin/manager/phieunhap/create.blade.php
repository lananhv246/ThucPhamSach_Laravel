@extends('admin.admin_home')
@section('admins')
<script>
        $(document).ready(function(){
            function addrow() {
                var $n = $('#addrow').children().length + 1;
                $("#addrow").append(
                    '<tr class="row' + $n + '">' +
                        '<td>{!! Form::select("id_sanpham[]",$sanpham, null,["id" => "id_sanpham", "class" => "form-control", "placeholder" => "Chọn Sản Phẩm"]) !!}</td>' +
                        '<td>{!! Form::text("soluong[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::text("dongia[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::select("donvitien[]", ["vnđ" => "Việt Nam Đồng", "€" => "Euro", "$" => "USD"], null, ["class" => "form-control"]) !!}</td>' +
                        '<td>{!! Form::select("donvitinh[]", ["kg" => "Kilogam", "Bó" => "Bó"], null, ["class" => "form-control"]) !!}</td>' +
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
             <!-- thong bao loi-->
            @include('flashmessage.flashmessage')
            {!! Form::open(['route' => 'phieunhap.store','enctype'=>"multipart/form-data"]) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Phiếu Nhập Mới</h3>
                    <div class="col-md-12">
                        <div class="col-md-4">
                        {!! Form::label('tramtrungchuyen', 'Trạm Trung Chuyển:') !!}
                        {!! Form::select('id_tram',$tramtc, null,
                        ['id' => 'id_tram', 'class' => 'form-control', 'placeholder' => 'Chọn Trạm Trung Chuyển']) !!}
                        </div>
                        <div class="col-md-4">
                        {!! Form::label('id_admin', 'Admin' ) !!}
                        {!! Form::text('id_admin', Auth::guard('admin')->user()->name, array('disabled'=>'disabled','class'=>'form-control') ) !!}
                        </div>
                    </div>
                    {{--  {!! Form::label('ten_phieunhap', 'Tên Phiếu:') !!}
                    {!! Form::text('ten_phieunhap', null, array('class'=>'form-control')) !!}  --}}
                    
                    <a href="{{route('phieunhap.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>

                    {!! Form::submit('Thêm', array('class'=>'btn btn-success btn-sm', 'style' => 'margin:20px 0px')) !!}
                </div>
                <div class="panel-body">
                <h3>Phiếu Nhập Chi Tiết Mới</h3>
                    <!-- thong bao loi-->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                            <th>Đơn vị tiền</th>
                            <th>Đơn vị tính</th>
                            <th><div id="add_order_pro"><i class="fa fa-plus btn btn-sm red btn-danger" aria-hidden="true"></i></div></th>
                        </tr>
                        </thead>
                        <tbody id="addrow">
                        </tbody>
                    </table>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
@endsection