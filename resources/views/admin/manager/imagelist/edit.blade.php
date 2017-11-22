@extends('admin.admin_home')
@section('admins')
        <div class="col-md-offset-1 col-md-10">
            <h1>Chỉnh Sửa</h1>
            @include('flashmessage.flashmessage')
            <div class="how-to-create restmenuwrap" >
                <h3>Hình Ảnh <span id="photoCounter"></span></h3>
                <br />
                <!--form upload-->
                {!! Form::open(['route' => ['imagelist.update', $data->id],'enctype'=>"multipart/form-data",'files' => true, 'class'=>'dropzone dz-clickable', 'id'=>'my-awesome-dropzone']) !!}

                <div class="dz-message">
                    <h4>Kéo hình để tải lên</h4>
                    <span>Hoặc Lick Để Chọn</span>
                </div>
                <input type="hidden" name="file" type="file" multiple  value="Upload Image">
            {!! Form::close() !!}
            <!--token-->
            </div>
        </div>
@endsection