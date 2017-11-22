
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

                        <div class="col-md-8">
                        @if(count($cart))
                            <table class="table table-condensed">
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
                                                <p class="cart_total_price">{{$item->subtotal}} ₫</p>
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
                            </table>
                        @else
                            <p>Bạn chưa có sản phẩm nào trong giỏ</p>
                        @endif
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12 panel-footer">
                                <div class="heading">
                                    <h3>Tiếp Theo</h3>
                                </div>
                                <ul class="nav navbar">
                                    <div class="sub_total">
                                        <li>Tổng Số SP: <span> {{count($cart)}} </span></li>
                                    </div>
                                    <div class="sub_total">
                                        <li>Thuế: <span> {{ Cart::tax()}} ₫ </span></li>
                                    </div>
                                    <div class="sub_total">
                                        <li>Tổng Giá: <span>{{Cart::total()}} ₫</span></li>
                                    </div>
                                </ul>
                                <div class="chose_area">
                                    {{--  <a href="#" class="btn btn-sm red">
                                        <span class="fa fa-quora"></span>Get Quote
                                    </a>  --}}
                                    @if(count($cart))
                                        <a href="{{route('checkout.index')}}" class="btn btn-sm green">
                                            <span class="fa fa-arrow-circle-right"></span>Đặt Hàng
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-sm green " disabled="disabled">
                                            <span class="fa fa-arrow-circle-right"></span>Đặt Hàng
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>