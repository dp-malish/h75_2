<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model {
	//Используется в контроллере Cron_job.php

	//вытаскиваем из таблицы output_payments все выплаты, которым больше 24-и часов
	function find_all_old_output_payments()
	{
		$time = time() - (60 * 60 * 24);//вычитаем из нынешнего времени 24 часов
		$this->db->where('date_payment <', $time);
		$query = $this->db->get('output_payments');
		return $query->result_array();
	}

	//удаляем все старые выплаты из таблицы output_payments, которым больше 24-и часов
	function delete_all_old_output_payments()
	{
		$time = time() - (60 * 60 * 24);//вычитаем из нынешнего времени 24 часов
		$this->db->where('date_payment <', $time);
		$this->db->delete('output_payments');
	}

	//делаем автоматическую пралангацию системе, основателю
	function automatic_prolongation()
	{
		$data = array('activate_time_year' => time() + (60 * 60 * 24 * 365));//прибавляем к времени 1 год

		$this->db->where('id', 1);
		$this->db->update('users', $data);

		$this->db->where('id', 2);
		$this->db->update('users', $data);
	}

	//вытаскиваем все неудачные транзакции, которым больше 5-и суток
	function find_all_old_bad_transactions()
	{
		$time = time() - (60 * 60 * 24 * 5);
		$this->db->where('payment_date <', $time);
		$query = $this->db->get('transactions');
		return $query->result_array();
	}

	//удаляем все неудачные транзакции, которым больше 5-и суток
	function delete_all_old_bad_transactions()
	{
		$time = time() - (60 * 60 * 24 * 5);
		$this->db->where('payment_date <', $time);
		$this->db->delete('transactions');
	}

	//вытаскиваем все логи не отправленных писем, которым больше 5-и суток
	function find_all_old_logs_sending_mails()
	{
		$time = time() - (60 * 60 * 24 * 5);
		$this->db->where('date <', $time);
		$query = $this->db->get('logs_send_email');
		return $query->result_array();
	}

	//удаляем все логи не отправленных писем, которым больше 5-и суток
	function delete_all_old_logs_sending_mails()
	{
		$time = time() - (60 * 60 * 24 * 5);
		$this->db->where('date <', $time);
		$this->db->delete('logs_send_email');
	}

	//вытаскиваем всех юзеров, у которых время активации года превысило один год
	function find_all_old_users()
	{
		//прибавляем к времени активации года 365 дней и сравниваем с нынешним временем
		//если нынешнее время больше, то меняем статус на неактивный
		$year = 31536000;
		$time_now = time();
		$query = $this->db->query("SELECT id FROM users WHERE (activate_time_year + {$year}) < {$time_now}");
		return $query->result_array();

	}

	//меняем статус у юзеров на неактивный, если у них время активации года прошло
	//т.е. надо делать пралангацию
	function update_activate_year($id)
	{
		$data = array('activate_year' => 0);
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

}