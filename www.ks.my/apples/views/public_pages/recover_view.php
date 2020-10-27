<div id="recoverpass_ok" class="recoverpass_ok" style="max-width: 450px; margin: 10px auto 100px;">
		<h1 style="text-align: center; margin: 15px 0px;">Изменение пароля</h1>

		<p style="text-align: center;">Введите Ваш новый пароль в поле ниже и нажмите кнопку<br />"Обновить пароль"</p>
		
		<div id="update_msg"></div>

		<form action="<?php echo base_url(); ?>start/update_pswd" method="post" name="updatepass" class="recover" id="update_new_pass">

			<?php if (!empty($_SESSION['message'])): ?>

				<div class="message_session_error_recover" style="text-align:center; color: red;">

					<i class="fa fa-exclamation-triangle" style="font-size: 20px;"></i>&nbsp;
					
					<?php echo $_SESSION['message']; ?>

					<br />

					<a href="#recoverpass" id="recover_pass_link" class="modalLink">Повторить процедуру восстановления пароля</a>

				</div>

				<?php $_SESSION['message'] = null; ?>

			<?php else: ?>

				<input name="new_password" class="usermail" type="text" placeholder="Введите новый пароль" id="update_pass">
				
				<input name="hash" type="hidden" value="<?php echo $_GET['code']; ?>">

				<div id="update_error_msg"></div>

				<div class="login-submit" id="updatesubmit">
					<input name="submit_update" class="submit" type="submit" id="update_pass_submit" value="ОБНОВИТЬ ПАРОЛЬ">
				</div>

			<?php endif; ?>

		</form>
	</div>