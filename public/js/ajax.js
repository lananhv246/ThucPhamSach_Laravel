$(document).ready(function(){
     for (i=1;i<1000;i++) {
    $('#CartUp'+i).on('change keyup',function () {
        var rowid = $('#rowId'+i).val();
        var proid = $('#proId'+i).val();
        var qty = $('#CartUp'+i).val();
        if(qty <=0){
            alert('vui lòng nhập đúng số lượng');
        }else{
            $.ajax({
                async: false,
                url: './cart/plus'.rowid,
                type: 'GET',
                dataType: 'html',
                data: "rowid="+rowid+"& proid="+proid+"& qty="+qty,
                success: function (data) {
                    $('#UpdateCart').html(data);
                }
            });
        }
    });
    }
});