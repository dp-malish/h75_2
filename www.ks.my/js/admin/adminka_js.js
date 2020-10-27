//Активизируем визуальный редактор
$(document).ready(function() {
var wbbOpt = {
buttons: "bold,|,italic,|,underline,|,link,|,"
}
$("#editor").wysibb(wbbOpt);
});

//Активизируем визуальный редактор комментариев модератора
$(document).ready(function() {
var wbbOpt = {
buttons: "bold,|,italic,|,underline,|,"
}
$(".editor_comment_modera").wysibb(wbbOpt);
});

//функция авторизации
$('#loginAdmin').submit(function(){
    $.post($('#loginAdmin').attr('action'), $('#loginAdmin').serialize(), loginUser, 'json');
    return false;
});

function loginUser(data)
{
    if (data.st == 0)
    {
        //запускаем цикл, перебирая сообщения ошибок
        $.each(data.message, function(key, val)
        {
            if (val != "")
            {   //если у нас есть сообщение об ошибке, то вставляем данные в страницу
                $("#you_login_ok").html("");//удаляем сверху оповещение над формой
                $("#" + key ).css({'border':'1px solid red'});
                $( "#" + key + "_error" ).html(val);
                $( "#" + key + "_error" ).css({'color':'red', 'text-align':'center'});
            }
            else
            {   //иначе, если у нас нет сообщения с ошибкой, то просто засовываем пустоту в блок
                $("#" + key ).css({'border:':'1px solid #39a5e2'});
                $( "#" + key + "_error" ).html("");
            }
        });

    }//if (data.st == 0)
    else if (data.st == 1)
    {   
        $( "#admin_login_mail_error p" ).remove();
        $( "#admin_password_error p" ).remove();
        $( "#you_login_ok" ).css({'color':'red', 'text-align':'center'});
        $("#you_login_ok").html(data.msg);
    }
    else if (data.st == 2)
    {
        $("#loginAdmin").hide("slow");
        $("#you_login_ok").css({'color': '#fff', 'text-align': 'center'});
        $('#you_login_ok').html(data.msg);
        window.setTimeout("window.location.assign('http://ks.my/fuck_off_ad/start')", 3000); //редирект после 3-х секунд
    }
}

//функция сохранения нового системного уведомления
$('#new_notification').submit(function(){
	$.post($('#new_notification').attr('action'), $('#new_notification').serialize(), new_notification, 'json');
	return false;
});

function new_notification(data)
{
	if (data.st == 0)
	{
		$.each(data.msg, function(key, val)
    	{
    		//если у нас есть сообщение об ошибке, то вставляем данные в страницу
    		$("#" + key).css({'border': '1px solid red'});
    		$("#" + key + "_error").css({'color': 'red', 'text-align': 'center', 'font-size' : '14px'});
    		
    		$( "#" + key + "_error" ).html(val);
    		//Плавно скрываем элемент - точнее сообщени
			$( "#" + key + "_error" ).fadeIn(500).delay(3000).fadeOut(500);
    	});
	}
	else if (data.st == 1)
	{
		$.each(data.msg, function(key, val)
    	{	
    		$("#new_notification").hide("slow");
    		$("#" + key + "_otpravlen").css({'color': '#00b22d', 'text-align': 'center', 'font-size' : '14px'});
    		$( "#" + key + "_otpravlen" ).html(val);
    		$( "#" + key + "_otpravlen" ).fadeIn(500).delay(6000).fadeOut(500);
    		window.setTimeout("window.location.reload(true)", 6000); //обновляем страницу через 6 сек.
    	});
	}
}
