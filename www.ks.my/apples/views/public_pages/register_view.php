<div class="header" id="registration_page">
		<div class="left top_text">
			<h2>Сегодня помог ты - завтра помогут тебе!</h2>
			<p id="help_people_registration_top">Помощь людям еще никогда не была такой легкой и увлекательной!<br />Присоединяйтесь! Получайте помощь со всего мира!</p>		
		</div>
		<div class="clear"></div>
</div><!--<div class="header">-->

<div class="osnovnoy_block">
	<div class="content">
		<h1 id="zagolovok-top-glavnaya">Для участия в системе - заполните форму ниже!</h1>
		<div id="block_with_form_and_logo">
			<div id="register_form" class="left">
				<div id="register_ok"></div>
				<form action="<?php echo base_url(); ?>start/registr" method="POST" name="registration" id="register_user">
					<div class="register_error" id="not_register_error"></div>

					<div class="control-group">

						<label class="control-label label-top-padding left">Имя</label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="user_name" id="user_name">

							<div class="register_error" id="user_name_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">Фамилия</label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="last_name" id="last_name">

							<div class="register_error" id="last_name_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group" style="margin-top: 10px;">

						<label class="control-label left">Ваш пол</label>

						<div class="controls">
							<input type="radio" name="sex" value="0"> Женский&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="sex" value="1"> Мужской

							<div class="register_error" id="sex_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">E-mail адрес</label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="register_mail" id="register_email">

							<div class="register_error" id="register_mail_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">Номер телефона</label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="phone_number" id="phone_number" class="phone_mask">

							<div class="register_error" id="phone_number_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">Ваш Skype</label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="skype">

							<div class="register_error" id="skype_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">Рублевый кошелек ADVCash <a href="//www.youtube.com/embed/HxOng4LV2uI?rel=0&amp;controls=0&amp;showinfo=0" class="hint--left hint--rounded hint--success fancybox-media" data-hint="Нажмите, чтобы посмотреть видеоинструкцию!" style="color: #3A3A3A;"><i class="fa fa-question-circle" style="font-size: 17px;"></i></a></label>

						<div class="controls">
							<input type="text" style="width: 270px;" name="advcash" id="advcash" class="koshelek-mask">
							<br />
							<a href="http://wallet.advcash.com/referral/2a8cd36a-be10-4444-8dec-4910ff3f763b" style="color: #0364A8;" target="_blank">Открыть кошелек ADVCash</a>
							<div class="register_error" id="advcash_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="control-group">

						<label class="control-label label-top-padding left">Пароль</label>

						<div class="controls">
							<input type="password" style="width: 270px;" name="password" id="register_password">

							<div class="register_error" id="password_error"></div>
						</div>

						<div class="clear"></div>

					</div><!--div class="control-group"-->

					<div class="controls">
						<div id="register_submit_block">
							<input type="submit" class="submit" name="submit_register" id="register_submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
							<p style="font-size: 9px; text-align:center; margin-top: 5px;">Нажимая на кнопку "Зарегистрироваться", я подтверждаю, что ознакомился с пользовательским соглашением</p>
						</div>
					</div>

				</form>
			</div>
			<div id="logo_with_register_form" class="right">
				<img src="<?php echo base_url(); ?>images/public/logo_for_share.png">
			</div>
			<div class="clear"></div>
		</div>

	</div>
</div>