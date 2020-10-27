//Активизируем плагин стилизации форм
(function($) {
$(function() {

	$('input, select, checkbox, radio').styler();

});
})(jQuery);

//Модальное окно на главной странице
$(document).ready(function(){

    $('.modalLink').modal({
        trigger: '.modalLink',          // id or class of link or button to trigger modal
        olay:'div.overlay',             // id or class of overlay
        modals:'div.modal',             // id or class of modal
        animationEffect: 'slideDown',   // overlay effect | slideDown or fadeIn | default=fadeIn
        animationSpeed: 400,            // speed of overlay in milliseconds | default=400
        moveModalSpeed: 'slow',         // speed of modal movement when window is resized | slow or fast | default=false
        background: '000',           // hexidecimal color code - DONT USE #
        opacity: 0.7,                   // opacity of modal |  0 - 1 | default = 0.8
        openOnLoad: false,              // open modal on page load | true or false | default=false
        docClose: true,                 // click document to close | true or false | default=true    
        closeByEscape: true,            // close modal by escape key | true or false | default=true
        moveOnScroll: false,             // move modal when window is scrolled | true or false | default=false
        resizeWindow: true,             // move modal when window is resized | true or false | default=false
        //video: 'http://player.vimeo.com/video/2355334?color=eb5a3d',    // enter the url of the video
        //videoClass:'video',             // class of video element(s)
        close:'.closeBtn'               // id or class of close button
    });
});

//Всплывающее окно fancybox
$(document).ready(function() {
	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
});

//Вызываем функцию для подмены поля ввода на фицры
$(".phone_mask").mask("+7(999)999-99-99",{placeholder:" "});

//Вызываем функцию для подмены поля ввода на фицры - это применяем, где треб.ввести кошель
$(".koshelek-mask").mask("R 9999 9999 9999",{placeholder:" "});

//AJAX запросы
//функция проверки email'a на уникальность
function checkEmail_register(data)
{	//срабатывает, когда набираем email в поле ввода
	if (data.st_email == 0) {
		$("#register_email").css({'border': '1px solid red'});
		$("#register_mail_error").css({'color': 'red', 'text-align': 'center'});
		$('#register_mail_error').html(data.email);
		$('#register_submit').attr('disabled', 'disabled');
	}
	else if (data.st_email == 1) {
		$("#register_email").css({'border': '1px solid #39a5e2'});
		$('#register_mail_error').html('');
		$('#register_submit').removeAttr('disabled', 'disabled');
	}
}

//проверяем корректность длинны пароля
function checkPassword_register(data)
{	//срабатывает когда набираем пароль в поле ввода
	if (data.st_pswd == 0) {
		$("#register_password").css({'border': '1px solid red'});
		$("#password_error").css({'color': 'red', 'text-align': 'center'});
		$('#password_error').html(data.pswd);
		$('#register_submit').attr('disabled', 'disabled');
	}
	else if (data.st_pswd == 1) {
		$("#register_password").css({'border': '1px solid #39a5e2'});
		$('#password_error').html('');
		$('#register_submit').removeAttr('disabled', 'disabled');
	}
}

//проверяем уникальность сотового номера
function checkPhone_number(data)
{
	if (data.st_phone_number == 0) {
		$("#phone_number").css({'border': '1px solid red'});
		$("#phone_number_error").css({'color': 'red', 'text-align': 'center'});
		$('#phone_number_error').html(data.phone_number);
		$('#register_submit').attr('disabled', 'disabled');
	}
	else if (data.st_phone_number == 1) {
		$("#phone_number").css({'border': '1px solid #39a5e2'});
		$('#phone_number_error').html('');
		$('#register_submit').removeAttr('disabled', 'disabled');
	}
}

//проверяем уникальность кошелька
function checkAdvcash_register(data)
{
	if (data.st_advcash == 0) {
		$("#advcash").css({'border': '1px solid red'});
		$("#advcash_error").css({'color': 'red', 'text-align': 'center'});
		$('#advcash_error').html(data.advcash);
		$('#register_submit').attr('disabled', 'disabled');
	}
	else if (data.st_advcash == 1) {
		$("#advcash").css({'border': '1px solid #39a5e2'});
		$('#advcash_error').html('');
		$('#register_submit').removeAttr('disabled', 'disabled');
	}
}

//функция регистрации юзера - обрабатываем ошибки
var reg_block = "<input name=\"submit_login\" class=\"submit\" type=\"submit\" id=\"register_submit\" value=\"ЗАРЕГИСТРИРОВАТЬСЯ\"><div class=\"social-login cf\"><p style=\"margin-bottom: 0px; font-size: 9px; margin-top: 5px;\">Нажимая на кнопку \"Зарегистрироваться\", я подтверждаю, что ознакомился с пользовательским соглашением</p></div>";

