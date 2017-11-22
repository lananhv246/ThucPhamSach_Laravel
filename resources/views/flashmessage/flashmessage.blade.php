@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
       <strong>Thông Báo:</strong>{!! Session::get('success') !!}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Lổi:</strong>{!! Session::get('error') !!}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Lổi:</strong> Có vấn đề khi nhập dữ liệu<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif