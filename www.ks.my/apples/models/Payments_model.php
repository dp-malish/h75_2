<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments_model extends CI_Model
{	//модель работы с платежами - все что связано с данными о платежах, находится здесь!

	//Считаем общую сумму партнерских выплат
	function summa_all_partner_payments($user_id)
	{	
		$time_last_payments = time() - (60*60*24);//вычитаем сутки
		$result = $this->db->query("SELECT SUM(summa) as itog_summ FROM output_payments WHERE partner_id = {$user_id} AND date_payment > {$time_last_payments}");
		return $result->row()->itog_summ;
	}

	//Считаем общее количество последних партнерских выплат для юзера
	function count_all_last_24_hour_output_payments($user_id)
	{	
		$time_last_payments = time() - (60*60*24);//вычитаем сутки
		$this->db->where('partner_id', $user_id);
		$this->db->where('date_payment >', $time_last_payments);
		$this->db->from('output_payments');
		$result = $this->db->count_all_results();
		return $result;

		$result->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Получаем все данные о каждой партнерской выплате для юзера
	function find_all_last_24_hour_output_payments($user_id, $num)
	{
		$time_last_payments = time() - (60*60*24);//вычитаем сутки
		$this->db->where('partner_id', $user_id);
		$this->db->where('date_payment >', $time_last_payments);
		$this->db->order_by('date_payment', 'DESC');
		$query = $this->db->get('output_payments', $num);
		
		if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем все значения
            return $query->result_array();
        }
        else
        {//иначе возвращаем FALSE - т.е. чел еще не оказал помощи
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	/*Функции относятся к платежной системе*/

	//ищем неоказанную помощь у юзера
	function find_not_payment_helps($user_id, $summa, $status)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('summa', $summa);
		$this->db->where('status', $status);
		$this->db->limit(1);
		$query = $this->db->get('payments');
		if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем строку значений
            return $query->row_array();
        }
        else
        {//иначе возвращаем FALSE
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Если мы нашли совпадающие данные в прошлом запросе, то делаем апдейт в таблице - время платежа
	function update_time_help($help_id, $time)
	{
		$data = array('payment_date' => $time);

		$this->db->where('id', $help_id);
		$this->db->update('payments', $data);
	}

	//первый шаг - мы формируем данные для формы и вставляем их в таблицу - это происходит при нажатии кнопки помочь
	function payment_step_1($data)
	{
		$this->db->insert('payments', $data);
		return $this->db->insert_id();
	}

	function payment_step_2($payment_id)
	{	
		$this->db->trans_start();//начало транзакции

		$time = time();//фиксируем время в переменной, чтобы время было одинаковое

		//обновляем время оказания помощи и статус
		$data = array('payment_date' => $time, 'status' => 1);
		$this->db->where('id', $payment_id);
		$this->db->update('payments', $data);

		//делаем еще один запрос, чтобы вытащить id юзера
		$this->db->where('id', $payment_id);
		$this->db->limit(1);
		$user_id = $this->db->get('payments');
		$user_id = $user_id->row()->user_id;//засовываем id юзера в переменную

		//Обновляем статус активации года, а также время активации года у юзера
		//и еще сбрасываем годовой заработок на ноль
		$data = array('earn_last_year' => 0, 'activate_year' => 1, 'activate_time_year' => $time);
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		//вытаскиваем все данные юзера
		$this->db->where('id', $user_id);
		$this->db->limit(1);
		$query = $this->db->get('users');

		$this->db->trans_complete();//конец транзакции

		if ($this->db->trans_status() == FALSE)
		{
		    return FALSE;
		}
		else
		{	//возвращаем все данные юзера, нам нужны потом будут имя, фамилия и кто спонсор
			return $query->row_array();
		}
	}

	/*Ниже функции относяться к начислению помощи вышестоящим партнерам*/

	function output_payment_step_1($partner_id)
	{	//Вытаскиваем все данные вышестоящего спонсора
		$this->db->where('partner_id', $partner_id);
		$this->db->limit(1);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	function output_payment_step_2($user_id, $partner_id, $summa, $name, $last_name)
	{	//Функция апдейта годового заработка, общего заработка, записываем данные в output_payments
		//и возвращаем данные вышестоящего партнера

		$this->db->trans_start();//начало транзакции
		$time = time();//фиксируем время в переменной, чтобы время было одинаковое

		//записываем данные в output_payments
		$data = array(
			'partner_id' => $user_id,//id пользователя
			'summa' => $summa,
			'date_payment' => $time,
			'kto_okazal_pomosh_name' => $name,
			'kto_okazal_pomosh_last_name' => $last_name,
			);
		$this->db->insert('output_payments', $data);

		//Апдейтим годовой заработок и общий заработок в системе
		$this->db->query("UPDATE users SET earn_last_year = earn_last_year + '{$summa}', all_earn = all_earn + '{$summa}' WHERE id = '{$user_id}'");

		//вытаскиваем данные вышестоящего партнера
		$this->db->where('partner_id', $partner_id);
		$this->db->limit(1);
		$query = $this->db->get('users');

		$this->db->trans_complete();//конец транзакции

		if ($this->db->trans_status() == FALSE)
		{
		    return FALSE;
		}
		else
		{	//возвращаем данные партнера, который спонор у неактивного партнера
			return $query->row_array();
		}

	}

	function output_payment_step_2_raspredelenie($partner_id, $summa, $name, $last_name)
	{	//выполняем пополнение наших счетов - дергаем функцию
		//когда партнер забанен, либо не активировал год
		$this->db->trans_start();//начало транзакции
		$time = time();//фиксируем время в переменной, чтобы время было одинаковое

		//Вставляем данные в output_payments
		$data = array(
			'partner_id' => 2,
			'summa' => $summa,
			'date_payment' => $time,
			'kto_okazal_pomosh_name' => $name,
			'kto_okazal_pomosh_last_name' => $last_name,
			);
		$this->db->insert('output_payments', $data);

		//Апдейтим годовой заработок и общий заработок
		$this->db->query("UPDATE users SET earn_last_year = earn_last_year + '{$summa}', all_earn = all_earn + '{$summa}' WHERE id = 2");

		//вытаскиваем данные партнера, который является спонсором у неактивного партнера
		$this->db->where('partner_id', $partner_id);
		$this->db->limit(1);
		$query = $this->db->get('users');

		$this->db->trans_complete();//конец транзакции

		if ($this->db->trans_status() == FALSE)
		{
		    return FALSE;
		}
		else
		{	//возвращаем данные партнера, который спонор у неактивного партнера
			return $query->row_array();
		}
	}

	//функция распределения последних 300 рублей
	function output_payment_step_2_raspredelenie_300($summa, $name, $last_name)
	{
		$this->db->trans_start();//начало транзакции
		$time = time();//фиксируем время в переменной, чтобы время было одинаковое

		//Вставляем данные в output_payments
		$data = array(
			'partner_id' => 2,
			'summa' => $summa,
			'date_payment' => $time,
			'kto_okazal_pomosh_name' => $name,
			'kto_okazal_pomosh_last_name' => $last_name,
			);
		$this->db->insert('output_payments', $data);

		//Апдейтим годовой заработок и общий заработок
		$this->db->query("UPDATE users SET earn_last_year = earn_last_year + '{$summa}', all_earn = all_earn + '{$summa}' WHERE id = 2");

		$this->db->trans_complete();//конец транзакции
	} 

	//Записываем данные транзакции, которая не увенчалась успехом.
	function transactions($data)
	{
		$this->db->insert('transactions', $data);
	}


	//Считаем количество всех оказанных мною помощь
	function count_all_i_helped($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->from('payments');
		$result = $this->db->count_all_results();
		return $result;

		$result->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Получаем данные об оказанной помощи юзера - используется на странице - Оказанная помощь
	function find_all_i_helped($user_id, $num, $offset)
	{
		$this->db->where('user_id', $user_id);
		$this->db->order_by('payment_date', 'DESC');
		$query = $this->db->get('payments', $num, $offset);
		
		if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем все значения
            return $query->result_array();
        }
        else
        {//иначе возвращаем FALSE - т.е. чел еще не оказал помощи
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

}