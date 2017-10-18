@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Hóa Đơn</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Hóa Đơn</th>
                    <th>Khách Hàng</th>
                    <th>Tổng Giá</th>
                    <th>Tổng Số Lượng</th>
                    <th>Đơn vị tiền</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $hoadon)
                    <tr>
                    {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        <td>{!! $hoadon->id !!}</td>
                        <td>{!! $hoadon->ten_hoadon !!}</td>
                        <td>{!! $hoadon->user->email !!}</td>
                        <td>{!! $hoadon->tonggia !!}</td>
                        <td>{!! $hoadon->tongsoluong !!}</td>
                        <td>{!! $hoadon->donvitien !!}</td>
                        {{--  array  --}}
                        {{--<td>{!! $data['id'] !!}</td>--}}
                        {{--<td>{!! $data['ten_hoadon'] !!}</td>--}}
                        {{--<td>{!! $data->user['email'] !!}</td>--}}
                        {{--<td>{!! $data['tonggia'] !!}</td>--}}
                        {{--<td>{!! $data['tongsoluong'] !!}</td>--}}
                        {{--<td>{!! $data['donvitien'] !!}</td>--}}
                        <td>
                            <a href="{{route('hoadon.show',[$hoadon->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['hoadon.destroy', $hoadon->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('hoadon.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>



        </div>

    </div>
@endsection