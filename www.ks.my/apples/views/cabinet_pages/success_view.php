<!--Таблица успешной оплаты-->
<div class="table table_structure">
	<div class="table_header">
		<span style="color: rgb(66, 207, 43);"><?php echo $user['name']; ?>, поздравляем Вас с успешным оказанием помощи!</span>
	</div>
	<table class="last_payment">
		<thead>
			<tr style="font-size: 12px;">
				<th>
					ID оказанной помощи
				</th>
				<th>
					Сумма помощи
				</th>
				<th>
					Кошелек с которого оказана помощь
				</th>
			</tr>
		</thead>
		<tbody>
			<tr style="text-align: center;">
				<td style="padding: 7px 0px; border-bottom: 1px solid #eaeff0;">
					<?php echo $ac_order_id; ?>
				</td>
				<td style="padding: 7px 0px; border-bottom: 1px solid #eaeff0;">
					<?php echo $ac_buyer_amount_without_commission; ?> <i class="fa fa-rub"></i>
				</td>
				<td style="padding: 7px 0px; border-bottom: 1px solid #eaeff0;">
					<?php echo $ac_src_wallet; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<p style="margin: 10px 7px; text-align: center;">Теперь Вы можете поделиться своей ссылкой с друзьями, чтобы пригласить их в систему.</p>
</div>