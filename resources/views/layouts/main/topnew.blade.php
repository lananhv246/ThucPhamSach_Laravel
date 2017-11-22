@if(isset($topnew))
<link href="{{ asset('/css/topcollect.css') }}" rel="stylesheet">
<script src="{{ asset('/js/carousel-multi.js') }}"></script>
<div class="container">
        <h3>SẢN PHẨM MỚI</h3>
		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
            @foreach($topnew as $data)
            @if($data->tonkho["soluong"] == 0)
            {{--  <h4 style="text-align:center;">Hết Hàng</h4>  --}}
            @else
                <div class="item">
                    <div class="pad15">
                    <a href="{!! route('product_detail',[$data->id]) !!}">
                    <img src="/images/upload/{!! $data->image !!}" class="img-responsive">
                    </a>
                        <h4><a href="{{route('product_detail',[$data->id])}}">{!! $data->ten_sanpham !!}</a></h4>
                            {!! number_format($data->dongia,0,",","." ) !!}
                            ₫/{!! $data->donvitinh !!}
                        <h5><a href="{{route('locloaisp',[$data->id])}}">{!! $data->loaisanpham->ten_loai !!}</a></h5>
                        {{--  <p>Sale: <strong>{!!$data->giamgia!!} {!! $data->donvitien !!}/{!! $data->donvitinh !!}</strong></p>  --}}
                    </div>
                </div>
                @endif
            @endforeach
            </div>
            
                <a class="leftLst" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="rightLst" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            {{--  <button class=" leftLst"><</button>
            <button class="rightLst">></button>  --}}
        </div>
</div>
@else
@endif
