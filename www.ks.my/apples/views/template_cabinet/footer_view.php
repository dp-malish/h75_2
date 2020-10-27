			</div><!--<div class="left content">-->

			<!--Правый сайдбар-->
			<div class="right right_sidebar_all" <?php if($user['activate_year'] == 0 || time() > ($user['activate_time_year'] + (60*60*24*365))){ ?> style="margin-top: 80px;" <?php } ?>>
				<div class="right-sidebar">
					<p class="zagolovok">Ваш информационный наставник</p>
					<span class="blue_line"></span>
					<ul class="sopnsors_list">
						<li>
							<div id="avatar_nastavnika" class="left"><img src="<?php echo base_url(); ?>users_avatars/<?php echo $_SESSION['sponsor_data']['avatar']; ?>" class="avatar_sidebar"></div>
							<p><?php echo $_SESSION['sponsor_data']['name'] . " " . $_SESSION['sponsor_data']['last_name']; ?></p>
							<p><i class="fa fa-envelope"></i> <?php echo $_SESSION['sponsor_data']['email']; ?></p>
							<?php
								echo "<p><i class=\"fa fa-phone-square\"></i> " . $_SESSION['sponsor_data']['phone_number'] . "</p>";

								if ($_SESSION['sponsor_data']['skype'] != "none") {
									echo "<p><i class=\"fa fa-skype\"></i> " . $_SESSION['sponsor_data']['skype'] . "</p>";
								}
							?>
							
							
							<div class="clear"></div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>

				
					<div class="right-sidebar" style="margin-top: 20px;">
						<p class="zagolovok">Ваша партнерская ссылка</p>
						<span class="blue_line"></span>

						<?php
							if ($user['activate_year'] != 0 || time() < ($user['activate_time_year'] + (60*60*24*365)))
							{	//если у нас аккаунт не активирован или время активации акка + год, меньше нынешнего времени
								//то мы прячем данные в этом блоке сайдбара
						?>

							<p style="margin: 25px 0px 0px;">Ссылка для приглашения друзей:</p>
							<input type="text" readonly="readonly" style="width:100%;" value="<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>">
							<p style="text-align: center;">Поделитесь ссылкой в соц.сетях</p>

							<div style="text-align: center;">
								<a href="http://vk.com/share.php?url=<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>" target="_blank" class="share-icon hint--bottom hint--rounded hint--success" data-hint="Вконтакте"><i class="fa fa-vk"></i></a>

								<a href="http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>&st.comments=Будь одним из первых, кто применит эту технику помощи!" target="_blank" class="share-icon hint--bottom hint--rounded hint--success" data-hint="Одноклассники"><i class="fa fa-share-alt"></i></a>

								<a href="http://connect.mail.ru/share?url=<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>&title=Хочешь вылезти из долгов? Жми!&description=Будь одним из первых, кто применит эту технику помощи!&image_url=<?php echo base_url(); ?>images/public/logo_for_share.png" target="_blank" class="share-icon hint--bottom hint--rounded hint--success" data-hint="Мой Мир"><i class="fa fa-at"></i></a>

								<a href="http://www.facebook.com/sharer.php?u=<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>" target="_blank" class="share-icon hint--bottom hint--rounded hint--success" data-hint="Facebook"><i class="fa fa-facebook"></i></a>

								<a href="http://twitter.com/share?url=<?php echo base_url(); ?>?utxp=<?php echo $user['partner_id']; ?>" target="_blank" class="share-icon last-share-button hint--bottom hint--rounded hint--success" data-hint="Twitter"><i class="fa fa-twitter"></i></a>
							</div>

						<?php } else{ ?>

							<p style="text-align: center; margin-top: 15px;">После оказания помощи здесь отобразятся все Ваши данные!</p>

						<?php } ?>

					</div>
					<div class="clear"></div>

					<!--системные уведомления-->
					<div class="right-sidebar system_notifications" style="margin-top: 20px; <?php if($system_notifications['status_message'] == 'open'){ echo 'border: 1px solid red;'; } ?>">
						<p class="zagolovok">Системные уведомления</p>
						<span class="blue_line"></span>
						<?php if($system_notifications['status_message'] != 'open'): ?>
							
							<p style="margin: 25px 0px 0px;">
								Уведомлений пока что нет.
							</p>

						<?php else: ?>
							<p style="margin: 25px 0px 0px;">
								<?php echo replaceBBCode($system_notifications['message']); ?>
							</p>
						<?php endif; ?>
					</div>
					<div class="clear"></div>			

			</div>
			<!--Конец правого сайдбара-->

			<div class="clear"></div>		

		</div><!--div="all"-->

		<!--Custom JS-->
		<script type="text/javascript" src="<?php echo base_url(); ?>js/my.js"></script>
	</body>
</html>