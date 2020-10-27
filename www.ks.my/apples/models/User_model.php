<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	//Функция регистрации пользователя
	function register_new_user_now($data, $right_key)
	{
		$this->db->trans_start();//начало транзакции

		//Обновляем ключи существующего дерева, узлы стоящие за родительским узлом
		//а так же, обновляем родительскую ветку
		$this->db->query("UPDATE users SET right_key = right_key + 2, left_key = IF(left_key > {$right_key}, left_key + 2, left_key) WHERE right_key >= {$right_key}");
		
		//добавляем новый узел, т.е. нового пользователя
		$this->db->insert('users', $data);
		$user_id = $this->db->insert_id();

		$this->db->trans_complete();//конец транзакции

		if ($this->db->trans_status() === FALSE)
		{
		    return FALSE;
		}
		else
		{
			return $user_id;
		}
	}

	//используем при регистрации и восстановлении пароля - проверяем существует ли мыло в БД
	function check_email($email)
	{//Ищем email в базе, когда делаем ajax запрос при регистрации и при восстановлении пароля!
		$this->db->where('email', $email);
		$this->db->select('email');
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем FALSE, значит email уже существует в базе
            return FALSE;
        }
        else
        {//иначе возвращаем TRUE - т.е. email отсутствует в базе
            return TRUE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//используем при регистрации - проверяем существует ли номер телефона в базе
	function phone_number($phone_number)
	{
		$this->db->where('phone_number', $phone_number);
		$this->db->select('phone_number');
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем FALSE, значит телефон уже существует в базе
            return FALSE;
        }
        else
        {//иначе возвращаем TRUE - т.е. телефон отсутствует в базе
            return TRUE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//используем при регистрации - проверяем сузествует ли такой кошелек в базе
	function advcash($advcash)
	{
		$this->db->where('advcash_ru', $advcash);
		$this->db->select('advcash_ru');
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем FALSE, значит кошелек уже существует в базе
            return FALSE;
        }
        else
        {//иначе возвращаем TRUE - т.е. кошелек отсутствует в базе
            return TRUE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//проверяем существование партнерского id в таблице юзеров
	function find_partner_id_in_users($partner_id)
	{
		$this->db->where('partner_id', $partner_id);
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем partner_id
            return $query->row()->partner_id;
        }
        else
        {//иначе возвращаем FALSE - т.е. такого партнерского id нет в БД
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//вытаскиваем данные одного из нас, т.е. мы это используем, когда у юзера нет куки
	//а также когда GET параметр пустой, т.е. юзер зашел по прямой ссылке
	//и мы рандомно выбираем среди нас спонсора для нового юзера
	function find_partner_id_for_new_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем partner_id
            return $query->row()->partner_id;
        }
        else
        {//иначе возвращаем FALSE - т.е. такого партнерского id нет в БД
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//вытаскиваем данные спонсора, который пригласил юзера в систему
	function find_data_sponsor_in_register($partner_id)
	{
		$this->db->where('partner_id', $partner_id);
		$this->db->limit(1);
		$query = $this->db->get('users');

		return $user_data = array(
						'right_key' => $query->row()->right_key,
						'level' => $query->row()->level
							);
	}

	//ищем юзера по email - использется при авторизации
	function find_user_by_email($email)
	{
		$this->db->where('email', $email);
		$this->db->limit(1);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {//если нам вернулось какое-то значение, то возвращаем строку значений юзера
            return $query->row_array();
        }
        else
        {//иначе возвращаем FALSE - т.е. пользователя нет в базе
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Вытаскиваем данные юзера
	function get_user_data($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row_array();

		$query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Вытаскиваем данные пригласившего человека в систему юзера.
	//передаем id пригласившего из ячейки ref1, чтобы отобразить в правом сайдбаре
	//где у нас написано - Ваш информационный наставник
	function find_sponsor_data($parent_id)
	{
		$this->db->where('partner_id', $parent_id);
		$query = $this->db->get('users');
		return $query->row_array();

		$query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//Запускаем функцию, чтобы подсчитать общее количество человек в команде у юзера
	//а также активных и не активных
	function count_all_users_in_command($left_key_parent, $right_key_parent, $level_parent)
	{
		//Сколько юзеров в команде
		$this->db->where('left_key >', $left_key_parent);
		$this->db->where('right_key <', $right_key_parent);
		$this->db->where('level <=', $level_parent);
		$this->db->from('users');
		$all_users_in_command = $this->db->count_all_results();

		//Сколько активных юзеров в команде
		$this->db->where('left_key >', $left_key_parent);
		$this->db->where('right_key <', $right_key_parent);
		$this->db->where('level <=', $level_parent);
		$this->db->where('activate_year', 1);
		$this->db->from('users');
		$active_users_in_command = $this->db->count_all_results();

		return $users_in_structure = array(
									'all_partners' => $all_users_in_command,
									'active_partners' => $active_users_in_command
										);
	}

	//Вытаскиваем всех нижестоящих пользователей у юзера, при этом передавая уровень с какого нужно их вытащить.
	//используется в ajax запросе
	function find_child_in_structure($left_key_parent, $right_key_parent, $level_parent)
	{
		$this->db->where('left_key >=', $left_key_parent);
		$this->db->where('right_key <=', $right_key_parent);
		$this->db->where('level', $level_parent);
		$query = $this->db->get('users');
		return $query->result_array();

		$query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//данный запрос используем при запросе восстановления пароля
	//первый шаг юзер заполнил поле и нажал кнопку восстановить пароль
	function recover_pass_step_1($data)
	{
		$this->db->insert('recover_pass_user', $data);
		return TRUE;
	}

	//Второй шаг, человек перешел по сгенерированной ссылке и мы делаем выборку всех данных при
	//где втречается данный хеш
	function select_recover_hash($hash)
	{
		$this->db->where('hash', $hash);
		$this->db->limit(1);
		$query = $this->db->get('recover_pass_user');

		if($query->num_rows() > 0)
        {//если нам вернулось како-то значение, то возвращаем строку значений
            return $query->row_array();
        }
        else
        {//иначе возвращаем FALSE - т.е. хеша в таблице нет
            return FALSE;
        }
        $query->free_result(); // Отпускаем данные после запроса для освобождения ресурсов
	}

	//во время проверки существования хеша при аполнении поля пароля
	//удаляем старые несуществующие хеши
	//передаем хеш и еще нынешнее время
	function delete_old_hashs($date)
	{
		$this->db->simple_query("DELETE FROM recover_pass_user WHERE live_time < $date");
	}

	//третий шаг - мы записываем хэш нового пароля к юзеру, который запросил данное действие
	function update_new_pswd_user($mail, $pass)
	{
		$data = array('password' => $pass);

		$this->db->where('email', $mail);
		$this->db->update('users', $data);
		return TRUE;
	}

	//используем эту функцию при изменении аватарки - сейчас вытаскиваем старый аватар юзера
	function find_old_avatar_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->limit(1);
		$query = $this->db->get('users');

		return $query->row()->avatar;
	}

	//обновляем аватарку у юзера, т.е. пишем данные в БД
	function update_user_avatar($user_id, $avatar)
	{
		$data = array('avatar' => $avatar);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
	}

	//функция обновления email'а у юзера
	function update_email($user_id, $new_email)
	{
		$data = array('email' => $new_email);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		return TRUE;
	}

	//апдейтим номер телефона в профиле
	function update_phone_number($user_id, $new_phone_number)
	{
		$data = array('phone_number' => $new_phone_number);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		return TRUE;
	}

	//апдейтим кошелек
	function update_advcash($user_id, $advcash)
	{
		$data = array('advcash_ru' => $advcash);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		return TRUE;
	}

	//апдейтим скайп
	function update_skype($user_id, $skype)
	{
		$data = array('skype' => $skype);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		return TRUE;
	}

	//апдейтим пароль
	function update_password($user_id, $password)
	{
		$data = array('password' => $password);

		$this->db->where('id', $user_id);
		$this->db->update('users', $data);

		return TRUE;
	}

	//Записываем новый отзыв о системе
	function insert_new_otziv($data)
	{
		if($this->db->insert('comments', $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	//вытаскиваем отзыв юзера, если он конечно же существует, юзаем это в личном кабинете
	function find_user_otziv($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->limit(1);
        $query = $this->db->get('comments');
		return $query->row_array();
	}

	//вытаскиваем одобренные отзывы и отображаем на главной странице отзывов - внешняя страница


	//ищем системные уведомления , если есть, выводим.
	function find_system_notifications()
	{
		$this->db->where('status_message', 'open');
		$this->db->limit(1);
        $query = $this->db->get('system_messages');
		return $query->row_array();
	}
}