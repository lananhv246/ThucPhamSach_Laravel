
        <link href="{{ asset('/css/topcollect.css') }}" rel="stylesheet">
<script src="{{ asset('/js/carousel-multi.js') }}"></script>
<div class="container">
        <h3>TOP SALE</h3>
		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
            @foreach($topsave as $data)
                <div class="item">
                    <div class="pad15">
                    <a href="{!! route('product_detail',[$data->id]) !!}">
                    <img src="/images/upload/{!! $data->image !!}" class="img-responsive">
                    </a>
                        <h4><a href="{{route('product_detail',[$data->id])}}">{!! $data->ten_sanpham !!}</a></h4>
                        <span style="text-decoration:line-through">
                            {!! number_format($data->giacu,0,",","." ) !!} 
                            {!! $data->donvitien !!}/{!! $data->donvitinh !!}
                            </span>
                            {!! number_format($data->dongia,0,",","." ) !!}
                            {!! $data->donvitien !!}/{!! $data->donvitinh !!}
                        <h5><a href="{{route('locloaisp',[$data->id])}}">{!! $data->loaisanpham->ten_loai !!}</a></h5>
                        <p>Sale: <strong>{!! number_format($data->giamgia,0,",","." ) !!} {!! $data->donvitien !!}/{!! $data->donvitinh !!}</strong></p>
                    </div>
                </div>
            @endforeach
            </div>
            
                <a class="leftLst" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="rightLst" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            {{--  <button class=" leftLst"><</button>
            <button class="rightLst">></button>  --}}
        </div>
</div>
