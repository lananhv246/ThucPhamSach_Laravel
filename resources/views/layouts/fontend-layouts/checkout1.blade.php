
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12 clearfix">
                    <ul class="breadcrumb">
                        <li><a href="index-2.html">Trang chủ</a>
                        </li>
                        <li>Kiểm tra - địa chỉ</li>
                    </ul>

                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Kiểm tra - địa chỉ</h1>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9 clearfix" id="checkout">

                    <div class="box">
                        <form method="post" action="http://minimal.ondrejsvestka.cz/1-3-3/checkout2.html">

                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                                </li>
                                {{--  <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li> --}}
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Xem lại đơn hàng</a>
                                </li> 
                            </ul>

                            <div class="content">
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Họ tên</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="dienthoai">Số điện thoại</label>
                                        <input type="text" class="form-control" id="dienthoai" name="dienthoai">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="diachi">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" name="diachi">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu Trữ</button>

                                </div>

                            </div>
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở về giỏ hàng</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Thanh toán<i class="fa fa-chevron-right"></i>
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