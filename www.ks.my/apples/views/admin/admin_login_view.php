<!DOCTYPE HTML>
<html>
	<head>
		<title>Авторизация администратора | Супер-Админка</title>

		<!--META-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/public/favicon.png" type="image/x-icon">

		<!--CSS-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/admin/style.css">

		<!--JS-->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

		<!--Визуальный редактор для написания отзыва-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wysibb.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/wbbtheme.css" />
		
	</head>
	<body id="autorization_in_admin">
		<div id="autorization_form_all">
			<div id="autorization_form">

				<div id="you_login_ok"></div>

				<form action="<?php echo base_url(); ?>fuck_off_ad/login" method="post" name="login_index" class="recover" id="loginAdmin">
					
					<input name="admin_login_mail" class="usermail" type="text" placeholder="Введите Ваш e-mail" id="admin_login_mail">
					<div id="admin_login_mail_error"></div>

					<input name="admin_password" class="usermail" type="password" placeholder="Введите Ваш пароль" id="admin_password">
					<div id="admin_password_error"></div>

					<div class="login-submit" id="loginsubmit">
						<input name="user_login" class="submit" type="submit" id="login_submit" value="ВОЙТИ">
					</div>

				</form>
			</div>
		</div>