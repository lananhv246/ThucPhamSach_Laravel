@extends('layouts.master')
@section('content')
        @include('flashmessage.flashmessage')
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="text-center panel-heading"><h3><dt>{!! $data->name !!}</dt></h3></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Thông Tin Khách Hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ID:</td><td> {!! $data->id !!}</td>

                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td>{!! $data->name !!}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td> {!! $data->email !!}</td>
                        </tr>
                        <tr>
                            <td>Điện Thoại: </td>
                            @if(isset($data->diachikh))
                            <td>{!! $data->diachikh->dienthoai !!}</td>
                            @else
                                <td>Chua có thong tin chi tiết</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Ngày Tạo TK:</td>
                            <td>{!! $data->created_at !!}</td>
                        </tr>
                        <tr>
                            <td>Ngày Cập Nhật TK:</td>
                            <td>{!! $data->updated_at !!}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/" class="btn btn-sm red btn-danger"><span class="fa fa-arrow-circle-left fa-2x"></span>Back</a>
                            </td>
                            <td>
                                <a href="{{route('users.edit',[$data->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="text-center panel-heading"><h3><dt>Thông tin chi tiết</dt></h3></div>
                        @if(isset($data->diachikh))
                    {!! Form::model($data->diachikh, ['route' => ['diachikh.update', $data->diachikh->id], 'method' => "PUT", 'files' => true, 'enctype'=>'multipart/form-data'  ]) !!}

                    {!! Form::label('diachi', 'Địa Chỉ:') !!}
                    {!! Form::text('diachi', null, array('disabled'=>'disabled','class'=>'form-control', 'id'=>'searchmap')) !!}

                    <div id="map-canvas"></div>

                    {!! Form::hidden('lat', null, array('class'=>'form-control', 'id'=>'lat')) !!}

                    {!! Form::hidden('lng', null, array('class'=>'form-control', 'id'=>'lng')) !!}
                            <a href="{{route('diachikh.edit',[$data->diachikh->id]) }}" class="btn btn-sm green btn-danger"><span class="fa fa-pencil fa-2x"></span>Sửa Thông Tin</a>
                            <tr>Ngày lập thông tin: {!! $data->diachikh->created_at !!}| Ngày Cập nhật thông tin: {!! $data->diachikh->updated_at !!}</tr>
                    {!! Form::close() !!}
                        @else
                    <div>Chua có thong tin chi tiết</div>
                        <a href="{{route('diachikh.create') }}" class="btn btn-sm green btn-danger"><span class="fa fa-plus-circle fa-2x"></span>Thêm Mới</a>
                        @endif
                </div>
                <script type="text/javascript" src="{{ asset('js/fixed-position.js')}}"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVbYto_FC8eWCpG5IR5Mcu2pN71UEV5jA&libraries=places"
                        type="text/javascript"></script>
            </div>
        </div>
@endsection
