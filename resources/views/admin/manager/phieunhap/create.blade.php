@extends('admin.admin_home')
@section('admins')
<script>
        $(document).ready(function(){
            function addrow() {
                var $n = $('#addrow').children().length + 1;
                $("#addrow").append(
                    '<tr class="row' + $n + '">' +
                        '<td>{!! Form::select("id_sanpham[]",$sanpham, null,["id" => "id_sanpham", "class" => "sanpham form-control", "placeholder" => "Chọn Sản Phẩm"]) !!}</td>' +
                        '<td>{!! Form::text("soluong[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::text("dongia[]", null, array("class"=>"form-control")) !!}</td>' +
                        '<td>{!! Form::select("donvitinh[]", ["kg" => "Kilogam", "Bó" => "Bó"], null, ["class" => "form-control"]) !!}</td>' +
                        '<td><div class="delete_order_pro' + $n + '"><button class="btn btn-primary" type="button"><span class="fa fa-minus" aria-hidden="true"></span></button></div></td>' +
                    '</tr>'
                );
                $('.delete_order_pro' + $n).on('click', function (e) {
//                        alert($n);
                    e.preventDefault();
                    $('.row' + $n).remove();
                });
                $('select.sanpham').on('change', function() {
                    $('option').prop('hidden', false); //reset all the disabled options on every change event
                    $('select.sanpham').each(function() { //loop through all the select elements
                        var val = this.value;
                        $('select.sanpham').not(this).find('option').filter(function() { //filter option elements having value as selected option
                        return this.value === val;
                        }).prop('hidden', true); //disable those option elements
                    });
                }).change(); //trihgger change handler initially!
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
                    <div class="col-md-12">
                    <a href="{{route('phieunhap.index') }}" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

                    {!! Form::submit('Lưu', array('class'=>'btn btn-primary', 'style' => 'margin:20px 0px')) !!}
                    </div>
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
                            <th>Đơn vị tính</th>
                            <th><div id="add_order_pro"><button class="btn btn-primary" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button></div></th>
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