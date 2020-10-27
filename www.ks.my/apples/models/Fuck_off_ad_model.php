<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuck_off_ad_model extends CI_Model
{

	function insert_logs_send_email($data)
	{	// вставляем данные об ошибке отправки email'ов - используется в контроллере Start.php
		$this->db->insert('logs_send_email', $data);
	}

	function find_admin_by_email($admin_email)
	{
		$this->db->where('admin_email', $admin_email);
		$this->db->limit(1);
        $query = $this->db->get('admin_users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем partner_id
            return $query->row_array();
        }
        else
        {//иначе возвращаем FALSE - т.е. такого партнерского id нет в БД
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	function get_admin_data($admin_id)
	{
		$this->db->where('id', $admin_id);
		$query = $this->db->get('admin_users');
		return $query->row_array();

		$query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//считаем общее количество участников в системе
	function count_all_partners()
	{
		$this->db->from('users');
		$all_partners = $this->db->count_all_results();

		$this->db->where('activate_year', 1);
		$this->db->from('users');
		$active_partners = $this->db->count_all_results();

		return $result = array(
			'all_partners' => $all_partners,
			'active_partners' => $active_partners
			);
	}

	//Сохраняем новое системное уведомление
	function save_new_notification($data)
	{
		if($this->db->insert('system_messages', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//Считаем общее количество системных уведомлений
	function count_notifications()
	{
		$this->db->from('system_messages');
		$result = $this->db->count_all_results();
		return $result;
	}

	function get_all_notifications($num, $offset)
	{
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get('system_messages', $num, $offset);
		return $query->result_array();
	}

	//изменяем статус системного уведомления - вкл, выкл.
	function edit_status_notification($id, $status)
	{
		$data = array('status_message' => $status);
		$this->db->where('id', $id);
		$update = $this->db->update('system_messages', $data);
		if ($update == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//Работаем с отзывами о системе!

	//Считаем общее количество системных уведомлений
	function count_testimonials()
	{
		$this->db->where('status', 0);
		$this->db->or_where('status', 1);
		$this->db->from('comments');
		$result = $this->db->count_all_results();
		return $result;
	}

	//вытаскиваем все отзывы о системе
	function get_all_testimonials($num, $offset)
	{	
		$this->db->where('status', 0);
		$this->db->or_where('status', 1);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get('comments', $num, $offset);
		return $query->result_array();
	}

	//изменяем текст отзыва, если он не понравился модеру
	function update_text_testimonial($id, $text)
	{
		$data = array('text_comment' => $text);
		$this->db->where('id', $id);
		$update = $this->db->update('comments', $data);
		if ($update == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//Изменяем статус отзыва
	function edit_status_otziva($id, $status)
	{
		$data = array('status' => $status);
		$this->db->where('id', $id);
		$update = $this->db->update('comments', $data);
		if ($update == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//изменяем комментарий модератора
	function edit_comment_modera($id, $comment_modera)
	{
		$data = array('primechanie_modera' => $comment_modera);
		$this->db->where('id', $id);
		$update = $this->db->update('comments', $data);
		if ($update == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}