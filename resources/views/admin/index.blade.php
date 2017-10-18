@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Danh Mục Loại</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $data)
                    <tr>
                        <td>{!! $data->id !!}</td>
                        <td>{!! $data->name !!}</td>
                        <td>{!! $data->email !!}</td>
                        <td>
                            <a href="{{route('admins.show',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['admins.destroy', $data->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('admins.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>
        </div>
@endsection