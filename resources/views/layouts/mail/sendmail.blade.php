<div>
    {{$data->ten_phieuxuatkho}}
    <br>
    Tổng giá: {{$data->tonggia}}
    <br>
    Tổng số SP {{$data->tongso_sanpham}}
    <br>
    @foreach($data->phieuxuatkhochitiet as $chitiet)
        @if(isset($chitiet->donhangno))
            Sản Phẩm {{$chitiet->tonkho->sanpham->ten_sanpham}} Sẻ giao giao 2 đợt, đợt  1 là {{$chitiet->soluong}}kg, đợt cuối là {{$chitiet->donhangno->soluong_no}}kg
        @else
        lần này là {{$chitiet->soluong}}kg
        @endif
    @endforeach
</div>