function registerUser(data)
{
	
    if (data.st == 0)
    {
    	//запускаем цикл, перебирая сообщения ошибок
    	$.each(data.message, function(key, val)
    	{
    		if (val != "")
    		{	//если у нас есть сообщение об ошибке, то вставляем данные в страницу
    			$( "#" + key + "_error" ).html(val);
    		}
    		else
    		{	//иначе, если у нас нет сообщения с ошибкой, то просто засовываем пустоту в блок
    			$( "#" + key + "_error" ).html("");
    		}
    	});

    	$("#register_submit_block").html(reg_block);

    }//if (data.st == 0)
    else if (data.st == 1)
    {
    	$("#not_register_error").html(data.msg);
    }
    else if (data.st == 2)
    {
    	$("#register_user").hide("slow");
		$("#register_ok").css({'color': '#00b22d', 'text-align': 'center'});
		$('#register_ok').html(data.msg);
		window.setTimeout("window.location.assign('http://ks.my/cabinet')", 3000); //редирект после 3-х секунд
    }
}

function loginUser(data)
{	//срабатывает в форме авторизации в момент отправки
	if (data.st_error == 0 && data.email != '' && data.pswd != '') {
		$("#login_mail").css({'border': '1px solid red'});//обводим поле ввода красным цветом
		$("#user_password").css({'border': '1px solid red'});//обводим поле ввода красным цветом
		$("#error_login_email").css({'color': 'red', 'text-align': 'center'});//придаем ошибке красный цвет и ставим по центру
		$('#error_login_email').html(data.email);//выводим ошибку
		$('#error_password_email').css({'color': 'red', 'text-align': 'center'});
		$('#error_password_email').html(data.pswd);
	}
	else if (data.st_error == 0 && data.email != '' && data.pswd == '') {
		$("#login_mail").css({'border': '1px solid red'});//обводим поле ввода красным цветом
		$("#error_login_email").css({'color': 'red', 'text-align': 'center'});//придаем ошибке красный цвет и ставим по центру
		$('#error_login_email').html(data.email);//выводим ошибку

		$("#error_password_email").css({'border': '1px solid #39a5e2'});
		$('#error_password_email').html('');
	}
	else if (data.st_error == 0 && data.email == '' && data.pswd != '') {
		$("#user_password").css({'border': '1px solid red'});
		$('#error_password_email').css({'color': 'red', 'text-align': 'center'});
		$('#error_password_email').html(data.pswd);

		$("#login_mail").css({'border': '1px solid #39a5e2'});//обводим поле ввода красным цветом
		$('#error_login_email').html('');
	}

	else if (data.st == 1) {
		$("#loginIndex").hide("slow");
		$("#you_login_ok").css({'color': '#00b22d', 'text-align': 'center'});
		$('#you_login_ok').html(data.msg);
		window.setTimeout("window.location.assign('http://ks.my/cabinet')", 3000); //редирект после 3-х секунд
	}
	else if (data.st == 0) {
		$("#login_mail").css({'border': '1px solid red'});//обводим поле ввода красным цветом
		$("#user_password").css({'border': '1px solid red'});//обводим поле ввода красным цветом
		$("#you_login_ok").css({'color': 'red', 'text-align': 'center'});//придаем ошибке красный цвет и ставим по центру
		$('#you_login_ok').html(data.msg);//выводим сообщение
		$('#error_login_email').html('');
		$('#error_password_email').html('');
	}
	else if (data.st == 2) {
		$("#loginIndex").hide("slow");
		$("#you_login_ok").css({'color': 'red', 'text-align': 'center', 'margin-top' : '15px'});
		$('#you_login_ok').html(data.msg);
	}
}

var recover_block = "<input name=\"submit_recover\" class=\"submit\" type=\"submit\" id=\"submit_recover\" value=\"ВЫСЛАТЬ ИНСТРУКЦИЮ\">";

function recover_pass(data)
{
	if (data.st_email == 0 && data.email != '') {
		//если у нас есть уведомления от валидатора, то делаем это
		$('#recover_email').css({'border': '1px solid red'});
		$('#recover_msg').css({'color': 'red', 'text-align': 'center'});
		$('#recover_msg').html(data.email);

		$("#recoversubmit").html(recover_block);

	}
	else if (data.st_email == 0 && data.email == '') {
		$('#recover_email').css({'border': '1px solid red'});
		$('#recover_msg').css({'border': '1px solid #39a5e2'});
		$('#recover_msg').html('');
	}
	else if (data.st == 0) {
		$('#recover_email').css({'border': '1px solid red'});
		$('#recover_msg').css({'color': 'red', 'text-align': 'center'});
		$('#recover_msg').html(data.email);
		$("#recoversubmit").html(recover_block);
	}
	else if (data.st == 1) {
		//скрываем форму отправки и выдаем сообщение, что все заебца!
		$('#text_recover_pass').css({'display': 'none'});
		$('#recover_msg').css({'color': '#00b22d', 'text-align': 'center'});
		$('#recover_msg').html(data.msg);
		$("#recoverpassIndex").hide("slow");

	}
}

