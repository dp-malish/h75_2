<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title; ?></title>

		<!--META-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/public/favicon.png" type="image/x-icon">

		<meta name="description" content="Касса взаимопомощи <?php echo $_SERVER['HTTP_HOST']; ?>">
		<meta name="keywords" content="касса взаимопомощи, погасить кредит">

		<meta property="og:image" content="<?php echo base_url(); ?>images/public/logo_for_share.png"/>
		<meta property="og:title" content="Хочешь вылезти из долгов? Жми!"/>
		<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>"/>
		<meta property="og:site_name" content="<?php echo $_SERVER['HTTP_HOST']; ?>"/>
		<meta property="og:description" content="Будь одним из первых, кто применит эту технику помощи!"/>

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
								<a href="<?php echo base_url(); ?>">Главная</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>start/about_system">Система изнутри</a>
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

		
			