function redirect(path) {
    base_url = $("#base_url").html();

    window.location.href = base_url + path;
}

function showMessageOnDiv(message, divid) {
    var alertType = '';
    var alertClass = '';
    if (message.messageType == 'success')
    {
        alertType = "<i class='glyphicon glyphicon-ok'></i> Success";
        alertClass = "success";
    } else
    {
        alertType = "<i class='glyphicon glyphicon-alert'></i>  Error";
        alertClass = "danger";
    }
    var html = '<div style="text-align:center;" class="alert alert-' + alertClass + ' fade in alert-dismissable" style="margin-top:18px;">';
    html += '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">X</a>';
    html += '<strong >' + alertType + '!</strong> <font id="txt_msg">' + message.message + '</font></div>';

    //$(divid).html(html).fadeIn().delay(2000).fadeOut();
	$(divid).html(html);
}



