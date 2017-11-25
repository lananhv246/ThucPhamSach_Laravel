
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản trị Admin</title>
	<link href="/admin-style/css/bootstrap.min.css" rel="stylesheet">
	<link href="/admin-style/css/font-awesome.min.css" rel="stylesheet">
	<link href="/admin-style/css/datepicker3.css" rel="stylesheet">
	<link href="/admin-style/css/styles.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    <link href='//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    {{--  <script src="{{ asset('js/js.js') }}"></script>  --}}
    <!-- Favicon -->
    <link rel="shortcut icon" href="/fontend-style/img/favicon.png">
</head>
<body>
    @if(Auth::guard('admin')->check())
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="/admin"><span>Mario </span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-4 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><a href="{{ route('admins.show',Auth::guard('admin')->user()->id)}}"><span class="fa fa-user-circle-o"></span>{!! Auth::guard('admin')->user()->name !!}</a></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="/admin"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{route('admins.index') }}"><em class="fa fa-user">&nbsp;</em> Admin</a></li>
			<li><a href="{{route('phieunhap.index') }}"><em class="fa fa-truck">&nbsp;</em> Phiếu Nhập</a></li>
			{{--  <li><a href="{{route('phieunhapchitiet.index') }}"><em class="fa fa-toggle-off">&nbsp;</em> Phiếu Nhập Chi Tiết</a></li>  --}}
			{{--  <li><a href="{{route('danhmucloai.index') }}"><em class="fa fa-clone">&nbsp;</em> Danh Mục Loại</a></li>
			<li><a href="{{route('loaisanpham.index') }}"><em class="fa fa-calendar">&nbsp;</em> Loại Sản Phẩm</a></li>  --}}
			<li><a href="{{route('sanpham.index') }}"><em class="fa fa-product-hunt">&nbsp;</em> Sản Phẩm</a></li>
			<li><a href="{{route('sanphamchitiet.index') }}"><em class="fa fa-info">&nbsp;</em> Sản Phẩm Chi Tiết</a></li>
			<li><a href="{{route('imagelist.index') }}"><em class="fa fa-file-image-o">&nbsp;</em> Image Lists</a></li>
			<li><a href="{{route('hoadon.index') }}"><em class="fa fa-first-order">&nbsp;</em> Hóa Đơn</a></li>
			{{--  <li><a href="{{route('hoadonchitiet.index') }}"><em class="fa fa-bar-chart">&nbsp;</em> Hóa Đơn Chi Tiết</a></li>  --}}
			<li><a href="{{route('phieuxuatkho.index') }}"><em class="fa fa-truck">&nbsp;</em> Phiếu Xuất Kho</a></li>
			{{--  <li><a href="{{route('phieuxuatkhochitiet.index') }}"><em class="fa fa-clone">&nbsp;</em>Xuất Kho Chi TIết</a></li>  --}}
			{{--  <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>  --}}
			<li>
            <a href="{{ route('logout') }}" style="color:#000"
                                        onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-8 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	@yield('admins')
	</div>	<!--/.main-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" type="text/javascript"></script>
	
	<script src="/admin-style/js/jquery-1.11.1.min.js"></script>
	<script src="/admin-style/js/bootstrap.min.js"></script>
	<script src="/admin-style/js/chart.min.js"></script>
	<script src="/admin-style/js/chart-data.js"></script>
	<script src="/admin-style/js/easypiechart.js"></script>
	<script src="/admin-style/js/easypiechart-data.js"></script>
	<script src="/admin-style/js/bootstrap-datepicker.js"></script>
	<script src="/admin-style/js/custom.js"></script>
	{{--  <script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>  --}}
    @else
        @include('errors.503')
    @endif
</body>
</html>