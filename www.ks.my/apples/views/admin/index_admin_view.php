<p>Привет, <?php echo $admin_data['admin_name']; ?>!</p>
<p>Всего участников - <?php echo $count_all_partners['all_partners']; ?></p>
<p>Активных участников - <?php echo $count_all_partners['active_partners']; ?></p>
<p>Не активных участников - <?php echo $count_all_partners['all_partners'] - $count_all_partners['active_partners']; ?></p>
<hr style="margin-bottom: 15px;" />
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
						Отзывы от пользователей о системе
					</div>
					<table class="last_payment">
						<thead>
							<tr>
								<th style="width: 15%;">
									Время и дата
								</th>
								<th style="width: 15%;">
									Имя и Фамилия
								</th>
								<th style="width: 15%;">
									Статус отзыва
								</th>
								<th style="width: 25%;">
									Текст отзыва
								</th>
								<th style="width: 10%;">
									Примечание модератора
								</th>
								<th style="width: 20%;">
									Новый комментарий модератора
								</th>
							</tr>
						</thead>
						<tbody>

						<?php

							if ($testimonials != FALSE)
							{	//если нам вернулись данные, т.е. не равно FALSE. запускаем цикл и строим таблицу
								foreach ($testimonials as $value) { ?>

								<tr class="data_payments">
									<td>
										<?php echo date('H:i d.m.Yг.', $value['date']); ?>
									</td>
									<td>
										<?php echo $value['user_name'] . " " . $value['user_last_name']; ?>
									</td>
									<td>
										<?php
											if ($value['status'] == 0)
											{ ?>
												<div>
													<p>На модерации</p>
													<div class="left">
														<form action="<?php echo base_url(); ?>fuck_off_ad/edit_status_otziva?id=<?php echo $value['id']; ?>" method="POST">
															<input type="hidden" name="status_otziva" value="2">
															<input type="submit" value="Одобрить" onclick="return confirm('Уверены что хотите одобрить этот отзыв?');">
														</form>
													</div>
													<div class="right">
														<form action="<?php echo base_url(); ?>fuck_off_ad/edit_status_otziva?id=<?php echo $value['id']; ?>" method="POST">
															<input type="hidden" name="status_otziva" value="1">
															<input type="submit" value="Отклонить" onclick="return confirm('Уверены что хотите отклонить отзыв?');">
														</form>
													</div>
													<div class="clear"></div>
												</div>
											<?php } //if ($value['status'] == 0)
												elseif ($value['status'] == 1)
												{ ?>
													<p style="color: red;">ОТКЛОНЕН</p>
													<form action="<?php echo base_url(); ?>fuck_off_ad/edit_status_otziva?id=<?php echo $value['id']; ?>" method="POST">
														<input type="hidden" name="status_otziva" value="2">
														<input type="submit" value="Одобрить" onclick="return confirm('Уверены что хотите одобрить этот отзыв?');">
													</form>
												<? } //elseif ($value['status'] == 1)
										?>
									</td>
									<td style="text-align: left;">
										<?php echo replaceBBCode($value['text_comment']); ?>
									</td>
									<td style="text-align: left;">
										<?php echo $value['primechanie_modera']; ?>
									</td>
									<td style="text-align: left;">
										<form action="<?php echo base_url(); ?>fuck_off_ad/seve_comment_modera?id=<?php echo $value['id']; ?>" method="POST">
											<textarea class="editor_comment_modera" name="comment_modera" style="min-height: 50px;"></textarea>
											<input type="submit" style="margin-top: 10px;" value="Сохранить комментарий">
										</form>
									</td>
								</tr>

							<?php } //скобка от цикла foreach ?>

						</tbody>
					</table>

					<?php echo $this->pagination->create_links(); ?>

					<?php } //Скобка от условия if 

					else { ?>

						<tr>
							<td colspan="6">
								<p style="margin-left: 15px;">Пока что нет ни одного нового отзыва о системе.</p>
							</td>
						</tr>		

						</tbody>
					</table>

					<?php }//скобка от else ?>