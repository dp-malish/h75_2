<div id="profile_page">
	<h3>Напишите отзыв о системе <?php echo $_SERVER["HTTP_HOST"]; ?></h3>
	<p style="font-size: 13px; border-bottom: 1px solid #ccc;">Ваш отзыв поможет нам понять как улучшить систему. Так же он будет размещен на странице<br />"Отзывы о системе", после проверки модератором.</p>
	<?php if($otziv == 'none'): ?>
		<span style="font-size: 13px; margin-bottom: 10px;">Отзыв может содержать максимум 3000 знаков.</span>
		<div id="text_otziva_otpravlen"></div>
		<form action="<?php echo base_url(); ?>ajax/save_otziv" method="POST" id="new_otziv">
			<textarea id="editor" name="text_otziva" style="min-height: 100px;"></textarea>
			<p style="font-size: 9px; margin: 0px;">Если Вы заполнили поле, нажали кнопку "Отправить отзыв о системе" и увидели сообщение об ошибке, нажмите кнопку отправить отзыв еще раз.</p>
			<div id="text_otziva_error"></div>
			<input type="submit" id="save_otziv" style="margin-top: 10px;" value="Отправить отзыв о системе">
		</form>

	<?php else: ?>

		<div id="text_otziva_pokaz_v_kabinete">
			<p style="font-weight: bold;">Статус отзыва: <?php if ($otziv['status'] == 0){ echo "<span style='font-weight: normal; color: #3b5998;'>На модерации</span>"; } elseif($otziv['status'] == 1){ echo "<span style='color: red; font-weight: normal;'>Отклонен</span>"; if($otziv['primechanie_modera'] != 'no'){ echo "</p><p><span style='font-weight: bold;'>Примечание модератора:</span> " . $otziv['primechanie_modera']; } } else{ echo "<span style='color: #00b22d; font-weight: normal;'>Размещен на сайте! Благодарим за отзыв!</span>"; }?></p>
			<p><span style="font-weight: bold;">Дата:</span> <?php echo date('H:i d.m.Yг.', $otziv['date']); ?></p>
			<p style="font-weight: bold;">Текст Вашего отзыва:</p>
			<?php 
				if ($otziv['status'] == 1)
				{	//если отзыв отклонен, то выводим редактор и в него вставляем текст юзера
			?>
					<span style="font-size: 13px; margin-bottom: 10px;">Отзыв может содержать максимум 3000 знаков.</span>
					<div id="text_otziva_otpravlen"></div>
					<form action="<?php echo base_url(); ?>ajax/update_otziv?id=<?php echo $otziv['id']; ?>" method="POST" id="new_otziv">
						<textarea id="editor" name="text_otziva" style="min-height: 100px;"><?php echo $otziv['text_comment']; ?></textarea>
						<p style="font-size: 9px; margin: 0px;">Если Вы заполнили поле, нажали кнопку "Отправить отзыв о системе" и увидели сообщение об ошибке, нажмите кнопку отправить отзыв еще раз.</p>
						<div id="text_otziva_error"></div>
						<input type="submit" id="save_otziv" style="margin-top: 10px;" value="Отправить отзыв о системе">
					</form>
			<?php	}//if ($otziv['status'] == 1)
				else { ?>

					<div style="margin-left: 15px;"><?php echo replaceBBCode($otziv['text_comment']); ?></div>
			
			<?php	}
			?>			
		</div>

	<?php endif; ?>
	
</div>