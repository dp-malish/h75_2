<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title; ?></title>

		<!--META-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/public/favicon.png" type="image/x-icon">

		<meta property="og:image" content="<?php echo base_url(); ?>images/public/logo_for_share.png"/>
		<meta property="og:title" content="Хочешь вылезти из долгов? Жми!"/>
		<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>"/>
		<meta property="og:site_name" content="<?php echo $_SERVER['HTTP_HOST']; ?>"/>
		<meta property="og:description" content="Будь одним из первых, кто применит эту технику помощи!"/>

		<!--CSS-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/jquery.formstyler.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/hint.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>js/source/jquery.fancybox.css" type="text/css" media="screen" />
		

		<!--JS-->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.formstyler.min.js"></script>	
		<script type="text/javascript" src="<?php echo base_url(); ?>js/source/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/source/helpers/jquery.fancybox-media.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/phone_digit.js"></script>

		<!--Визуальный редактор для написания отзыва-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wysibb.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/wbbtheme.css" />

	</head>
	<body>
		<div class="all">

			<!--Левый сайдбар-->
			<div class="left left-sidebar">
				<a href="<?php echo base_url(); ?>cabinet" id="logotip-sidebar">
					<img src="<?php echo base_url(); ?>images/cabinet/logo.png">
				</a>

				<ul>
					<li>
						<a href="<?php echo base_url(); ?>cabinet"><i class="fa fa-home"></i> Главная</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>cabinet/i_helped"><i class="fa fa-birthday-cake"></i> Оказанная помощь</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>cabinet/profile"><i class="fa fa-user"></i> Мой профиль</a>
					</li>
					<!--<li>
						<a href="<?php echo base_url(); ?>cabinet/promo"><i class="fa fa-star"></i> Промо-материалы</a>
					</li>-->
					<li>
						<a href="<?php echo base_url(); ?>cabinet/faq"><i class="fa fa-comments"></i> ЧаВо</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>cabinet/otziv"><i class="fa fa-pencil"></i> Написать отзыв</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>cabinet/logout"><i class="fa fa-power-off"></i> Выйти</a>
					</li>
				</ul>

			</div>

			<!--Верхнее меню-->
			<div class="left top-menu" <?php if($user['activate_year'] == 0 || time() > ($user['activate_time_year'] + (60*60*24*365))){ ?> style="margin-left: 20.1%; position: fixed;" <?php } ?>>
				<div class="left">
					<?php
						if ($user['activate_year'] == 0 || time() > ($user['activate_time_year'] + (60*60*24*365)))
						{	//Если год не оплачен или нынешняя дата больше времени активации аккаунта, то выводим кнопку, что необходимо оказать помощь
					?>
						<div>
							<div class="left">
								<p class="error" style="margin-top: 15px; font-weight: bold;">Необходимо оказать помощь в размере 2000 <i class="fa fa-rub"></i>!</p>
							</div>
							<div class="left" style="margin-top: 10px; margin-left: 10px;">
								<a href="<?php echo base_url(); ?>cabinet/pay" class="left help_top">помочь</a>
								<a href="http://www.youtube.com/watch?v=aqxf7_8oj7I?rel=0" class="hint--right hint--rounded hint--success fancybox-media" data-hint="Нажмите, чтобы посмотреть видеоинструкцию!" style="margin: 5px 0px 0px 5px;"><i class="fa fa-question-circle" style="font-size: 22px;"></i></a>
							</div>
							<div class="clear"></div>
						</div>
					
					<?php }//закрывающая скобка от if

						else { ?>

						<p style="margin-top: 15px;">Следующую помощь необходимо будет оказать: <b><?php echo date('d.m.Yг.', ($user['activate_time_year'] + (60*60*24*365))); ?></b></p>

					<?php }
					?>
					
				</div>
				<div class="right">
					<p class="left" style="margin-top: 15px;">Здравствуйте, <?php echo $user['name']; ?>!</p>
					<img src="<?php echo base_url(); ?>users_avatars/<?php echo $user['avatar']; ?>" class="avatar-top right">
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<!--Область контента-->
			<div class="left content" <?php if($user['activate_year'] == 0 || time() > ($user['activate_time_year'] + (60*60*24*365))){ ?> style="margin-top: 80px;" <?php } ?>>