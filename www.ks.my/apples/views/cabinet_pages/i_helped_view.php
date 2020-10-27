<!--Таблица выплат за последние 24 часа-->
				<div class="table table_last_paymets">
					<div class="table_header">
						Список оказанной Вами помощи
					</div>
					<table class="i_helped">
						<thead>
							<tr>
								<th>
									Время и дата
								</th>
								<th>
									Сумма оказанной помощи
								</th>
								<th>
									Статус помощи
								</th>
							</tr>
						</thead>
						<tbody>

						<?php

							if ($i_helped != FALSE)
							{	//если нам вернулись данные, т.е. не равно FALSE. запускаем цикл и строим таблицу
								foreach ($i_helped as $value) { ?>
							
								<tr class="data_payments">
									<td>
										<?php echo date('H:i d.m.Yг.', $value['payment_date']); ?>
									</td>
									<td>
										<?php echo $value['summa']; ?> <i class="fa fa-rub"></i>
									</td>
									<td>
										<?php if ($value['status'] == 0)
										{
											echo "<a href=\"" . base_url() . "cabinet/pay\"><span style=\"color: red; font-size: 16px;\" class=\"hint--top hint--rounded hint--success\" data-hint=\"Нажмите, чтобы перейти к оказанию помощи!\"><i class=\"fa fa-exclamation-triangle\"></i> Необходимо оказать</span></a>";
										}
										else
										{
										 	echo "<span style=\"color: #00b22d; font-size: 16px;\"><i class=\"fa fa-check-circle\"></i> Оказана</span>";
										 } ?>
									</td>
								</tr>
								<?php } //скобка от цикла foreach ?>
						</tbody>
					</table>

					<!--Блок пагинации -->
					<div class="pagination">
						<?php echo $this->pagination->create_links(); ?>
					</div>

					<?php } //Скобка от условия if 

					else { ?>

						<tr>
							<td colspan="2">
								<p style="margin-left: 15px;">Вы еще ни кому не оказали помощь!</p>
							</td>
						</tr>		

						</tbody>
					</table>

					<?php }//скобка от else ?>

				</div><!--Таблица выплат за последние 24 часа-->