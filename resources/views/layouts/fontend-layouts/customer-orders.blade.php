 @extends('layouts.fontend-layouts.master')
@section('content')
 <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">

                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li>Đơn hàng</li>
                    </ul>


                    <div class="box text-center">

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <h1>Đơn hàng</h1>

                                <p class="lead">Đây là đơn hàng giao thực tế.</p>
                                <p class="text-muted">Nếu bạn có bất kỳ câu hỏi nào, vui lòng <a href="contact.html">liên hệ</a> với chúng tôi, trung tâm dịch vụ khách hàng của chúng tôi đang làm việc cho bạn 24/7.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-md-9" id="customer-orders">

                    <div class="box">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Đơn đặt hàng</th>
                                        <th>Ngày</th>
                                        <th>Đơn hàng nợ</th>
                                        <th>Thông tin </th>
                                        <th>Hủy đơn hàng</th>
                                        <th>Hơn nữa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($user->phieuxuatkho)!= 0)
                                    @foreach($user->phieuxuatkho as $data)
                                    <tr>
                                        <th>#{{$data->id}}</th>
                                        <td>{{$data->created_at}}</td>
                                        @if(isset($data->phieuxuatkhochitiet->donhangno))
                                        <td>Còn nợ</td>
                                        @else
                                        <td>0</td>
                                        @endif
                                        @if($data->id_admin != null)
                                        <td><span class="label label-success">Đả nhận</span></td>
                                         <td>Đơn hàng đả xử lý</td>
                                        @else
                                        <td><span class="label label-info">Chờ</span></td>
                                        <td>
                                        {!! Form::open(['route'=>['users.destroy_orderhistory',$data->khachhang->id, $data->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                                        {!! Form::submit('Xóa', ['class'=>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                        </td>
                                        @endif
                                        <td><a href="{{route('users.orderhistory_detail', [$user->id, $data->id])}}" class="btn btn-primary btn-sm">Chi tiết</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr><td><div>Bạn chưa mua sản phẩm nào</div></td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Phần khác</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="#"><i class="fa fa-list"></i>Tất cả đơn hàng</a>
                                </li>
                                <li>
                                    <a href="{{route('users.show',[$user->id])}}"><i class="fa fa-user"></i>Tài khoản cá nhân</a>
                                </li>
                                <li>
                                   <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <!-- *** RIGHT COLUMN END *** -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>
    <!-- /#all -->
@endsection