function update_new_pass(data)
{
	if (data.st == 0 && data.new_pswd != '') {
		$('#update_pass').css({'border': '1px solid red'});
		$('#update_error_msg').css({'color': 'red', 'text-align': 'center'});
		$('#update_error_msg').html(data.new_pswd);
	}
	else if(data.st == 0 && data.new_pswd == '') {
		$('#update_pass').css({'border': '1px solid red'});
		$('#update_error_msg').css({'border': '1px solid #39a5e2'});
		$('#update_error_msg').html('');
	}
	else if (data.st == 1 || data.st == 2) {//срабатывает, когда ссылка неверная или сдохшая
		$('#update_error_msg').html('');
		$('#update_msg').css({'color': 'red', 'text-align': 'center'});
		$('#update_msg').html(data.msg);
		$('#updatesubmit').html('');
	}
	else if (data.st == 3) {
		$('#update_error_msg').html('');
		$('#update_pass').css({'border': '1px solid #00b22d'});
		$('#update_msg').css({'color': '#00b22d', 'text-align': 'center', 'font-size': '18px'});
		$('#update_msg').html(data.msg);
		$('#updatesubmit').html('');
	}
	else if (data.st == 4) {
		$('#update_error_msg').html('');
		$('#update_pass').css({'border': '1px solid red'});
		$('#update_msg').css({'color': 'red', 'text-align': 'center'});
		$('#update_msg').html(data.msg);
	}
}

//Функция валидации email'а
$('#register_email').keyup(function(){
	var email = $('#register_email').serialize();
	//1.Указываем куда делаем запрос
	//2.Указываем какие данные надо передать, обязательно делаем сериализацию
	//3.Указываем какую функцию нужно дернуть в случае успешного запроса, чтобы обработать данные
	//4.Указываем в каком формате ожидаем ответ от сервера
	$.post("check_email",email, checkEmail_register, 'json');
});

//функция валидации пароля
$('#register_password').keyup(function(){
	var pswd = $('#register_password').serialize();
	$.post("check_pswd",pswd, checkPassword_register, 'json');
});

//функция валидации номера телефона
$('#phone_number').keyup(function(){
	var phone_number = $('#phone_number').serialize();
	$.post("check_phone_number",phone_number, checkPhone_number, 'json');
});

//функция валидации кошелька
$('#advcash').keyup(function(){
	var advcash = $('#advcash').serialize();
	$.post("check_adv_cash",advcash, checkAdvcash_register, 'json');
});

//функция регистрации
$('#register_user').submit(function(){

	$.ajax({
		/*beforeSend: function(){
       					$("#register_submit_block").html('<div style="text-align: center;"><img src="images/loading.gif"></div>'); 
      				},*/
      	type: "POST",
      	url: $('#register_user').attr('action'),
	    data: ($('#register_user').serialize()),
	    success: registerUser,
	    dataType: 'json'	    
	});

	return false;
});

//Функция авторизации
$('#loginIndex').submit(function(){
	$.post($('#loginIndex').attr('action'), $('#loginIndex').serialize(), loginUser, 'json');
	return false;
});

//функция запроса ссылки восстановления пароля
$('#recoverpassIndex').submit(function(){

	$.ajax({
		beforeSend: function(){
       					$("#recoversubmit").html('<div style="text-align: center;"><img src="../images/loading.gif"></div>'); 
      				},
      	type: "POST",
      	url: $('#recoverpassIndex').attr('action'),
	    data: ($('#recoverpassIndex').serialize()),
	    success: recover_pass,
	    dataType: 'json'	    
	});

	return false;
});

//функция записи нового пароля в БД
$('#update_new_pass').submit(function(){
	$.post($('#update_new_pass').attr('action'), $('#update_new_pass').serialize(), update_new_pass, 'json');
	return false;
});

//Выделяем активный пункт меню
jQuery(function () {                                      // Когда страница загрузится
    jQuery('.top_menu ul li a').each(function () {             // получаем все нужные нам ссылки
        var location = window.location.href; // получаем адрес страницы
        var link = this.href;                // получаем адрес ссылки
        if(location == link) {               // при совпадении адреса ссылки и адреса окна
            jQuery(this).addClass('active');  //добавляем класс
        }
    });
});