
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>In</title>
    <link href="/fontend-style/css/font-awesome.css" rel="stylesheet">
    <link href="/fontend-style/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Html-Print-Preview-printPreview/js/printPreview.js"></script>
<script type="text/javascript">
        $(function(){
            $("#btnPrint").printPreview({
                obj2print:'#masterContent',
                width:'810'
            });
        });
    </script>
<style>
    *{
        margin:0px;
        padding:0px;
        font-family: arial;
    }
    body{
        background: #EEE;
    }
    .col-md-6 {
        width: 50%;
        float: left;
    }
    
    .col-md-7 {
        width: 58.33333333%;
        float: left;
    }
    .col-md-5 {
        width: 41.66666667%;
        float: left;
    }
    .col-md-12 {
        width: 100%;
        float: left;
    }
    .col-md-4 {
        width: 33.33333333%;
        float: left;
    }
    .col-md-offset-3 {
        margin-left: 25%;
        float: left;
    }
    #masterContent{
        background: #FFF;
        float: left;
        width: 760px;
        padding: 10px;
        margin: 10px;
    }
    .border{
        border-color: #000;
        border: 1.5px solid #000;
        padding: 2px;
        float: left;
        width: 740px;
    }
</style>
</head>
<body>
    <div id="content" class="col-md-6 col-md-offset-3">
        <div><button id="btnPrint">In Phiếu</button></div>
        <div id="masterContent" >
            <div class="border">
                <div>          
                    <h2>Cửa hàng thực phẩm sạch <strong>MARIO</strong></h2>
                </div>
                <div class="center" style="text-align: center ">
                    <h2>Hóa đơn</h2>
                </div>
                <div class="col-md-7">
                <p>Họ & Tên: <strong>{{$data->khachhang->name}}</strong></p>
                <p>Số ĐT: <strong>{{$data->khachhang->diachikh->dienthoai}}</strong></p>
                <p>Đ/c nhận: <strong>{{$data->khachhang->diachikh->diachi}}</strong></p>
                <p>Ngày đặt: <strong>{{$data->created_at}}</strong></p>
                </div>
                <div class="col-md-5">
                <p>Nhân viên: <strong>{{$data->admin->name}}</strong></p>
                <p>Phiếu xuất hàng số: <strong>{{$data->id}}</strong></p>
                <p>Tổng SP: <strong>{{$data->tongso_sanpham}}</strong></p>
                <p>Ngày giao: <strong>{{$data->updated_at}}</strong></p>
                </div>
                <div class="col-md-12"  style="text-align: center ">
                    <p><strong>{{$data->ten_phieuxuatkho}}</strong></p>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr class="info"><th colspan="4">Chi tiết phiếu xuất</th></tr>
                        <tr>
                            <td>STT</td>
                            <td>Tên SP</td>
                            <td>Số lượng</td>
                            <td class="text-right">Tổng tiền</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1 ?>
                        @foreach($data->phieuxuatkhochitiet as $chitiet)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$chitiet->tonkho->sanpham->ten_sanpham}}</td>
                            <td>{{$chitiet->soluong}}</td>
                            <td class="text-right">{{number_format(($chitiet->soluong * $chitiet->dongia)+$chitiet->thue,0,",","." )}}VNĐ</td>
                        </tr>
                        <?php $count++ ?>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <p>Thành tiền</p>
                            </td>
                            <td class="text-right">
                                <p><strong>{{number_format($data->tonggia,0,",","." )}} VNĐ</strong></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12"  style="text-align: center "> 
                    <div class="col-md-4">
                        <p>Người nhận</p>
                        <br>
                        <br>
                        <p>...................................</p>
                    </div>
                    <div class="col-md-4">
                        <p>Người giao</p>
                        <br>
                        <br>
                        <p>...................................</p>
                    </div>
                    <div class="col-md-4">
                        <p>Người lập phiếu</p>
                        <br>
                        <br>
                        <p>...................................</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <p><strong>Ghi chú:</strong>..................................................................................</p>
                </div>
            </div>
        </div>
        <!--end master -->
    </div>
    <script src="https://www.jqueryscript.net/cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
