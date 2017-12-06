@extends('admin.admin_home')
@section('admins')
        <div class="col-md-offset-1 col-md-10">
            <h1>Thêm Mới</h1>
            @include('flashmessage.flashmessage')
            <div class="how-to-create restmenuwrap" >
                <h3>Hình Ảnh <span id="photoCounter"></span></h3>
                <br />
                <!--form upload-->
                {!! Form::open(['route' => 'imagelist.create','enctype'=>"multipart/form-data",'files' => true, 'class'=>'dropzone dz-clickable', 'id'=>'my-awesome-dropzone']) !!}
                <select name="id_sanphamchitiet" id="id_sanphamchitiet" class="form-control">
                    @foreach($spct as $ct)
                        <option value="{!! $ct->id !!}">{!! $ct->sanpham->ten_sanpham !!}</option>
                    @endforeach
                </select>
                    {{--{!! Form::select('id_sanphamchitiet',$spct, null,--}}
                {{--['id' => 'id_sanphamchitiet', 'class' => 'form-control', 'placeholder' => 'Chọn Chi Tiết Sản Phẩm']) !!}--}}
                    <div class="dz-message">
                        <h4>Drag Photos to Upload</h4>
                        <span>Or click to browse</span>
                    </div>
                    <input type="hidden" name="file" type="file" multiple  value="Upload Image">
                {!! Form::close() !!}
                <!--token-->
            </div>
            <a href="{{route('imagelist.index') }}" class="btn btn-default"><span class="fa fa-arrow-circle-left"></span>Trở Về</a>

        </div>
    </div>
@endsection