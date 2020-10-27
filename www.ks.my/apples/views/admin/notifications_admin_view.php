				<!--Таблица выплат за последние 24 часа-->
				<div id="last_24_hour_payments" class="table table_last_paymets left" style="width: 70%;">
					<?php
						if (!empty($_SESSION['message']))
						{//Выводим сообщение из сессии - приложение создано, удалено, отредактировано.
							$output = "<div class=\"message_session\" style=\"text-align:center;\"><i class=\"fa fa-exclamation-triangle\"></i> ";
							$output .= $_SESSION['message'];
							$output .= "</div>";
							$_SESSION['message'] = null; //опусташаем переменную, чтобы на других страницах не показывать

							echo $output;
						}
					?>
					<div class="table_header">
						Системные уведомления
					</div>
					<table class="last_payment">
						<thead>
							<tr>
								<th style="width: 15%;">
									Время и дата
								</th>
								<th style="width: 15%;">
									Статус
								</th>
								<th style="width: 15%;">
									Кто создал
								</th>
								<th style="width: 55%;">
									Текст уведомления
								</th>
							</tr>
						</thead>
						<tbody>

						<?php

							if ($system_notifications != FALSE)
							{	//если нам вернулись данные, т.е. не равно FALSE. запускаем цикл и строим таблицу
								foreach ($system_notifications as $value) { ?>

								<tr class="data_payments">
									<td>
										<?php echo date('H:i d.m.Yг.', $value['date']); ?>
									</td>
									<td>
										<?php if($value['status_message'] == 'open') { ?>
											<p style="color: #00b22d;"><i class="fa fa-check"></i> Включено</p>
											<div>
												<form action="<?php echo base_url(); ?>fuck_off_ad/edit_status_notification?id=<?php echo $value['id']; ?>" method="POST" class="edit_status_notification">
													<input type="hidden" value="close" name="message_status">
													<input type="submit" value="Выключить">
												</form>
											</div>
										<?php } else{ ?>
											<p style="color: red;"><i class="fa fa-times"></i> Выключено</p>
											<div>
												<form action="<?php echo base_url(); ?>fuck_off_ad/edit_status_notification?id=<?php echo $value['id']; ?>" method="POST" class="edit_status_notification">
													<input type="hidden" value="open" name="message_status">
													<input type="submit" value="Включить" onclick="return confirm('Уверены что это уведомление необходимо включить?');">
												</form>
											</div>
										<?php } ?> 
									</td>
									<td>
										<?php echo $value['admin_name']; ?>
									</td>
									<td>
										<?php echo replaceBBCode($value['message']); ?>
									</td>
								</tr>

							<?php } //скобка от цикла foreach ?>

						</tbody>
					</table>

					<?php echo $this->pagination->create_links(); ?>

					<?php } //Скобка от условия if 

					else { ?>

						<tr>
							<td colspan="4">
								<p style="margin-left: 15px;">Пока что ни одного уведомления не создано.</p>
							</td>
						</tr>		

						</tbody>
					</table>

					<?php }//скобка от else ?>

				</div><!--Таблица-->
				<div class="right" style="width: 29.8%;">
					<div>
						<div id="text_notification_otpravlen"></div>
						<form action="<?php echo base_url(); ?>ajax/save_new_notification" method="POST" id="new_notification">
							<textarea id="editor" name="text_notification" style="min-height: 100px;"></textarea>
							<div id="text_notification_error"></div>
							<input type="submit" id="save_notification" style="margin-top: 10px;" value="Сохранить уведомление">
						</form>
						<p>Максимум 500 символов!</p>
					</div>
				</div>
				<div class="clear"></div>