<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title; ?> | Супер-Админка</title>

		<!--META-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/public/favicon.png" type="image/x-icon">

		<!--CSS-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/admin/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/font-awesome.min.css">

		<!--JS-->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

		<!--Визуальный редактор для написания отзыва-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wysibb.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>styles/cabinet/wbbtheme.css" />
		
	</head>
	<body>
	<header>
		<ul>
			<li>
				<a href="<?php echo base_url(); ?>fuck_off_ad/start">Главная</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>fuck_off_ad/notifications">Системные уведомления</a>
			</li>
			<li>
				<?php if(isset($_SESSION['admin_id'])) { ?>
					<a href="<?php echo base_url(); ?>fuck_off_ad/logout">Выход</a>
				<?php } ?>
			</li>
		</ul>
	</header>