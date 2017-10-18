
    $(document).ready(function(){
        function addrow() {
            var $n = $('#addrow').children().length + 1;
            $("#addrow").append(
                '<tr class="row' + $n + '">' +
                '<td>{!! Form::select("id_sanpham[]",$sanpham, null,["id" => "id_sanpham", "class" => "form-control", "placeholder" => "Chọn Sản Phẩm"]) !!}</td>' +
                '<td>{!! Form::text("soluong[]", null, array("class"=>"form-control")) !!}</td>' +
                '<td>{!! Form::text("dongia[]", null, array("class"=>"form-control")) !!}</td>' +
                '<td>{!! Form::text("donvitien[]", null, array("class"=>"form-control")) !!}</td>' +
                '<td>{!! Form::text("donvitinh[]", null, array("class"=>"form-control")) !!}</td>' +
                '<td><div class="delete_order_pro' + $n + '"><span class="fa fa-minus btn btn-danger" aria-hidden="true"></span></div></td>' +
                '</tr>'
                );
            $('.delete_order_pro' + $n).on('click', function (e) {
//                        alert($n);
                e.preventDefault();
                $('.row' + $n).remove();
            });    
        }

        $('#add_order_pro').click(function () {
            addrow();
        });
    });