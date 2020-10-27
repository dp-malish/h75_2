<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cron_job extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('cron_model');
    }

	//удаляем из таблицы output_payments все выплаты, которым больше 25-и часов
	public function delete_old_output_payments()
	{
		$all_old_output_payments = $this->cron_model->find_all_old_output_payments();
		if ($all_old_output_payments)
		{	//если нам что-то вернулось, т.е. TRUE, то запускаем цикл, иначе ничего не делаем
			//запускаем цикл, считая количество элементов в массиве с помощью count()
			for ($i = 0; $i <= count($all_old_output_payments); $i++)
			{ 
				$this->cron_model->delete_all_old_output_payments();
			}
		}
		
	}

	//делаем автоматическую пралангацию системе, мне
	//дергаем эту функцию раз в 6 месяцев
	public function automatic_prolongation()
	{
		$this->cron_model->automatic_prolongation();
	}

	//удаляем все неудачные транзакции, которым больше 5-и суток
	public function delete_old_bad_transactions()
	{
		$all_old_bad_transactions = $this->cron_model->find_all_old_bad_transactions();
		if ($all_old_bad_transactions)
		{	//если нам что-то вернулось, т.е. TRUE, то запускаем цикл, иначе ничего не делаем
			//запускаем цикл, считая количество элементов в массиве с помощью count()
			for ($i = 0; $i <= count($all_old_bad_transactions); $i++)
			{ 
				$this->cron_model->delete_all_old_bad_transactions();
			}
		}
		
	}

	//удаляем все логи не отправленных писем, которым больше 5-и суток
	public function delete_old_logs_sending_mails()
	{
		$all_old_logs_sending_mails = $this->cron_model->find_all_old_logs_sending_mails();
		if ($all_old_logs_sending_mails)
		{	//если нам что-то вернулось, т.е. TRUE, то запускаем цикл, иначе ничего не делаем
			//запускаем цикл, считая количество элементов в массиве с помощью count()
			for ($i = 0; $i <= count($all_old_logs_sending_mails); $i++)
			{ 
				$this->cron_model->delete_all_old_logs_sending_mails();
			}
		}
		
	}

	//апдейтим активацию года у юзеров, у которых время активации года превышает нынешнее время
	public function update_activate_year()
	{
		$all_old_users = $this->cron_model->find_all_old_users();
		if ($all_old_users)
		{
			foreach ($all_old_users as $value)
			{
				$this->cron_model->update_activate_year($value['id']);
			}
		}	
	}

}//class Cron_job