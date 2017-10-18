@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-md-12 table-responsive">
        <div class="text-center panel-heading"><h3><dt>Image List</dt></h3></div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id Sản Phẩm CT</th>
                        <th>Sản Phẩm</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->sanpham->ten_sanpham !!}</td>
                        <td>
                                @foreach($data->imagelist as $images)
                                    <img class="img-responsive" src="/{!! $images->duongdan !!}" alt="responsive image"/>
                                    {!! Form::open(['route'=>['imagelist.destroy', $images->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                                    {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! $data->created_at !!}</td>
                        </tr>
                        <tr>
                            <td>{!! $data->updated_at !!}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{route('imagelist.index') }}" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection