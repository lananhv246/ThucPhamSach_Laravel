@extends('admin.admin_home')
@section('admins')
    @include('flashmessage.flashmessage')
    <div class="col-sm-12">
        <div class="text-center panel-heading"><h3><dt>Image List</dt></h3></div>
            <table class="table table-responsive">
                <thead class="thead-inverse">
                <tr>
                    <th>Id Sản phẩm CT</th>
                    <th>Image List</th>
                    <th>Sản Phẩm</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $images)
                    <tr>
                        <td>{!! $images->id !!}</td>
                        <td>
                                @foreach($images->imagelist as $image)
                                    <div class="col-sm-2 col-md-2">
                                    <img class="img-responsive" src="/{!! $image->duongdan !!}" alt="responsive image"/>
                                    </div>
                                @endforeach
                        </td>
                        <td>{!! $images->sanpham->ten_sanpham !!}</td>
                        <td>
                            <a href="{{route('imagelist.show',[$images->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['url' => ['/admin/imagelist/delete', $images->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa List Image', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('imagelist.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>
        <!-- phan trang -->
        {!! $data->links() !!}
        </div>
@endsection