//Выделяем активный пункт меню
jQuery(function () {                                      // Когда страница загрузится
    jQuery('.left-sidebar ul li a').each(function () {             // получаем все нужные нам ссылки
        var location = window.location.href; // получаем адрес страницы
        var link = this.href;                // получаем адрес ссылки
        if(location == link) {               // при совпадении адреса ссылки и адреса окна
            jQuery(this).addClass('active');  //добавляем класс
        }
    });
});

//Активизируем плагин стилизации форм
(function($) {
$(function() {

	$('input, select').styler();

});
})(jQuery);

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

//Активизируем визуальный редактор
$(document).ready(function() {
var wbbOpt = {
buttons: "bold,|,italic,|,underline,|,"
}
$("#editor").wysibb(wbbOpt);
});


//Плавно скрываем элемент - точнее сообщения находящиеся в сессии
$('.message_session').fadeIn(500).delay(3000).fadeOut(500);

//Вызываем функцию для подмены поля ввода на фицры
$(".phone_mask").mask("+7(999)999-99-99",{placeholder:" "});

//Вызываем функцию для подмены поля ввода на фицры - это применяем, где треб.ввести кошель
$(".koshelek-mask").mask("R 9999 9999 9999",{placeholder:" "});

/*Загружаем дополнительные пункты последних выплат - используется на главной странице кабинета.*/
function add_new_payments()
{	
	//Получаем данные из выбранного селекта
	var count_per_page = $('#count_last_payments_per_page').val();

	$.ajax({
      	type: "POST",
      	url: "cabinet/add_new_last_payments",
	    data: {count_per_page : count_per_page},
	    success: add_new_elements,
	    dataType: 'json'	    
	});
}

//функция используется в ajax запросе в add_new_payments()
function add_new_elements(data)
{
	$( ".data_payments" ).remove();//удаляем строки в таблице с классом data_payments
    //прогоняем цикл и в цикле строим таблицу
    $.each(data, function(key, val)
    {	//запускаем цикл и перебираем его
      	var output = "<tr class='data_payments'>";
		output += "<td>";
		output += val.date_payment;
		output += "</td>";
		output += "<td>";
		output += val.summa;
		output += " <i class=\"fa fa-rub\"></i></td>";
		output += "<td>";
		output += val.kto_okazal_pomosh_name;
		output += " ";
		output += val.kto_okazal_pomosh_last_name;
		output += "</td>";
		output += "</tr>";
		//добавляем данные в идентификатор
		$( "#insert_count_per_page_last_payments" ).append(output);
    });
}


//функции для построения структуры пользователя
$(document).ready(function(){
	
	$(".levels").hide();
});

//Общая функция ajax запроса для построения уровней
function ajax_request(user_level)
{
	$.ajax({
	      type: "POST",
	      url: "cabinet/add_new_elements_in_level",
		   data: {level : user_level},
		   success: add_new_elements_in_level,
		   dataType: 'json'	    
	});
}

function add_new_elements_in_level(data)
{	
	if (data.have_user == 0) {//если у нас на этом уровне нет пользователей
		$( "#level_" + data.level + " tr").remove();
		$( "#level_" + data.level).append(data.structure);
	}
	else
	{
		$( "#level_" + data[0].level + " tr" ).remove();//удаляем все данные из div'a с id, который к нам пришел из запроса
	
		$.each(data, function(key, val)
		{		
			$( "#level_" + data[0].level).append(val.structure);
		});
	}	
}

$("#h4_level_1").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 1;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 2-го уровня
$("#h4_level_2").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 2;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 3-го уровня
$("#h4_level_3").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 3;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 4-го уровня
$("#h4_level_4").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 4;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 5-го уровня
$("#h4_level_5").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 5;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 6-го уровня
$("#h4_level_6").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 6;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//вытаскиваем данные 7-го уровня
$("#h4_level_7").click(function(){
	//дергаем функцию, когда юзер просит отобразить ему
	//пользователей первой линии
	var level = 7;
	ajax_request(level);
	
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//конец функций для построения структуры

/*функции для изменения личных параметров*/
function edit_data(data)
{
	if (data.st == 0)
	{
		$.each(data.msg, function(key, val)
    	{
    		//если у нас есть сообщение об ошибке, то вставляем данные в страницу
    		$("#" + key + "_error").css({'color': 'red', 'text-align': 'center', 'font-size' : '12px'});
    		$( "#" + key + "_error" ).html(val);
    		//Плавно скрываем элемент - точнее сообщени
			$( "#" + key + "_error" ).fadeIn(500).delay(3000).fadeOut(500);
    	});
	}
	else if (data.st == 1)
	{
		$.each(data.msg, function(key, val)
    	{
    		$("#" + key + "_error").css({'color': '#00b22d', 'text-align': 'center', 'font-size' : '12px'});
    		$( "#" + key + "_error" ).html(val);
    		$( "#" + key + "_error" ).fadeIn(500).delay(3000).fadeOut(500);
    	});
	}
}

//функция изменения email'a
$('#edit_email').submit(function(){
	$.post($('#edit_email').attr('action'), $('#edit_email').serialize(), edit_data, 'json');
	return false;
});

//функция изменения номера телефона
$('#edit_phone_number').submit(function(){
	$.post($('#edit_phone_number').attr('action'), $('#edit_phone_number').serialize(), edit_data, 'json');
	return false;
});

//функция изменения номера кошелька
/*$('#edit_advcash').submit(function(){
	$.post($('#edit_advcash').attr('action'), $('#edit_advcash').serialize(), edit_data, 'json');
	return false;
});*/

//функция изменения скайпа
$('#edit_skype').submit(function(){
	$.post($('#edit_skype').attr('action'), $('#edit_skype').serialize(), edit_data, 'json');
	return false;
});

//функция изменения пароля
$('#edit_pass').submit(function(){
	$.post($('#edit_pass').attr('action'), $('#edit_pass').serialize(), edit_data, 'json');
	return false;
});

//функция применяется в FAQ - делаем раскрывающиеся пункты
$(document).ready(function(){
	
	$(".faq_text").hide();
});

$(".faq_block").click(function(){
		
	$(this).next().slideToggle();
       var text = $("span",this).text();
       $("span",this).text(text != "+" ? "+" : "-")
});

//функция сохранения отзыва
$('#new_otziv').submit(function(){
	$.post($('#new_otziv').attr('action'), $('#new_otziv').serialize(), new_otziv, 'json');
	return false;
});

function new_otziv(data)
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
    		$("#new_otziv").hide("slow");
    		$("#" + key + "_otpravlen").css({'color': '#00b22d', 'text-align': 'center', 'font-size' : '14px'});
    		$( "#" + key + "_otpravlen" ).html(val);
    		$( "#" + key + "_otpravlen" ).fadeIn(500).delay(6000).fadeOut(500);
    		window.setTimeout("window.location.reload(true)", 6000); //обновляем страницу через 6 сек.
    	});
	}
}