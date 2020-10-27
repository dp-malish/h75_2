<!DOCTYPE HTML>
<html>
	<head>
		<title>Подтверждение регистрации</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body style="margin: 0px; padding: 0px; font-family: Arial, sans-serif; font-size: 14px;">
		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background: #ffffff; margin: 0 auto;">
			<tr>
				<td style="text-align: center;">
					<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background: #ffffff; border-bottom: 1px solid #dddddd;">
						<tr>
							<td style="width: 50%;">
								<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>" target="_blank">
									<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/emails/confirm_reg/images/logo_for_menu.png" height="65">
								</a>
							</td>
							<td style="width: 50%;">
								<p>
									Дата регистрации: <?php echo date('d.m.Yг.', time()); ?>
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0" border="0" width="100%" style="background: #f1f1f1; padding: 10px;">
						<tr>
							<td style="text-align: center; width: 50%;">
								<p style="color: #5e7218; font-weight: bold;">
									Поздравляем с успешной регистрацией!
								</p>
								<p style="font-size: 13px;">
									Для подтверждения регистрации и активации аккаунта Вам необходимо кликнуть по кнопке ниже.
								</p>
								<br/>
								