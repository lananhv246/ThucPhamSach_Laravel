@extends('admin.admin_home')
@section('admins')
    <div class="row">
    <ol class="breadcrumb">
        <li><a href="/">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Thống kê</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thống kê Tháng {{$carbon}}</h1>
    </div>
</div><!--/.row-->
    <div class="row">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Hàng Tồn</a></li>
    <li><a data-toggle="tab" href="#menu1">Hàng nhập</a></li>
    <li><a data-toggle="tab" href="#menu2">Hàng xuất</a></li>
    <li><a data-toggle="tab" href="#menu3">Kết quả kinh doanh</a></li>
    <li><a data-toggle="tab" href="#menu4">Doanh thu nhập</a></li>
    <li><a data-toggle="tab" href="#menu5">Doanh thu xuất</a></li>
    <li><a data-toggle="tab" href="#menu6">Khách hàng đăng ký</a></li>
    </ul>

    <div class="tab-content panel panel-container">
        <div id="home" class="tab-pane fade in active">
            <h3>Hàng Tồn</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Loại sản phẩm</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng Tồn</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Số lượng bán t {{$carbon}}</th>
                    <th>Số lượng nhập t {{$carbon}}</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $countnhap = 1;
                $count = 1;?>
                @foreach($date_tonkho as $ton)
                    @if(isset($ton->phieuxuatkhochitiet))
                    @foreach($ton->phieuxuatkhochitiet as $pxkct)
                        <?php $count += $pxkct->soluong; ?>
                    @endforeach
                    @else
                    @endif
                    @if(isset($ton->sanpham->phieunhapchitiet))
                    @foreach($ton->sanpham->phieunhapchitiet as $pnct)
                        <?php $countnhap += $pnct->soluong; ?>
                    @endforeach
                    @else
                    @endif
                    <tr>
                    <td>{{$ton->id}}</td>
                    <td>{{$ton->sanpham->loaisanpham->ten_loai}}</td>
                    <td>{{$ton->sanpham->ten_sanpham}}</td>
                    <td>{{$ton->soluong}}</td>
                    <td>{{$ton->sanpham->dongia}}</td>
                    <td>{{$ton->sanpham->donvitinh}}</td>
                    <td>{{$count}}</td>
                    <td>{{$countnhap}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Hàng nhập</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Hàng Xuất</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Kết quả kinh doanh</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Ngày lập</th>
                    <th>Giá Nhập</th>
                    <th>Giá Bán</th>
                </tr>
                </thead>
                <tbody>
                @foreach($date_sanpham as $sanpham)
                    @if(isset($sanpham->phieunhapchitiet))
                    @foreach($sanpham->phieunhapchitiet as $pnct)
                        
                    @endforeach
                    @else
                    @endif
                    <tr>
                    <td>{{$sanpham->id}}</td>
                    <td>{{$sanpham->ten_sanpham}}</td>
                    <td>{{$sanpham->loaisanpham->ten_loai}}</td>
                    <td>{{$sanpham->updated_at}}</td>
                    <td>{{$pnct->dongia}}</td>
                    <td>{{$sanpham->dongia}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="menu4" class="tab-pane fade">
            <h3>Doanh thu nhập</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="menu5" class="tab-pane fade">
            <h3>Doanh thu xuất</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="menu6" class="tab-pane fade">
            <h3>Khách hàng đăng ký</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phiếu Nhập</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Đơn Vị Tính</th>
                    <th>Tùy Chọn</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection