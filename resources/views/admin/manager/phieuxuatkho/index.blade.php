@extends('admin.admin_home')
@section('admins')
        @include('flashmessage.flashmessage')
        <div class="col-md-12 table-responsive">
            <div class="text-center panel-heading"><h3><dt>Phiếu Xuất Kho</dt></h3></div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Phiếu Xuất Kho</th>
                    <th>Admin</th>
                    <th>Khách Hàng</th>
                    <th>Tổng số lượng</th>
                    <th>Tổng Giá</th>
                    <th>Đơn vị tiền</th>
                    <th>Option</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $phieuxuatkho)
                    <tr>
                    {{--  Is your query returning array or object? If you dump it out,
                     you might find that it's an array and all you need is an array access ([]) instead of an object access (->).  --}}
                     {{--  object  --}}
                        {{--  <td>{!! $phieuxuatkho->id !!}</td>
                        <td>{!! $phieuxuatkho->ten_phieuxuatkho !!}</td>
                        <td>{!! $phieuxuatkho->admin->email !!}</td>
                        <td>{!! $phieuxuatkho->khachhang->email !!}</td>
                        <td>{!! $phieuxuatkho->tongsoluong !!}</td>
                        <td>{!! $phieuxuatkho->tonggia !!}</td>
                        <td>{!! $phieuxuatkho->donvitien !!}</td>  --}}
                        {{--  array  --}}
                        <td>{!! $phieuxuatkho["id"] !!}</td>
                        <td>{!! $phieuxuatkho["ten_phieuxuatkho"] !!}</td>
                        <td>{!! $phieuxuatkho->admin["email"] !!}</td>
                        <td>{!! $phieuxuatkho->khachhang["email"] !!}</td>
                        <td>{!! $phieuxuatkho["tongsoluong"] !!}</td>
                        <td>{!! $phieuxuatkho["tonggia"] !!}</td>
                        <td>{!! $phieuxuatkho["donvitien"] !!}</td>
                        <td>
                            <a href="{{route('phieuxuatkho.show',[$phieuxuatkho->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Show</a>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['phieuxuatkho.destroy', $phieuxuatkho->id], 'method'=>'DELETE', 'files' => true, 'enctype'=>'multipart/form-data' ]) !!}
                            {!! Form::submit('Xoa', ['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <a href="{{url('/admin') }}" class="btn red btn-sm btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                    <a href="{{route('phieuxuatkho.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Create</a>
                </tr>
                </tbody>
            </table>



        </div>

    </div>
@endsection