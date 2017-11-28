@extends('layouts.fontend-layouts.master')
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
        <?php for ($i=1;$i<1000;$i++) {?>
        $('#CartUp<?php echo $i;?>').on('change keyup',function () {
            var rowid = $('#rowId<?php echo $i;?>').val();
            var proid = $('#proId<?php echo $i;?>').val();
            var qty = $('#CartUp<?php echo $i;?>').val();
            if(qty <=0){
                alert('vui lòng nhập đúng số lượng');
                $.ajax({
                    url: '<?php echo url('cart/plus')?>/'+rowid,
                    type: 'GET',
                    dataType: 'html',
                    data: "rowid="+rowid+"& proid="+proid+"& qty="+1,
                    success: function (data) {
                        $('#UpdateCart').html(data);
                    }
                });
            }else{
                $.ajax({
                    url: '<?php echo url('cart/plus')?>/'+rowid,
                    type: 'GET',
                    dataType: 'html',
                    data: "rowid="+rowid+"& proid="+proid+"& qty="+qty,
                    success: function (data) {
                        $('#UpdateCart').html(data);
                    }
                });
            }
        });
        <?php }?>
    });
</script>
<div id="all">

    <div id="content">
        <div class="container">
            <div id="UpdateCart">

                <div class="col-md-12">
                    <ul class="breadcrumb">

                        <li><a href="/">Trang chủ</a>
                        </li>
                        <li>Giỏ hàng</li>
                    </ul>


                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Giỏ hàng</h1>
                                <p class="text-muted">Bạn có {{count($cart)}} mặt hàng trong giỏ.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 clearfix" id="basket">

                    <div class="box">
                                @if(count($cart))
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="cart_menu text-center">
                                                    <td class="image">Item</td>
                                                    <td class="name">Tên Sản Phẩm</td>
                                                    <td class="gia">Giá</td>
                                                    <td class="thue">Thuế</td>
                                                    <td class="quantity">Số Lượng</td>
                                                    <td class="total">Tổng Giá</td>
                                                    <td class="options">Tùy Chọn</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count = 1 ?>
                                            @foreach($cart as $item)
                                                <tr class="text-center">
                                                        <td class="image">
                                                            <a href="{{route('product_detail',[$item->id])}}"><img src="/images/upload/{{   $item->options->has('img') ? $item->options->img : '' }}" alt="" style="width: 180px; height: 150px;" class="img-responsive"></a>
                                                        </td>
                                                        <td class="name">
                                                            <a href="{{route('product_detail',[$item->id])}}"><span><p>{{$item->name}}</p></span></a>
                                                        </td>
                                                        <td class="cart_price">
                                                            <p>{{number_format($item->price,0,",","." )}} ₫</p>
                                                        </td>
                                                        <td class="cart_tax">
                                                            <p>{{number_format($item->tax * $item->qty,0,",","." )}} ₫</p>
                                                        </td>
                                                        <td class="cart_quantity">
                                                            <div class="cart_quantity_button">
                                                                <input class="tokens" type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="idrow" id="rowId<?php echo $count;?>" value="{!! $item->rowId !!}"/>
                                                                <input type="hidden" name="idpro" id="proId<?php echo $count;?>" value="{!! $item->id !!}"/>
                                                                <input id="CartUp<?php echo $count;?>"  class="cart_quantity_input text-center" type="number" min="1" max="110" name="qty" value="{{$item->qty}}" autocomplete="off" size="1">
                                                            </div>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price">{{$item->subtotal}}₫</p>
                                                        </td>
                                                        <td class="cart_delete">
                                                            {!! Form::open(['route'=>['deleteshoppingcart.delete-cart',$item->rowId], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}                                    
                                                            <button class="btn green right" type="submit">
                                                            <span class="fa fa-cart-plus"></span>
                                                            Xóa
                                                            </button>
                                                            {!! Form::close() !!}
                                                        </td>
                                                </tr>
                                                <tr>
                                                <?php
                                                    $tonkho = \App\TonKho::where('id_sanpham',$item->id)->first();
                                                ?> 
                                                    <td>
                                                        @if($tonkho["soluong"] < $item->qty)
                                                            <p class="text-danger">Số lượng chỉ còn {!! $tonkho["soluong"] !!} không đù chúng tôi sẽ giao hàng trể cho quý khách khi nhập hàng trong thời gian ngắn nhất nếu đồng ý xin vui lòng đặt hàng</p>
                                                        @else
                                                        @endif
                                                    </td> 
                                                </tr>
                                            <?php $count++?>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Tổng</th>
                                                    <th colspan="2">{{Cart::total()}}₫</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                @else
                                    <p>Bạn chưa có sản phẩm nào trong giỏ</p>
                                @endif

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('product_full')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Tiếp tục mua hàng</a>
                                </div>
                                <div class="pull-right">
                                    @if(count($cart))  
                                        <a href="{{route('checkout1')}}" type="button" class="btn btn-primary">Kiểm tra đơn hàng <i class="fa fa-chevron-right"></i>
                                        </a>
                                    @else
                                        <a href="#" type="button" class="btn btn-primary" disabled="disabled">
                                            <span class="fa fa-arrow-circle-right"></span>Đặt Hàng
                                        </a>
                                    @endif
                                </div>
                            </div>

                    </div>
                    <!-- /.box -->

                    <div class="row">
                    <?php $sptop = \App\SanPham::orderBy('id','DESC')->take(3)->get(); ?>
                        <div class="col-md-3">
                            <div class="box">
                                <h3>Bạn cũng có thể thích những sản phẩm này.</h3>
                            </div>
                        </div>
                        @foreach($sptop as $sp)
                        <div class="col-md-3">
                            <div class="product">
                                <div class="image">
                                    <a href="{{route('product_detail',[$sp->id])}}">
                                        <img src="/images/upload/{{$sp->image}}" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <div class="text">
                                    <h3><a href="{{route('product_detail',[$sp->id])}}">{{$sp->ten_sanpham}}</a></h3>
                                    @if($sp->giamgia != 0)
                                        <p class="price"><del>{!! number_format($sp->giacu,0,",","." ) !!} </del> 
                                        {!! number_format($sp->dongia,0,",","." ) !!} 
                                        ₫/{!! $sp->donvitinh !!}</p>
                                    @else
                                        <p class="price">{!! number_format($sp->dongia,0,",","." ) !!} 
                                        ₫/{!! $sp->donvitinh !!}</p>
                                    @endif
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Tóm tắt đơn hàng</h3>
                        </div>
                        <p class="text-muted">Vận chuyển và chi phí bổ sung được tính toán dựa trên các giá trị bạn đã nhập.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Tổng giá đơn hàng</td>
                                        <th>{{Cart::subtotal()}}₫</th>
                                    </tr>
                                    <tr>
                                        <td>Thuế</td>
                                        <th>{{ Cart::tax()}}₫</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng tiền</td>
                                        <th>{{Cart::total()}}₫</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
</div>
<!-- /#all -->
@endsection