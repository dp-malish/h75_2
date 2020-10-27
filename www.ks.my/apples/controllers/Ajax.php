<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	function index()
	{
		redirect(base_url() . "cabinet", 'location', 301);//делаем редирект
	}

	function edit_user_email()
	{	
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'email' => form_error('email')))));
		}
		else
		{	//если ошибок нет, мы ищем указанный email в системе
			$new_email_post = $this->input->post('email');
			//ищем юзера по email'у в базе данных
			$new_email = $this->user_model->check_email($new_email_post);
			if ($new_email == FALSE)
			{	//если нашли такой email, отдаем сообщение
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'email' => 'Такой email уже существует в системе!'))));
			}
			else
			{	//Иначе мы просто апдейтим email и отдаем сообщение
				$update = $this->user_model->update_email($_SESSION['user_id'], $new_email_post);
				if ($update == TRUE)
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'email' =>'Email успешно обновлен!'))));
				}
				else
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'email' =>'Email не обновлен!'))));
				}
			}
		}
	}

	function edit_phone_number()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('phone_number', 'Номер телефона','trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'phone_number' => form_error('phone_number')))));
		}
		else
		{	//если ошибок нет, мы ищем указанный phone_number в системе
			$new_phone_number_post = $this->input->post('phone_number');
			//ищем юзера по phone_number'у в базе данных
			$new_phone_number = $this->user_model->phone_number($new_phone_number_post);
			if ($new_phone_number == FALSE)
			{	//если нашли такой phone_number, отдаем сообщение
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'phone_number' => 'Такой номер телефона уже существует в системе!'))));
			}
			else
			{	//Иначе мы просто апдейтим phone_number и отдаем сообщение
				$update = $this->user_model->update_phone_number($_SESSION['user_id'], $new_phone_number_post);
				if ($update == TRUE)
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'phone_number' =>'Номер телефона успешно обновлен!'))));
				}
				else
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'phone_number' =>'Номер телефона не обновлен!'))));
				}
			}
		}
	}

	/*function edit_advcash()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('advcash', 'Кошелек ADVCash','trim|required|max_length[16]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'advcash' => form_error('advcash')))));
		}
		else
		{	//если ошибок нет, мы ищем указанный phone_number в системе
			$new_advcash_post = $this->input->post('advcash');
			//ищем юзера по phone_number'у в базе данных
			$new_advcash = $this->user_model->advcash($new_advcash_post);
			if ($new_advcash == FALSE)
			{	//если нашли такой phone_number, отдаем сообщение
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'advcash' => 'Такой кошелек уже существует в системе!'))));
			}
			else
			{	//Иначе мы просто апдейтим phone_number и отдаем сообщение
				$update = $this->user_model->update_advcash($_SESSION['user_id'], $new_advcash_post);
				if ($update == TRUE)
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'advcash' =>'Ваш кошелек успешно обновлен!'))));
				}
				else
				{
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'advcash' =>'Ваш кошелек не обновлен!'))));
				}
			}
		}
	}*/

	function edit_skype()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('skype', 'Skype','trim|max_length[70]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'skype' => form_error('skype')))));
		}
		else
		{	//если ошибок нет, мы ищем указанный phone_number в системе
			$new_skype_post = $this->input->post('skype');
			//мы просто апдейтим phone_number и отдаем сообщение
			$update = $this->user_model->update_skype($_SESSION['user_id'], $new_skype_post);
			if ($update == TRUE)
			{
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'skype' =>'Ваш skype успешно обновлен!'))));
			}
			else
			{
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'skype' =>'Ваш skype не обновлен!'))));
			}
		}
	}

	function edit_password()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('password', 'Пароль','trim|required|min_length[8]|max_length[25]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'password' => form_error('password')))));
		}
		else
		{	//если ошибок нет
			$new_password_post = $this->input->post('password');

			$this->load->library('myencrypt'); //Подгружаем нашу библиотеку шифрования
			$new_password_post = $this->myencrypt->password_encrypt($new_password_post);//шифруем пароль

			//мы просто апдейтим пароль и отдаем сообщение
			$update = $this->user_model->update_password($_SESSION['user_id'], $new_password_post);
			if ($update == TRUE)
			{
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'password' =>'Ваш пароль успешно обновлен!'))));
			}
			else
			{
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'password' =>'Ваш пароль не обновлен!'))));
			}
		}
	}

	function save_otziv()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('text_otziva', 'Текст отзыва','trim|required|max_length[3000]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем сообщение с ошибкой
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'text_otziva' => form_error('text_otziva')))));
		}
		else
		{	//если ошибок нет

			//вытаскиваем данные юзера отправляющего отзыв
			$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);
			//принимаем данные из формы, т.е. текст отзыва
			$text_otziva = $this->input->post('text_otziva');
			//подготавливаем массив данных, для вставки в таблицу отзывов
			$otziv = array(
				'user_id' => $data['user']['id'],
				'date' => time(),
				'user_name' => $data['user']['name'],
				'user_last_name' => $data['user']['last_name'],
				'avatar' => $data['user']['avatar'],
				'text_comment' => $text_otziva,
				'status' => 0
				);
			//Пишем в БД отзыв
			$insert_otziv = $this->user_model->insert_new_otziv($otziv);
			if ($insert_otziv == TRUE)
			{	//если отзыв вставлен успешно
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'text_otziva' =>'Ваш отзыв успешно отправлен на модерацию!<br />После чего он отобразиться у Вас в кабинете и на странице отзывов!'))));
			}
			else
			{	//если отзыв не удалось сохранить
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'text_otziva' =>'К сожалению отзыв отправить не удалось! Попробуйте еще раз!'))));
			}
		}
	}

	function update_otziv()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('text_otziva', 'Текст отзыва','trim|required|max_length[3000]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем сообщение с ошибкой
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'text_otziva' => form_error('text_otziva')))));
		}
		else
		{	//если ошибок нет
			//принимаем данные из формы, т.е. текст отзыва
			$text_otziva = $this->input->post('text_otziva');
			//обновляем в БД отзыв
			$update_text_otziva = $this->fuck_off_ad_model->update_text_testimonial($_GET['id'], $text_otziva);
			if ($update_text_otziva == TRUE)
			{	//если уведомление вставлен успешно
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'text_otziva' =>'Ваш отзыв успешно обновлен!'))));
			}
			else
			{	//если уведомление не удалось сохранить
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'text_otziva' =>'К сожалению отзыв обновить не удалось! Попробуйте еще раз!'))));
			}
		}
	}


	//сохраняем новое уведомление - используется в главной админке!
	function save_new_notification()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('text_notification', 'Текст уведомления','trim|required|max_length[500]');
		
		if ($this->form_validation->run() == FALSE)
		{
			//отдаем сообщение с ошибкой
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('st' => 0, 'msg' => array(
																	'text_notification' => form_error('text_notification')))));
		}
		else
		{	//если ошибок нет

			//вытаскиваем данные админа отправляющего уведомление
			$data['admin'] = $this->fuck_off_ad_model->get_admin_data($_SESSION['admin_id']);
			//принимаем данные из формы, т.е. текст уведомление
			$text_notification = $this->input->post('text_notification');
			//подготавливаем массив данных, для вставки в таблицу отзывов
			$notification = array(
				'admin_id' => $data['admin']['id'],
				'admin_name' => $data['admin']['admin_name'],
				'date' => time(),
				'message' => $text_notification,
				'status_message' => 'close'
				);
			//Пишем в БД уведомление
			$insert_otziv = $this->fuck_off_ad_model->save_new_notification($notification);
			if ($insert_otziv == TRUE)
			{	//если уведомление вставлен успешно
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 1, 'msg' => array(
																		'text_notification' =>'Ваше уведомление успешно сохранено!'))));
			}
			else
			{	//если уведомление не удалось сохранить
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('st' => 0, 'msg' => array(
																		'text_notification' =>'К сожалению уведомление отправить не удалось! Попробуйте еще раз!'))));
			}
		}
	}

}