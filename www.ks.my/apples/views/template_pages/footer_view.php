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
				<div class="right">
					<a href="<?php echo base_url(); ?>start/user_agreement">Пользовательское соглашение</a>
				</div>
				<div class="clear"></div>
			</div>
		</footer>

		<!--Custom JS-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/my_public.js"></script>
	</body>
</html>