<style>
    .KetQua{
        background-color: yellowgreen;
        padding: 0px 10px;
        border-radius: 7px;
    }
</style>
<div class="KetQua" id="ketqua"></div>
<a class="modal-toggle" data-toggle="modal" data-target="#myModal" data-id="Modal">
    <button class="btn-group" id="btnThemModal">Thêm</button></a>
<a class="modal-toggle" data-toggle="modal" data-id="Modal">
    <button class="btn-group" id="btnSuaModal">Sửa</button></a>
<button class="btn-group" id="btnXoa">Xóa</button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Thêm trung tâm bóng đá</h4>
        </div>
        <div class="modal-body" id="modal-body">
            <div class ="row">
                <div class="col-md-3" class="text-right">Tên sân</div>
                <div class="col-md-9">
                <input type="text" id="ten" />
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">Số người mỗi đội</div>
                <div class="col-md-9">
                <input type="text" id="so_nguoi" />
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">id Trung tâm</div>
                <div class="col-md-9">
                <!-- <input type="text" id="id_trung_tam" /> -->
                <select class="selec_trung_tam">
                    <option value="1"> t1 </option>
                    <option value="2"> t2 </option>
                </select>

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
    </div>
    </div>
        
<!--Modal sửa -->
    <div class="modal fade" id="modalSua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Sửa sân bóng</h4>
        </div>
        <div class="modal-body" id="modal-body">
            <div class ="row">
                <div class="col-md-3">Tên sân bóng</div>
                <div class="col-md-9">
                <input type="text" id="ten_sua" />
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">Số người mỗi đội</div>
                <div class="col-md-9">
                <input type="text" id="so_nguoi_sua" />
                </div>            
            </div>
            <div class ="row">
                <div class="col-md-3">id Trung tâm</div>
                <div class="col-md-9">
                <!-- <input type="text" id="id_trung_tam_sua" /> -->
                <select class="selec_trung_tam">
                    <option value="1"> t1 </option>
                    <option value="2"> t2 </option>
                </select>
                </div>
            </div>
            <div class ="row">
                <div class="col-md-3">Ghi chú</div>
                <div class="col-md-9">
                <input type="text" id="ghi_chu_sua" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  id="btnSua">Ghi nhận sửa</button>
        </div>
    </div>
    </div>
    </div>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
        if (settings.data.indexOf('csrf_bong_da') === -1) {
        settings.data += '&csrf_bong_da=' + encodeURIComponent(Cookies.get('csrf_cookie_bong_da'));
      }
    }
    });
    $('#btnThem').click(function(){
        var data={
            ten             :$('#ten').val(),
            so_luong        :$('#so_nguoi').val(),
            id_trung_tam    :$('#id_trung_tam').val(),
            ghi_chu         :$('#ghi_chu').val()
        };
        $.ajax({
            type: "POST",
            url:  "<?php echo site_url();?>san_bong/modal_them_san_bong/",
            dataType: "json",
            data: data,
            success: function(result)
            {   
                $('#ketqua').html('Đã thêm thành công');
                //location.reload();
            }
        });
        $('#myModal').modal('hide');
    });
    $('#btnXoa').click(function(){
        var id=[];
        $(':checkbox:checked').each(function(i){
            id[i]=$(this).val();
            $(this).prop('checked',false);//Xóa dòng đang chọn
        });
        if(id.length===0){
            alert('Vui lòng chọn ít nhất một dòng');
        } 
        else
        if(confirm("Xác nhận xóa !"))
        {
            $.ajax({
                type:"post",
                url:  "<?php echo site_url();?>san_bong/xoa_nhieu_dong/",
                data:{id:id},
                success: function(result)
                {
                    $('#ketqua').html('Đã xóa thành công !' + result);
    //xóa dòng xóa tương ứng bằng jquery
                    var lstr=$('tr');
                    for(var i=0; i<id.length;i++)
                    {
                        for(var chontr=0;chontr<lstr.length;chontr++)
                        {   
                            var ls_td=$(lstr[chontr]).find('td:first-child');
                            if($(ls_td[0]).text()===id[i])
                            {
                                $(lstr[chontr]).css('background-color','#ccc');
                                $(lstr[chontr]).fadeOut('slow');
                            }
                        }
                    }
    //Hết đoạn xóa dòng
                }
            });
            //console.log(settings.data);
        }
    });
    $('#btnSua').click(function(){
        var id=[];
        $(':checkbox:checked').each(function(i){
            id[i]=$(this).val();
        });
        if(id.length!=1){
            alert('Vui lòng chọn chỉ một dòng để sửa');
        }
            var mangsua={
            id              :id[0],
            ten             :$('#ten_sua').val(),
            so_nguoi_moi_doi :$('#so_nguoi_sua').val(),
            id_trung_tam     :$('#id_trung_tam_sua').val(),
            ghi_chu         :$('#ghi_chu_sua').val()
        };
        $.ajax({
            type: "POST",
            url:  "<?php echo site_url();?>san_bong/sua_san_bong/",
            data: {mangsua:mangsua},
            success: function(result)
            {   
                if(result)
                {
                    $('#ketqua').html('Đã sửa thành công');
    //sửa dòng xóa tương ứng bằng jquery
                    var lstr=$('tr');
                    for(var i=0; i<id.length;i++)
                    {
                        for(var chontr=0;chontr<lstr.length;chontr++)
                        {   
                            var ls_td=$(lstr[chontr]).find('td');
                            if(ls_td.length>0 && $(ls_td[0]).text()===mangsua['id'])
                            {
                                $(ls_td[1]).html(mangsua['ten']);
                                $(ls_td[2]).html(mangsua['so_nguoi_moi_doi']);
                                $(ls_td[3]).html(mangsua['id_trung_tam']);
                                $(ls_td[4]).html(mangsua['ghi_chu']);
                            }
                        }
                    }
    //Hết đoạn sửa dòng                    
                }
            }
        });
        $('#modalSua').modal('hide');
    });
    $('#btnSuaModal').click(function(){//Xử lý khi nhấn nút hiển thị modal thêm
        var id=[];
        $(':checkbox:checked').each(function(i){
            id[i]=$(this).val();
        });
        if(id.length!=1){
            alert('Vui lòng chọn chỉ một dòng để sửa');
            $('#modalSua').modal('hide');
        }
        else
        {
            $('#modalSua').modal('show');
        }
    });
    $('#btnThemModal').click(function(){
        $.ajax({
            type: "get",
            url: "<?php echo site_url();?>san_bong/list_san_bong_api"
            success: funtion(result)
            {
                
            }
        });
    });
});
</script>
