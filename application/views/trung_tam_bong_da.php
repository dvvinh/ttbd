/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<!DOCTYPE html>
<html lang ="">
<head>
    <title>DANH SÁCH TRUNG TÂM BÓNG ĐÁ</title>
    <meta charset = "UTF-8">
    <!-- Bootstrap CSS -->
    <link href="http://localhost/ttbd/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" language="javascript" src="http://localhost/ttbd/javascripts/global.js"></script>
        <script src="http://localhost/ttbd/jquery/jquery-3.1.0.js"></script>
    <style>
        .row{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container" align="center">
        <div class="h1" align="center">
            DANH SÁCH TRUNG TÂM BÓNG ĐÁ
        </div>
    </div>
        
    <div class ="fade" id="ketqua"> </div>
    <a class="modal-toggle" data-toggle="modal" data-target="#myModal">
        <h5><button class="btn-group">Thêm trung tâm</button></h5></a>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">New message</h4>
        </div>
        <div class="modal-body" id="modal-body">
            <div class ="row">
                <div class="col-md-3" class="text-right">Tên</div>
                <div class="col-md-9">
                <input type="text" id="ten" />
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">Địa chỉ</div>
                <div class="col-md-9">
                <input type="text" id="dia_chi" />
                </div>            
            </div>
            <div class ="row">
                <div class="col-md-3">SĐT</div>
                <div class="col-md-9">
                <input type="text" id="sdt" />
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">Ghi chú</div>
                <div class="col-md-9">
                <input type="text" id="ghi_chu" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  id="btnThem">Thêm</button>
        </div>
    </div>
<script type="text/javascript" language="javascript"> 
$(document).ready(function(){
    $('#btnThem').click(function(){

        var data={
            ten     :$('#ten').val(),
            dia_chi :$('#dia_chi').val(),
            sdt     :$('#sdt').val(),
            ghi_chu :$('#ghi_chu').val()
        };
        $.ajax({
            type: "POST",
            url: "http://localhost/ttbd/index.php/trung_tam_bong_da/modal_them_ttbd/",
            dataType: "json",
            data: data,
            success: function(result)
            {
                $.each(result, function(key,item)
                {
                    if(key=='vinh')
                        $('#vinh').html(item);
                    if(key=='kq')
                        $('#result').html(item);
                })
            }
        });
    });
});
</script>
    <script src="http://localhost/ttbd/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
