<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_partner_helps {

	function payment_active_partner($source_wallet, $user_koshelek, $payment_summ, $payment_user_name, $payment_user_last_name, $site_name)
	{	//передаем сюда - кошелек с которого списывать деньги
		//номер кошелька, на который надо сделать зачисление
		//сумму, которую надо зачислить
		//Имя юзера, который оказывает помощь
		//Фмилию юзера, который оказывает помощь
		//Ну и имя сайта, на котором оказана помощь

		//подгружаем либу от ADVCash
		require_once APPPATH . 'libraries/adv_payments/MerchantWebService.php';

		$merchantWebService = new MerchantWebService();

		$arg0 = new authDTO();
		$arg0->apiName = "ficus";//берем название API из кабинета AdvCash
		$arg0->systemAccountName = "maksduxisabina@gmail.com";//указываем email на который зарегистрирован левый кошелек
		$arg0->authenticationToken = $merchantWebService->getAuthenticationToken("3B1nUpQ0h8");//указываем пароль от API

		$arg1 = 'TRANSFER_INNER_SYSTEM';//сообщаем, что будет внутрисистемный платеж

		$arg2 = new transferRequestDTO();
		$arg2->amount = $payment_summ;//сумма платежа с точностью до 2-х знаков после запятой
		$arg2->srcWalletId = $source_wallet;//кошелек отправителя платежа
		$arg2->destWalletId = $user_koshelek;//кошелек получателя платежа
		$arg2->comment = "Материальная помощь от - " . $payment_user_name . " " . $payment_user_last_name . " в системе " . $site_name;//комментарий к платежу
		$arg2->savePaymentTemplate = false;//Сохранить платеж как шаблон или нет - false - нет.

		$validateTransfer = new validateTransfer();
		$validateTransfer->arg0 = $arg0;
		$validateTransfer->arg1 = $arg1;
		$validateTransfer->arg2 = $arg2;

		$makeTransfer = new makeTransfer();
		$makeTransfer->arg0 = $arg0;
		$makeTransfer->arg1 = $arg1;
		$makeTransfer->arg2 = $arg2;

		//делаем валидацию платежа, который хотим совершить
		$merchantWebService->validateTransfer($validateTransfer);
		//совершаем платеж
	    $merchantWebService->makeTransfer($makeTransfer);

	}

}