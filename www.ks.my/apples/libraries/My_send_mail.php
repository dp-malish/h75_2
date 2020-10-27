<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_send_mail {

	function send($to, $subject, $text)
	{ 
	 	require_once APPPATH . 'libraries/php_mailer/PHPMailerAutoload.php'; 

		$from             = "axapckin@ya.ru";//с какого e-mail'а отправлено письмо - указывать только реальный e-mail иначе не будут доставляться письма!
		$mail             = new PHPMailer();
		$mail->setLanguage('ru', APPPATH . 'libraries/php_mailer/language/'); //подключаем русский язык ошибок
		$mail->CharSet    = "utf-8"; //устанавливаем кодировку отсылаемых писем
		$mail->IsSMTP(true);            // используем протокол SMTP
		$mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию 
		$mail->SMTPSecure = "ssl";//говорим, что будем подключаться по SSL
        $mail->Host       = "smtp-pulse.com"; // SMTP хост
        $mail->Port       =  465;                    // устанавливаем SMTP порт
		$mail->Username   = "axapckin@ya.ru";  //имя пользователя SMTP  
		$mail->Password   = "aZY43NP2t7e2";  // SMTP пароль
		$mail->addAddress($to); //кому отправляем письмо - подставляем email
		$mail->SetFrom($from, 'ФикусКасса');//краткая форма заголовка - будет выводится вместо "От кого", например googleAdwords
		$mail->AddReplyTo($from,'ФикусКасса');//краткая форма заголовка - будет выводится вместо "От кого", например googleAdwords
		//$mail->AddReplyTo("",'ФикусКасса');//краткая форма заголовка - будет выводится вместо "От кого", например googleAdwords
		$mail->Subject    = $subject;		
		$mail->Body       = $text; //текст отправляемого письма - точнее html версии
		$mail->IsHTML(true); //сообщаем, что будем отправлять html письмо
		$mail->Priority   = 1; //устанавливаем приоритетность письма - 1 очень высокий - 3 - средний - 5 - низкий
		
		//здесь уже отправляем письмо
		if(!$mail->send())
		{	//Если письмо не получилось отправить возвращаем false
		    return FALSE;		    
		}
		else
		{	//Если письмо отправлено - то возвращаем TRUE
			return TRUE;
		}

		$mail->clearAllRecipients(); //очищаем всех получателей - это делаем для того, чтобы не было ошибок отправки,
		//если будет большой список для отправки почты
		$mail->ClearAttachments();//также очищаем список вложений

	}

}