
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">

                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li>Kiểm tra - Xem lại đơn hàng</li>
                    </ul>


                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Kiểm tra - Xem lại đơn hàng</h1>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 clearfix" id="checkout">

                    <div class="box">
                        <form method="post" action="http://minimal.ondrejsvestka.cz/1-3-3/checkout4.html">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.html"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                </li>
                                {{--  <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.html"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>  --}}
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Xem lại đơn hàng</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thuế</th>
                                                <th>Tổng giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                                    </a>
                                                </td>
                                                <td><a href="#">White Blouse Armani</a>
                                                </td>
                                                <td>2</td>
                                                <td>$123.00</td>
                                                <td>$0.00</td>
                                                <td>$246.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="img/basketsquare.jpg" alt="Black Blouse Armani">
                                                    </a>
                                                </td>
                                                <td><a href="#">Black Blouse Armani</a>
                                                </td>
                                                <td>1</td>
                                                <td>$200.00</td>
                                                <td>$0.00</td>
                                                <td>$200.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th>$446.00</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở lại Kiểm tra - địa chỉ</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Đặt hàng<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


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
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Thuế</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Tổng tiền</td>
                                        <th>$456.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->
