@extends('admin.admin_home')
@section('admins')
        <div class="col-md-offset-1 col-md-10">
            <h1>Update New</h1>
            @include('flashmessage.flashmessage')
            <div class="how-to-create restmenuwrap" >
                <h3>Images <span id="photoCounter"></span></h3>
                <br />
                <!--form upload-->
                {!! Form::open(['route' => ['imagelist.update', $data->id],'enctype'=>"multipart/form-data",'files' => true, 'class'=>'dropzone dz-clickable', 'id'=>'my-awesome-dropzone']) !!}

                <div class="dz-message">
                    <h4>Drag Photos to Upload</h4>
                    <span>Or click to browse</span>
                </div>
                <input type="hidden" name="file" type="file" multiple  value="Upload Image">
            {!! Form::close() !!}
            <!--token-->
            </div>
        </div>
@endsection