function processCheckAll(name) {
    var chk = document.getElementsByName('chk_' + name + '_all[]');
    var b = document.getElementById('chk_' + name + '_check_all').checked;
    for (var i = 0; i < chk.length; i++) {
        chk[i].checked = b;
        if($(chk[i]).is(":checked")) {
            $(chk[i]).parent().addClass("selected");
        } else {
            $(chk[i]).parent().removeClass("selected");
        }
    }
}