<div class="header" id="glavnaya">
	<div class="content">
		<div class="right top_text">
			<h2>Зарабатывайте<br /><b>более 100.000<i class="fa fa-rub"></i> в месяц,</b><br />...просто оказывая помощь!</h2>
			<div class="knopka_prisoedinitsya">
				<?php if(!isset($_SESSION['user_id'])): ?>

					<a href="<?php echo base_url(); ?>start/registration">присоединиться</a>

				<?php else: ?>
					<a href="<?php echo base_url(); ?>cabinet">Личный кабинет</a>

				<?php endif; ?>
				
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div><!--<div class="header">-->

<div class="osnovnoy_block">
	<div class="content">
		<h1 id="zagolovok-top-glavnaya">Как работает система<br /><span style="font-size: 14px;">Простая 3-х шаговая система, которая приведет Вас к успеху!</span></h1>
		<!--<div id="video_landing_middle">
			<iframe width="853" height="350" src="//www.youtube.com/embed/N3CkV2IBwNU?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="knopka_prisoedinitsya">
			<a href="<?php echo base_url(); ?>start/registration">начать зарабатывать</a>
		</div>-->
	</div>

	<div class="content2">
		<p class="zagolovok">
			<span class="punkt_number">1</span>
			Вы регистрируетесь в системе взаимопомощи <?php echo ucfirst($_SERVER['HTTP_HOST']); ?>
		</p>
		<p>Для этого Вам необходимо пройти регистрацию на сайте сообщества по приглашению любого участника.<br /><a href="<?php echo base_url(); ?>start/registration" style="text-decoration: underline;">Вы можете приступить к регистрации прямо сейчас >></a></p>
		<p>На сегодняшний день наша система помогла свыше 300 человек из России и стран ближнего зарубежья! Все они находятся в структурных цепочках, которые были сформированы в процессе оказания взаимной помощи от человека к человеку.</p>
		<p>Оказывая помощь в системе в размере 2000 рублей, Вы занимаете место в партнерской структуре пригласившего Вас участника.</p>
		<p>При этом Вы отдаете 1/6-ю часть за обслуживание Вашего личного кабинета в системе <?php echo ucfirst($_SERVER['HTTP_HOST']); ?>, остальные 5/6-х распределяются между вышестоящими партнерами по структуре, благодаря чему и возникает финансовая мотивация каждого участника системы!</p>
	
	</div>
	<div id="page_about_system_img_bg_middle_page"></div>

	<div class="blue_line_regist" style="background: #4B4068;">
		<p>Присоединиться к сообществу! <a href="<?php echo base_url(); ?>start/registration">Зарегистрироваться</a></p>
	</div>

	<div style="background: #f2f2f2; padding: 30px 0px 10px 0px;">
		<div class="content2">
			<p class="zagolovok">
				<span class="punkt_number">2</span>
			Вы оказываете помощь в системе в размере 2000 <i class="fa fa-rub"></i>
			</p>
			<p style="font-size: 18px; margin-top: 30px; font-weight: 600;">Распределение происходит следующим образом:</p>
			<div id="money_raspredelenie" class="left">
				<p class="text_raspredelenie_sredstv" style="margin-top: 30px;"><span style="font-weight: bold;">700 <i class="fa fa-rub"></i></span> - Вы отправляете пригласившему Вас партнеру, по чьей ссылке Вы зарегистрировались.</p>
				<p class="text_raspredelenie_sredstv">по <span style="font-weight: bold;">150 <i class="fa fa-rub"></i></span> - получают участники, чьи места в партнерской структуре находятся на втором, третьем, четвертом, пятом и шестом уровнях выше Вас.</p>
				<p class="text_raspredelenie_sredstv"><span style="font-weight: bold;">250 <i class="fa fa-rub"></i></span> - поступает на счет участника, находящегося на седьмом уровне партнерской структуры</p>
				<p class="text_raspredelenie_sredstv"><span style="font-weight: bold;">300 <i class="fa fa-rub"></i></span> - поступают на обслуживание Вашего личного кабинета в системе <?php echo ucfirst($_SERVER['HTTP_HOST']); ?>.</p>
			</div>
			<div class="right">
				<img id="diagramma" src="<?php echo base_url(); ?>images/public/diagramm.png">
			</div>
			<div class="clear"></div>
			<div class="info_block">
				<h2><i class="fa fa-exclamation-triangle"></i> Все платежи оказания помощи распределяются и выплачиваются автоматически.</h2>
				<p>Благодаря уникальному техническому решению, все вышеуказанные переводы в процессе оказания финансовой помощи производятся в автоматическом режиме! 
					Вам не требуется вручную вводить реквизиты каждого получателя и подтверждать оказание помощи.</p>
			</div>
		</div>
	</div>

	<div class="content2" style="margin-top: 40px;">
		<p class="zagolovok">
			<span class="punkt_number">3</span>
			Вы передаете эстафету оказания помощи другим людям
		</p>
		<p>Передавая эстафету помощи своим друзьям, Вы запускаете цепную реакцию добрых дел!<br />
		Очень скоро у Ваших друзей появляются последователи, а у тех, в свою очередь - свои, и так далее…</p>
		<p style="margin-top: 20px;">Ежедневно эту эстафету принимают все новые и новые люди.
			Количество участников вашей команды стремительно растет по всему миру, и этот процесс уже остановить невозможно!<br />
			<a href="<?php echo base_url(); ?>start/registration" style="text-decoration: underline;">Получить личную ссылку для приглашения друзей >></a>
		</p>
	</div>
	<div class="blue_line_regist">
		<p>Присоединиться к сообществу! <a href="<?php echo base_url(); ?>start/registration">Зарегистрироваться</a></p>
	</div>

	<div class="fast_payments">
		<h1>Моментальная автоматическая выплата помощи</h1>
		<div class="block_payments_systems">
			<img src="<?php echo base_url(); ?>images/public/bg-1.png">
			<div class="content">
				<p>Применяемый платежный интегратор Advanced Cash моментально выплачивает оказанную помощь в системе</p>
				<p>Вы можете выводить средства, сразу же после поступления, удобным для Вас способом!<br />Начиная с пластиковых карт Visa, MasterCard - заканчивая электронными деньгами Яндекс.Деньги, PerfectMoney и др.</p>
			</div>
		</div>
	</div>

	<div class="last_otziv">
		<h1>Отзывы участников системы</h1>
		<div class="content">
			<div class="left" style="width: 32%; margin-right: 2%;">
				<div class="left user_photo_glavnaya">
					<img src="<?php echo base_url(); ?>users_avatars/64073168fe73ff80f700.jpg">
				</div>
				<div>
					<p class="user_name">Людмила Степанова</p>
					<p>В систему я пришла сравнительно недавно. Искала дополнительный доход. Полностью изучила и проверила всю информацию о системе. Искала всякие отзывы, старалась найти плохие, но поиски не увенчались успехом, что меня порадовало! Так как я мама двоих детей, то я решила для себя, что эта система для меня. Она очень проста и прозрачна, ни каких скрытых вещей! Деньги приходят моментально на счет, вывести не составляет труда! Много новых и интересных знакомств, команда собралась то что надо. Рекомендую всем! Не теряйте время!</p>
				</div>
				<div class="clear"></div>
			</div>

			<div class="left" style="width: 32%; margin-right: 2%;">
				<div class="left user_photo_glavnaya">
					<img src="<?php echo base_url(); ?>users_avatars/e76805e9c56126f.jpg">
				</div>
				<div>
					<p class="user_name">Андрей Семенов</p>
					<p>Здравствуйте! Хочу оставить отзыв о системе! Надеюсь кому-нибудь поможет в принятии решения! Вообщем так! Я простой сварщик, всю жизнь работал им, купили сыну компьютер, и он начал лазать в нем. Ну там всякие игры, контакты эти и наткнулся случайно на этот сайт! Он показал мне эту систему и попросил 2000р., я подумал лохотрон очередной! Не дал ему денег, но он подзаработал и зарегистрировался по моим данным, т.к. ему нет 18 лет. Хочу выразить создателям этой системы благодарность, т.к. сын получил в этой системе помощь в размере 200 тысяч рублей и закрыл наш кредит на машину! В результате теперь я сам участвую в системе и рассказываю о ней с гордостью всем своим друзьям и знакомым! Успехов всем! С уважением Семенов Андрей.</p>
				</div>
				<div class="clear"></div>
			</div>

			<div class="right" style="width: 32%;">
				<div class="left user_photo_glavnaya">
					<img src="<?php echo base_url(); ?>users_avatars/sdsjkiu5ws5yji.jpg">
				</div>
				<div>
					<p class="user_name">Азат Валеев</p>
					<p>Меня зовут Азат, проживаю со своей семьей в г.Алма-Ата. О системе узнал от своей сестры, она получила помощь в размере 22 тысяч рублей. Она меня приглашала в систему, как только узнала о ней, но я не пошел, т.к. думал что это очередной развод! Но опасения были опровергнуты ею, когда она через 4 дня пришла с веером из денег в руках и показала свой кабинет в платежной системе! Оказалось, что я заблуждался и после этого решил зарегистрироваться! Хотел вложить 18 тысяч, но она сказала, что для участия нужно только 2 тысячи рублей! И я сидел хлопал глазами, думая - неужели она оказала кому-то помощь и ей тоже потом помогли, да еще и такой суммой. Вообщем мне тоже уже оказали помощь, причем помощь приходит каждый день! Рекомендую всем! И не тяните кота за хвост!</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<!--<p id="read_all_testimonials">
				<a href="#" target="_blank">Прочитать все отзывы <i class="fa fa-angle-right"></i></a>
			</p>-->
		</div>
	</div>

	<div style="border-top: 1px solid #E9E4DE;"></div>

	<div class="blue_line_regist">
		<p>Присоединяйтесь к нашему сообществу! <a href="<?php echo base_url(); ?>start/registration">Зарегистрироваться</a></p>
	</div>

</div>