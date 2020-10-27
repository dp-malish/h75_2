<div id="profile_page">
	<h3>Настройки Вашего профиля</h3>
	
	<div id="inputs" class="left">
		<div>
			Ваше имя:<br />
			<input type="text" value="<?php echo $user['name']; ?>" disabled="disabled" style="width: 100%;">
		</div>
		<div class="margin_top_inputs">
			Ваша фамилия:<br />
			<input type="text" value="<?php echo $user['last_name']; ?>" disabled="disabled" style="width: 100%;">
		</div>
		<div class="margin_top_inputs">
			Ваш ADVCash:<br />
			<input type="text" name="advcash" value="<?php echo $user['advcash_ru']; ?>" disabled="disabled" style="width: 100%;">
		</div>

		<div class="margin_top_inputs">
			Ваш e-mail:<br />
			<form action="<?php echo base_url(); ?>ajax/edit_user_email" method="POST" id="edit_email">
				<input disabled="disabled" type="text" name="email" value="<?php echo $user['email']; ?>" class="left">
				<input type="submit" value="Изменить">
				<div class="clear"></div>
				<div id="email_error"></div>
				<div class="clear"></div>
			</form>			
		</div>

		<div class="margin_top_inputs">
			Ваш номер телефона:<br />
			<form action="<?php echo base_url(); ?>ajax/edit_phone_number" method="POST" id="edit_phone_number">
				<input type="text" name="phone_number" value="<?php echo $user['phone_number']; ?>" class="left phone_mask">
				<input type="submit" value="Изменить">
				<div class="clear"></div>
				<div id="phone_number_error"></div>
				<div class="clear"></div>
			</form>			
		</div>

		<div class="margin_top_inputs">
			Ваш Skype:<br />
			<form action="<?php echo base_url(); ?>ajax/edit_skype" method="POST" id="edit_skype">
				<input type="text" name="skype" value="<?php echo $user['skype']; ?>" class="left">
				<input type="submit" value="Изменить">
				<div class="clear"></div>
				<div id="skype_error"></div>
				<div class="clear"></div>
			</form>			
		</div>

		<div class="margin_top_inputs">
			Ваш пароль:<br />
			<form action="<?php echo base_url(); ?>ajax/edit_password" method="POST" id="edit_pass">
				<input disabled="disabled" type="password" name="password" class="left">
				<input type="submit" value="Изменить">
				<div class="clear"></div>
				<div id="password_error"></div>
				<div class="clear"></div>
			</form>			
		</div>

	</div>

	<div id="upload_image" class="right">
		<?php
			if (!empty($_SESSION['message']))
			{//Выводим сообщение из сессии - приложение создано, удалено, отредактировано.
				$output = "<div class=\"message_session\"><i class=\"fa fa-exclamation-triangle\"></i> ";
				$output .= $_SESSION['message'];
				$output .= "</div>";
				$_SESSION['message'] = null; //опусташаем переменную, чтобы на других страницах не показывать

				echo $output;
			}
		?>
		<form action="<?php echo base_url(); ?>cabinet/profile" method="POST" enctype="multipart/form-data">
			<div style="text-align: center;">
				<input type="file" name="userfile" id="file-field" />
			</div>
			<p style="margin-bottom: 0px;">Поддерживаемые форматы: <b>gif, jpg, png, jpeg</b>.</p>
			<p style="margin-bottom: 0px;">Максимальный размер фото: <b>600px х 600px</b>.</p>
			<p>Максимальный размер файла - <b>300kb</b>.</p>
			<div id="img-container">
				<img src="<?php echo base_url(); ?>users_avatars/<?php echo $user['avatar']; ?>" id="avatar_upload">
			</div>
			<div style="text-align: center; margin-top: 5px;">
				<input type="submit" name="upload_avatar" value="Изменить фотографию">
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>