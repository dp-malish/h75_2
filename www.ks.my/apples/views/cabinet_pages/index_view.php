				<h3 style="margin: 10px 0px 20px;">Вы получили помощь:</h3>

				<div class="small_block all_earn left">
					<p><?php echo $user['all_earn']; ?> <i class="fa fa-rub"></i></p>
					<p class="title earn_all_in_system">Всего</p>
				</div>

				<div class="small_block earn_now_year left">
					<p><?php echo $user['earn_last_year']; ?> <i class="fa fa-rub"></i></p>
					<p class="title earn_now_year_in_system">За текущий год</p>
				</div>

				<div class="small_block earn_24_hours left">
					<p><?php 
						if ($summa_all_partner_payments == FALSE)
						{
							echo "0";
						}
						else
						{
							echo round($summa_all_partner_payments, 2, PHP_ROUND_HALF_DOWN);
						}
					?> <i class="fa fa-rub"></i></p>
					<p class="title earn_24">За последние 24 часа</p>
				</div>
				<div class="clear"></div>

				<h3 style="margin: 10px 0px 20px;">В Вашей команде:</h3>
				<div class="small_block all_people left">
					<p><?php echo $count_partners_in_structure['all_partners']; ?></p>
					<p class="title all_people_in_system">Всего человек</p>
				</div>

				<div class="small_block active_people left">
					<p><?php echo $count_partners_in_structure['active_partners']; ?></p>
					<p class="title active_people_in_system">Активных человек</p>
				</div>

				<div class="small_block deactive_people left">
					<p><?php echo $count_partners_in_structure['all_partners'] - $count_partners_in_structure['active_partners']; ?></p>
					<p class="title deactive_people_in_system">Не активных человек</p>
				</div>
				<div class="clear"></div>

				<!--Таблица выплат за последние 24 часа-->
				<div id="last_24_hour_payments" class="table table_last_paymets">
					<div class="table_header">
						Полученная помощь за последние 24 часа
					</div>
					<table class="last_payment">
						<thead>
							<tr>
								<th>
									Время и дата
								</th>
								<th>
									Сумма
								</th>
								<th>
									Кто оказал помощь
								</th>
							</tr>
						</thead>
						<tbody id="insert_count_per_page_last_payments">

						<?php

							if ($last_24_hour_output_payments != FALSE)
							{	//если нам вернулись данные, т.е. не равно FALSE. запускаем цикл и строим таблицу
								foreach ($last_24_hour_output_payments as $value) { ?>

								<tr class="data_payments">
									<td>
										<?php echo date('H:i d.m.Yг.', $value['date_payment']); ?>
									</td>
									<td>
										<?php echo $value['summa']; ?> <i class="fa fa-rub"></i>
									</td>
									<td>
										<?php echo $value['kto_okazal_pomosh_name'] . " " . $value['kto_okazal_pomosh_last_name']; ?>
									</td>
								</tr>

							<?php } //скобка от цикла foreach ?>

						</tbody>
					</table>

					<!--Блок пагинации -->
					<div class="pagination">
						Сколько отображать элементов (всего <?php echo $all_count_partner_payments; ?>): <select name="count_last_payments_per_page" id="count_last_payments_per_page" onchange="add_new_payments()">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="30">30</option>
							<option value="50">50</option>
							<option value="<?php echo $all_count_partner_payments; ?>">Все</option>						
						</select>
					</div>

					<?php } //Скобка от условия if 

					else { ?>

						<tr>
							<td colspan="3">
								<p style="margin-left: 15px;">Сегодня, к сожалению, Вам не была оказана помощь.</p>
							</td>
						</tr>		

						</tbody>
					</table>

					<?php }//скобка от else ?>

				</div><!--Таблица выплат за последние 24 часа-->

				<!--Таблица структуры-->
				<div class="table table_structure">
					<div class="table_header">
						Структура Вашей команды <span style="font-size: 11px; font-weight: normal;">(не активные участники выделены красным цветом)</span>
					</div>
					<table class="last_payment">
						<thead>
							<tr>
								<th>
									Уровень
								</th>
								<th>
									Имя<br />Фамилия
								</th>
								<th>
									E-mail
								</th>
								<th>
									Телефон
								</th>
								<th>
									Skype
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_1" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 1-го уровня!"><span>+</span>1-й уровень</h4>
									<div class="levels" id="user_level_1">
										<table class="in_command_structure" id="level_1"></table>
									</div>
								</td>
							</tr>
							<!--Второй уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_2" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 2-го уровня!"><span>+</span>2-й уровень</h4>
									<div class="levels" id="user_level_2">
									<table class="in_command_structure" id="level_2"></table>
									</div>
								</td>
							</tr>
							<!--Третий уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_3" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 3-го уровня!"><span>+</span>3-й уровень</h4>
									<div class="levels" id="user_level_3">
									<table class="in_command_structure" id="level_3"></table>
									</div>
								</td>
							</tr>

							<!--4 уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_4" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 4-го уровня!"><span>+</span>4-й уровень</h4>
									<div class="levels" id="user_level_4">
									<table class="in_command_structure" id="level_4"></table>
									</div>
								</td>
							</tr>

							<!--5 уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_5" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 5-го уровня!"><span>+</span>5-й уровень</h4>
									<div class="levels" id="user_level_5">
									<table class="in_command_structure" id="level_5"></table>
									</div>
								</td>
							</tr>

							<!--6 уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure" >
								<h4 id="h4_level_6" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 6-го уровня!"><span>+</span>6-й уровень</h4>
									<div class="levels" id="user_level_6">
									<table class="in_command_structure" id="level_6"></table>
									</div>
								</td>
							</tr>

							<!--7 уровень-->
							<tr class="command_structure">
								<td colspan="5" class="structure last" >
								<h4 id="h4_level_7" class="hint--top hint--rounded hint--success" data-hint="Нажмите, чтобы увидеть команду 7-го уровня!"><span>+</span>7-й уровень</h4>
									<div class="levels" id="user_level_7">
									<table class="in_command_structure" id="level_7"></table>
									</div>
								</td>
							</tr>

						</tbody>
					</table>

					<div>
							
					</div>

				</div><!--Таблица структуры-->