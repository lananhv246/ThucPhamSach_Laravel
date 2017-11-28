 <!-- *** FOOTER ***
_________________________________________________________ -->
<?php 
    $danhmuc = \App\DanhMucLoai::orderBy('id','DESC')->take(2)->get();
?>
        <div id="footer">
            <div class="container">
                <div class="col-md-3 col-sm-6">
                    <h4>Trang</h4>

                    <ul>
                        <li><a href="#">Thông tin cửa hàng</a>
                        </li>
                        <li><a href="#">Điều khoản, điều kiện.</a>
                        </li>
                        <li><a href="#">FAQ</a>
                        </li>
                        <li><a href="#">Liên hệ</a>
                        </li>
                    </ul>

                    <hr>

                    <h4>Tài khoản</h4>

                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                        </li>
                        <li><a href="/register">Đăng ký</a>
                        </li>
                    </ul>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Danh mục hàng đầu</h4>
                    @foreach($danhmuc as $danhmuctop)
                    <h5>{{$danhmuctop->ten_danhmuc}}</h5>

                    <ul>
                        @foreach($danhmuctop->loaisanpham as $loaitop)
                        <li><a href="{{route('loaisanpham',[$loaitop->id])}}">{{$loaitop->ten_loai}}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Địa chỉ cửa hàng</h4>

                    <ul>
                        <li> <a href="#"> * Thới Lai, Cần Thơ, Việt Nam </a> </li>
                        <li> <a href="#"> * Ba Tháng Hai, Xuân Khánh, Ninh Kiều, Cần Thơ, Vietnam </a> </li>
                    </ul>

                    <a href="/contact">Liên hệ</a>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->



                <div class="col-md-3 col-sm-6">

                    <h4>Nhận thông tin mới</h4>

                    <p class="text-muted">Vui lòng để lại địa chỉ email để nhận thông tin mới nhất từ cửa hàng.</p>

                    <form>
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <span class="input-group-btn">

			<button class="btn btn-default" type="button">Theo giỏi!</button>

		    </span>

                        </div>
                        <!-- /input-group -->
                    </form>

                    <hr>

                    <h4>Mạng xã hội</h4>

                    <p class="social">
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </p>


                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2014. Minimal is responsive template by <a href="http://www.ondrejsvestka.cz/" class="external">Ondrej Svestka</a>.</p>
                    <p class="pull-right">
                        <img src="/fontend-style/img/payment.png" alt="payments accepted">
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->