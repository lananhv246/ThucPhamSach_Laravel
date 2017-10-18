<div class="container">
    <div class="panel panel-default">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Giỏ Hàng</li>
            </ol>
        </div>
        <div class="panel-body">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="heading">
                    <h2>GIỎ HÀNG</h2>
                </div>
                <div id="UpdateCart">
                    <div class="table-responsive col-md-8">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu text-center">
                                <td class="image">Item</td>
                                <td class="id_sp">ID</td>
                                <td class="name">Tên SP</td>
                                <td class="gia">Giá</td>
                                <td class="quantity">Số Lượng</td>
                                <td class="total">Tổng Giá</td>
                                <td class="options">Tùy Chọn</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td class="image">
                                    <a href="http://localhost:8000/chitiet/49"><img src="/images/upload/5992e2fbe585bcangat2.jpg" alt="" style="width: 180px; height: 150px;" class="img-responsive"></a>
                                </td>
                                <td class="id_sp">
                                    <a href="http://localhost:8000/chitiet/49"><span><p>49</p></span></a>
                                </td>
                                <td class="name">
                                    <a href="http://localhost:8000/chitiet/49"><span><p>Cá Ngát</p></span></a>
                                </td>
                                <td class="cart_price">
                                    <p>$100.000</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="tokens" type="hidden" name="_token" value="GM428oSx1ScCiVM4wGYvJX7AGI4jNpRPgFLOICzp">
                                        <input type="hidden" name="idrow" id="rowId1" value="a1d50aef6c6503c4dc5d8724454b3ac5">
                                        <input type="hidden" name="idpro" id="proId1" value="49">
                                        <input id="CartUp1" class="cart_quantity_input text-center" type="number" min="1" max="110" name="qty" value="1" autocomplete="off" size="1">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$100000</p>
                                </td>
                                <td class="cart_delete">
                                    <form method="POST" action="http://localhost:8000/shopping/delete-cart/a1d50aef6c6503c4dc5d8724454b3ac5" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="GM428oSx1ScCiVM4wGYvJX7AGI4jNpRPgFLOICzp">
                                        <button class="btn green right" type="submit">
                                            <span class="fa fa-cart-plus fa-2x"></span>
                                            BUY ITEM
                                        </button>
                                        {{--<input class="btn btn-success" value="Xoa">--}}
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 panel-footer">
                            <div class="heading">
                                <h3>Tiếp Theo</h3>
                            </div>
                            <ul class="nav navbar">
                                <div class="sub_total">
                                    <li>Tổng Số SP: <span> 1 </span></li>
                                </div>
                                <div class="sub_total">
                                    <li>Thuế: <span> 21,000.00 </span></li>
                                </div>
                                <div class="sub_total">
                                    <li>Tổng Giá: <span>121,000.00 VNĐ</span></li>
                                </div>
                            </ul>
                            <div class="chose_area">
                                <a href="#" class="btn btn-sm red">
                                    <span class="fa fa-quora fa-2x"></span>Get Quote
                                </a>
                                <a href="http://localhost:8000/checkout" class="btn btn-sm green">
                                    <span class="fa fa-arrow-circle-right fa-2x"></span>Đặt Hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>