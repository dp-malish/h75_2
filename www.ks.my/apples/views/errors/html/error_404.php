<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Страница не найдена | Blagodaryu.biz - Касса взаимопомощи! Сегодня помог ты - завтра помогут тебе!</title>

		<!--META-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--CSS-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/jquery.formstyler.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/hint.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>js/source/jquery.fancybox.css" type="text/css" media="screen" />

		<!--JS-->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>		
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.formstyler.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.modal.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/phone_digit.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>js/source/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/source/helpers/jquery.fancybox-media.js"></script>

	</head>
	<body>
		<div class="all">

		<div class="top_menu">
				<div class="content">
					<div class="left">
						<a href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>images/public/logo_for_menu.png">
						</a>
					</div>
					<div class="right margin_top_25px">
						<ul>
							<li>
								<a href="<?php echo base_url(); ?>start/about_system">О системе</a>
							</li>
							<li>
								<a href="#">Как это работает?</a>
							</li>
							<li>
								<a href="#">С чего начать?</a>
							</li>
							<li>
								<?php if(!isset($_SESSION['user_id'])): ?>

									<a href="#index_login" class="modalLink login_logout">Вход</a>

								<?php else: ?>

									<a href="<?php echo base_url(); ?>cabinet/logout" class="login_logout">Выйти</a>

								<?php endif; ?>
							</li>
							<div class="clear"></div>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div><!--<div class="top_menu">-->	

		<div id="content_404_page">
			<div id="static_content">
				<img src="<?php echo base_url(); ?>images/public/404_sorry_image.png" width="750">
				<h1 style="text-align: center; margin-top: 10px;"> Страница не найдена. </h1>
				<h3 style="text-align: center; margin: 15px 0px;"> К сожалению запрашиваемой страницы не существует, <br>
				        приносим свои извинения!
				   </h3>
			</div>
		</div>

				<!--Эффект затемнения-->
<div class="overlay"></div>

	<!--loginmodal-->
	<div id="index_login" class="modal modal-login">
		<a href="#" class="closeBtn closeLoginModal right"><i class="fa fa-times"></i></a>
		<h1>Вход в личный кабинет</h1>

		<div id="you_login_ok"></div>

		<form action="<?php echo base_url(); ?>start/login" method="post" name="login_index" class="recover" id="loginIndex">
			
			<input name="login_mail" class="usermail" type="text" placeholder="Введите Ваш e-mail" id="login_mail">
			<div id="error_login_email"></div>

			<input name="user_password" class="usermail" type="password" placeholder="Введите Ваш пароль" id="user_password">
			<div id="error_password_email"></div>

			<div class="login-submit" id="loginsubmit">
				<input name="user_login" class="submit" type="submit" id="login_submit" value="ВОЙТИ В КАБИНЕТ">
			</div>

		</form>
		<div class="popup-link-footer">
			Забыли пароль? <a href="#recoverpass" class="modalLink">Восстановить пароль</a>
		</div>
	</div>

	<!--recovermodal-->
	<div id="recoverpass" class="modal modal-login">
		<a href="#" class="closeBtn closeLoginModal right"><i class="fa fa-times"></i></a>
		<h1>Восстановление пароля</h1>

		<p id="text_recover_pass" style="text-align: center; margin: 10px 0px 5px 0px;">Введите Ваш e-mail адрес, используемый в системе. На него мы вышлем ссылку и инструкцию по восстановлению пароля!</p>
		
		<div id="recover_msg"></div>

		<form action="<?php echo base_url(); ?>start/recover_password" method="post" name="recoverpass" class="recover" id="recoverpassIndex">
			<input name="email_for_recover" class="usermail" type="text" placeholder="Введите Ваш e-mail" id="recover_email">
			<div id="recover_email_error_msg"></div>

			<div class="login-submit" id="recoversubmit">
				<input name="submit_recover" class="submit" type="submit" id="submit_recover" value="ВОССТАНОВИТЬ ПАРОЛЬ">
			</div>

		</form>
		<div class="popup-link-footer">
			Хотите войти в личный кабинет? <a href="#index_login" class="modalLink">Войти</a>
		</div>
	</div>	

		</div><!--div="all"-->

		<footer>
			<div class="content">
				<div class="left">
					<p><?php echo date('Yг.', time()); ?> &copy; Все права защищены.</p>
				</div>
				<div class="clear"></div>
			</div>
		</footer>

		<!--Custom JS-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/my_public.js"></script>
	</body>
</html>
