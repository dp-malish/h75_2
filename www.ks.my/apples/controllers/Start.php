<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller
{
	public function index()
	{
		//зедсь также читаем куку у пришедшего юзера
		//чтобы инициализировать к какому партнеру он относится.

		//Если не существует GET параметра или он пуст
		//мы проверяем наличие куки
		if (!isset($_GET['utxp']) || empty($_GET['utxp']))
		{
			if (!isset($_COOKIE['partner']))
			{	//проверяем наличие куки, если ее не существует, то мы пишем куку основателя системы
				$partner = 2;//id юзера в таблице users - это должен быть id создателя кассы
				$partner_id = $this->user_model->find_partner_id_for_new_user($partner);
					
				if ($partner_id !== FALSE)
				{	//если партнерский id найден, то кладем значение в сессию

					setcookie("partner", $partner_id, time() + (60*60*24*365));//плюсуем год жизни
				}
			}//иначе мы ничего не делаем, т.е. кука у нас существует
		}
		else
		{	//если существует get параметр и он не пустой, идем в БД и смотрим есть ли
			//такой партнерский id у нас
			$partner_id = $this->user_model->find_partner_id_in_users($_GET['utxp']); //передаем GET параметр
			if ($partner_id !== FALSE)
			{	//если партнерский id найден, то кладем значение в сессию

				setcookie("partner", $partner_id, time() + (60*60*24*365));//плюсуем год жизни
			}

		}		

		$data['title'] = "Добро пожаловать!";
		$this->load->view("template_pages/header_view", $data);
		$this->load->view("public_pages/index_view");
		$this->load->view("template_pages/footer_view");
	}

	public function login()
	{	
		if (isset($_SESSION['user_id'])) 
		{	//если у нас есть id в сессии делаем редирект в панель управления, чтобы чел не мог залогиниться снова
			redirect(base_url() . 'cabinet', 'location', 301);
		}

		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('login_mail', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('user_password', 'Пароль', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{	//Если у нас есть ошибки - передаем их через AJAX обратно
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_error' => 0, 'email' => form_error('login_mail'), 'pswd' => form_error('user_password'))));
		}//if
		else
		{	//иначе мы принимаем данные из формы и выполняем следующий код
			$login_mail = $this->input->post('login_mail');
			$login_pswd = $this->input->post('user_password');
			
			//ищем юзера по email'у в базе данных
			$login = $this->user_model->find_user_by_email($login_mail);

			if ($login)
			{	//если нашли такой email в базе, начинаем проверять забанен юзер иди нет, если нет,
				//то проверяем активирован ли аккаунт или нет
				//если аккаунт активирован - сверяем хеши паролей
				if ($login['zabanen'] == 1)
				{	//если аккаунт забанен, то просто отдаем сообщение, что юзер забанен.
					$this->output
						->set_content_type('application/json')
						->set_output(json_encode(array('st' => 2, 'msg' => 'Извините, Ваш аккаунт заблокирован<br />из-за нарушения пользовательского соглашения!<br/>Обратитесь в службу поддержки administrator@blagodaryu.biz')));
				}
				else
				{	//если не забанен, то выполняем проверку активации и потом совпадение паролей
					if ($login['activation_status'] == 1)
					{	//если аккаунт активирован, то сверяем хеши паролей
						$this->load->library('myencrypt');//Подгружаем нашу библиотеку шифрования

						// аккаунт активирован - проверяем хеши паролей
						if ($this->myencrypt->password_check($login_pswd, $login['password']))
						{
							$_SESSION['user_id'] = $login['id'];

							$this->output
						    	->set_content_type('application/json')
						    	->set_output(json_encode(array('st' => 1, 'msg' => 'Успешная авторизация!<br />Сейчас Вы будете перенаправлены в<br />личный кабинет!')));
						}
						else
						{
							// если пароли не совпадают
							$this->output
						    	->set_content_type('application/json')
						    	->set_output(json_encode(array('st' => 0, 'msg' => 'Email или пароль не подходят!')));
						}
					}//if ($login['activation_status'] == 1)
					else
					{
						// если аккаунт не активирован
							$this->output
						    	->set_content_type('application/json')
						    	->set_output(json_encode(array('st' => 0, 'msg' => 'Данный аккаунт не активирован!')));
					}
				}//else
					
			}//if ($login)
			else
			{	//если email не найден, выводим что типа логин или пароль не совпадают
				//Это чтобы не дать хакерам понять есть такой email или нет
				$this->output
				    ->set_content_type('application/json')
				    ->set_output(json_encode(array('st' => 0, 'msg' => 'Email или пароль не подходят!')));
			}

		}//else
	}

	//грузим только вид регистрации пользователя
	public function registration()
	{
		//если есть данные в сессии, т.е. юзер авторизован - редиректим его, чтобы по новой не зарегался
		if (isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект если данных в сессии нет
		}

		$data['title'] = "Регистрация";
		$this->load->view("template_pages/header_view", $data);
		$this->load->view("public_pages/register_view");
		$this->load->view("template_pages/footer_view");
	}

	//функция регистрации пользователя - используется в AJAX запросе
	public function registr()
	{	//при отправке формы, мы должны считать куку и вытащить данные спонсора, левый и правый ключи, а также уровень
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		
		$this->form_validation->set_rules('user_name', 'Имя','trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('last_name', 'Фамилия','trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('sex', 'Пол','required');
		$this->form_validation->set_rules('register_mail', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('phone_number', 'Номер телефона','trim|required');
		$this->form_validation->set_rules('skype', 'Skype','trim|max_length[70]');
		$this->form_validation->set_rules('advcash', 'Рублевый кошелек ADVCash','trim|required');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[8]|max_length[25]');

		if ($this->form_validation->run() == FALSE)
		{	//если у нас есть ошибки, возвращаем их пользователю и выводим
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st' => 0, 'message' => array(
			    							'user_name' => form_error('user_name'),
			    							'last_name' => form_error('last_name'),
			    							'sex' => form_error('sex'),
			    							'register_mail' => form_error('register_mail'),
			    							'phone_number' => form_error('phone_number'),
			    							'skype' => form_error('skype'),
			    							'advcash' => form_error('advcash'),
			    							'password' => form_error('password')
			    							))));
		}
		else
		{	//если у нас ошибок нет, то мы принимаем данные, читаем куку и вытаскиваем данные спонсора
			//т.е. левый ключ, правый ключ и его уровень

			//подгружаем библиотеку изменения регистра первой буквы - ucfirst не работает с кириллицей
			$this->load->library('ucfirst');

			$user_name = $this->ucfirst->mb_ucfirst($this->input->post('user_name'));
			$last_name = $this->ucfirst->mb_ucfirst($this->input->post('last_name'));
			$sex = $this->input->post('sex');
			$register_mail = $this->input->post('register_mail');
			$phone_number = $this->input->post('phone_number');
			$skype = $this->input->post('skype');
			$advcash = $this->input->post('advcash');
			$password = $this->input->post('password');

			$this->load->library('myencrypt'); //Подгружаем нашу библиотеку шифрования
			$password = $this->myencrypt->password_encrypt($password);//шифруем пароль

			//вытаскиваем данные спонсора, передаем партнерский id, который прочитали из куки
			$sponsor_data = $this->user_model->find_data_sponsor_in_register($_COOKIE['partner']);

			//подгоавливаем данные для вставки в БД, т.е. для регистрации нового юзера
			$new_user['partner_id'] = strtoupper(uniqid());
			$new_user['parent_id'] = $_COOKIE['partner'];//юзаем, если закрепляем юзера за первым пригласившим парнером
			//$new_user['parent_id'] = $_SESSION['partner_id_reg'];
			$new_user['left_key'] = $sponsor_data['right_key'];
			$new_user['right_key'] = $sponsor_data['right_key'] + 1;
			$new_user['level'] = $sponsor_data['level'] + 1;
			$new_user['provider'] = "my_form_landing";
			$new_user['name'] = $user_name;
			$new_user['last_name'] = $last_name;
			$new_user['email'] = $register_mail;
			$new_user['password'] = $password;
			$new_user['phone_number'] = $phone_number;
			if ($skype == "")
			{
				$new_user['skype'] = "none";
			}
			else
			{
				$new_user['skype'] = $skype;
			}
			$new_user['sex'] = $sex;
			$new_user['date_register'] = time();
			$new_user['avatar'] = "blago_system_avatar.jpg";
			$new_user['activation_code'] = md5(mt_rand().time());
			$new_user['activation_status'] = 1;
			$new_user['advcash_ru'] = $advcash;
			$new_user['activate_year'] = 0;
			$new_user['activate_time_year'] = 0;
			$new_user['earn_last_year'] = 0.00;
			$new_user['all_earn'] = 0.00;
			$new_user['zabanen'] = 0;

			//Запускаем транзакцию регистрации юзера в системе и возвращается нам id юзера
			$user_id = $this->user_model->register_new_user_now($new_user, $sponsor_data['right_key']);

			if ($user_id == FALSE)
			{	//если неудачная транзакция, т.е. вставить данные не получилось
				//отдаем сообщение, чтобы попробывали еще раз зарегаться
				$this->output
				    ->set_content_type('application/json')
				    ->set_output(json_encode(array('st' => 1, 'msg' => 'Извините, зарегистрироваться не удалось!<br />Попробуйте еще раз!')));
			}
			else
			{	//иначе, если все отлично, т.е. данные удачно вставлены, говорим юзеру, что
				//все хорошо и перекидываем его в панель управления

				//засовываем в сессию id юзера
				$_SESSION['user_id'] = $user_id;

				$this->output
				    ->set_content_type('application/json')
				    ->set_output(json_encode(array('st' => 2, 'msg' => 'Поздравляем!<br />' . $user_name . ' Вы успешно зарегистрированы!<br />Сейчас Вы будете перенаправлены в личный кабинет!')));
			}
		}
	}

	/*Используем при регистрации - проверяем email на правильность ввода*/
	public function check_email()
	{	//валидация email'а при регистрации юзера
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('register_mail', 'Email','trim|required|valid_email');

		if ($this->form_validation->run() === FALSE)
		{	//Если поле валидацию не прошло, то отдаем ошибку в ответ на запрос от jQuery

			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_email' => 0, 'email' => form_error('register_mail'))));
		}
		else
		{	//Если валидацию прошли, то запускаем скрипт поиска по базе, если такого e-mail'а нет, отдаем один ответ
			//если такой email найден, то отдаем другой ответ.
			$register_mail = $this->input->post('register_mail');
			$data['email'] = $this->user_model->check_email($register_mail);

			if ($data['email'] === FALSE)
			{	//если email найден в базе, то отдаем сообщение, что такой уже зареган
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_email' => 0, 'email' => 'Данный email уже зарегистрирован в системе!')));
			}
			else
			{	//иначе просто делаем голубым обводку у поля ввода email
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_email' => 1)));
			}
		}//else
		
	}//public function check_email()

	//используется при регистрации - проверяется длина пароля
	public function check_pswd()
	{	//проверяем корректность ввода пароля
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[8]|max_length[25]');
		
		if ($this->form_validation->run() === FALSE)
		{	//Если поле валидацию не прошло, то отдаем ошибку в ответ на запрос от jQuery
			
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_pswd' => 0, 'pswd' => form_error('password'))));
		}
		else
		{
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_pswd' => 1)));
		}

	}//public function check_pswd()

	//используется при регистрации - проверяется номер телефона на уникальность
	public function check_phone_number()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('phone_number', 'Номер телефона','trim|required');

		if ($this->form_validation->run() === FALSE)
		{	//Если поле валидацию не прошло, то отдаем ошибку в ответ на запрос от jQuery

			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_phone_number' => 0, 'phone_number' => form_error('phone_number'))));
		}
		else
		{	//Если валидацию прошли, то запускаем скрипт поиска по базе, если такого телефона нет, отдаем один ответ
			//если такой телефон найден, то отдаем другой ответ.
			$phone_number = $this->input->post('phone_number');
			$data['phone_number'] = $this->user_model->phone_number($phone_number);

			if ($data['phone_number'] === FALSE)
			{	//если телефон найден в базе, то отдаем сообщение, что такой уже зареган
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_phone_number' => 0, 'phone_number' => 'Данный номер телефона уже зарегистрирован в системе!')));
			}
			else
			{	//иначе просто делаем голубым обводку у поля ввода телефона
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_phone_number' => 1)));
			}
		}//else
	}

	//используется при регистрации - проверяется уникальность кошелька в advcash
	public function check_adv_cash()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('advcash', 'Кошелек ADVCash','trim|required|min_length[16]');

		if ($this->form_validation->run() === FALSE)
		{	//Если поле валидацию не прошло, то отдаем ошибку в ответ на запрос от jQuery

			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_advcash' => 0, 'advcash' => form_error('advcash'))));
		}
		else
		{	//Если валидацию прошли, то запускаем скрипт поиска по базе, если такого телефона нет, отдаем один ответ
			//если такой телефон найден, то отдаем другой ответ.
			$advcash = $this->input->post('advcash');
			$data['advcash'] = $this->user_model->advcash($advcash);

			if ($data['advcash'] === FALSE)
			{	//если телефон найден в базе, то отдаем сообщение, что такой уже зареган
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_advcash' => 0, 'advcash' => 'Данный кошелек уже зарегистрирован в системе!')));
			}
			else
			{	//иначе просто делаем голубым обводку у поля ввода телефона
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_advcash' => 1)));
			}
		}//else
	}

	//функция запроса ссылки на восстановление пароля
	public function recover_password()
	{
		//валидация email'а при регистрации юзера
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('email_for_recover', 'Email','trim|required|valid_email');

		if ($this->form_validation->run() === FALSE)
		{	//Если поле валидацию не прошло, то отдаем ошибку в ответ на запрос от jQuery

			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st_email' => 0, 'email' => form_error('email_for_recover'))));
		}
		else
		{	//Если валидацию прошли, то запускаем скрипт поиска по базе, если такого e-mail'а нет, отдаем один ответ
			//если такой email найден, то отдаем другой ответ.
			$recover_mail['user_email'] = $this->input->post('email_for_recover');
			$data['email'] = $this->user_model->check_email($recover_mail['user_email']);

			//мы повторно используем метод check_email
			if ($data['email'] === FALSE)
			{	//если email найден в базе, то делаем запись в БД и формируем письмо с инструкцией

				//формируем данные для записи в БД
				$recover_mail['live_time'] = time() + 600;//время жизни ссылки - 10 минут
				$recover_mail['hash'] = md5($recover_mail['user_email'] . $recover_mail['live_time']);

				//вставляем данные в БД
				$recover_pass = $this->user_model->recover_pass_step_1($recover_mail);
				
				if ($recover_pass == TRUE)//если запись в БД прошла успешно
				{
					//Отправляем сообщение юзеру с инструкцией
					$this->load->library('my_send_mail'); //Подгружаем нашу библиотеку отправки писем

					//Формируем активационное письмо
					$body  = file_get_contents('http://' . $_SERVER['HTTP_HOST'] . '/emails/recover_pass/index1.php');
					$body .= "<a href=\"http://" . $_SERVER['HTTP_HOST'] . "/start/recover?code=" . $recover_mail['hash'] . "\" style=\"color: #ffffff; padding: 20px 40px; text-decoration: none; background: #39a5e2; font-weight: bold;\" target=\"_blank\">Изменить пароль</a>";
					$body .= "<br /><br /><br />";
					$body .= "<p style=\"font-size: 12px;\">Если Вы не видете кнопку - то нажмите <a href=\"http://" . $_SERVER['HTTP_HOST'] . "/start/recover?code=" . $recover_mail['hash'] . "\" target=\"_blank\">здесь</a></p>";
					$body .= file_get_contents('http://' . $_SERVER['HTTP_HOST'] . '/emails/recover_pass/index2.php');

					//отправляем письмо
					$send_email = $this->my_send_mail->send($recover_mail['user_email'], 'Восстановление пароля', $body);
					
					if ($send_email == TRUE)
					{	//если сообщение отправлено, выводим это уведомление
						$this->output
				    		->set_content_type('application/json')
				    		->set_output(json_encode(array('st' => 1, 'msg' => "На Ваш почтовый ящик отправлено письмо с инструкцией!<br />Если его нет в \"Входящие\" загляните в папку \"СПАМ\".")));
					}
					else
					{	//если сообщение не отправлено, выводим это уведомление и пишем в БД логи об отправке

						$logs['type_send_email'] = 'recover_password'; //тип отправляемого письма
						$logs['date'] = time(); //время, когда попытались отправить это письмо
						$logs['user_email'] = $recover_mail['user_email']; //email юзера, на который должно было уйти письмо
						$this->fuck_off_ad_model->insert_logs_send_email($logs);//вставляем данные в таблицу

						$this->output
				    		->set_content_type('application/json')
				    		->set_output(json_encode(array('st' => 0, 'email' => 'К сожалению мы не смогли отправить Вам письмо!<br />Напишите пожалуйста сообщение в нашу поддержку administrator@blagodaryu.biz')));
					}
					
				}
				else
				{	//если запись в БД не удалась, отдаем сообщение об ошибке
					$this->output
				    ->set_content_type('application/json')
				    ->set_output(json_encode(array('st' => 0, 'email' => 'Что-то пошло не так, попробуйте еще раз!')));
				}
				

			}
			else
			{	//иначе отдаем ошибку, что юзера с таким email'ом не существует
				$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st' => 0, 'email' => 'Пользователя с таким email\'ом не существует!')));
			}
		}//else
	}

	//функция восстановления пароля - 2-й шаг - считываем GET параметр из URL и подгружаем вьюху
	//также при загрузке страницы мы делаем запрос в БД, чтобы проверить есть ли такой hash в БД
	public function recover()
	{	//если code не существует или $_GET возвращает false то делаем редирект
		if (!isset($_GET['code']) || !$_GET['code'])
		{
			redirect(base_url(), 'location', 301);
		}
		else
		{	//иначе проверяем существует ли хэш в таблице и не устарел ли он
			$data_row = $this->user_model->select_recover_hash($_GET['code']);
			$now_time = time(); //задаем нынешнее время, чтобы сравнить с временем в таблице

			if ($data_row == FALSE)
			{	//если данные не найдены, выводим сообщение с ошибкой
				$_SESSION['message'] = "К сожалению данная ссылка некорректна!<br />Пройдите процедуру восстановления пароля заново!";
				
				$data['title'] = "Восстановление пароля";
				$this->load->view("template_pages/header_view", $data);
				$this->load->view("public_pages/recover_view");
				$this->load->view("template_pages/footer_view");
			}
			elseif ($data_row['live_time'] - $now_time < 0)
			{	//если ссылка устарела, выводим сообщение
				$this->user_model->delete_old_hashs($now_time);//удаляем старые хеши, у которых время жизни вышло
				$_SESSION['message'] = "К сожалению время действия ссылки прошло!<br />Пройдите процедуру восстановления пароля заново!";
				
				$data['title'] = "Восстановление пароля";
				$this->load->view("template_pages/header_view", $data);
				$this->load->view("public_pages/recover_view");
				$this->load->view("template_pages/footer_view");
			}
			else
			{
				$data['title'] = "Восстановление пароля";
				$this->load->view("template_pages/header_view", $data);
				$this->load->view("public_pages/recover_view");
				$this->load->view("template_pages/footer_view");
			}
		}
	}

	//Функция изменения пароля, используемая в вьюхе recover_view
	public function update_pswd()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('new_password', 'Пароль', 'trim|required|min_length[8]|max_length[25]');

		if ($this->form_validation->run() === FALSE)
		{	//Если у нас есть ошибки - отдаем текст ошибок
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st' => 0, 'new_pswd' => form_error('new_password'))));
		}//if
		else
		{	//если ошибок нет, то сначала снова проверяем существует ли хеш в БД
			$hash = $this->input->post('hash');
			$data_row = $this->user_model->select_recover_hash($hash);
			$now_time = time(); //задаем нынешнее время, чтобы сравнить с временем в таблице

			if ($data_row == FALSE)
			{	//если хеш не найден в БД
				$this->output
			    	->set_content_type('application/json')
			    	->set_output(json_encode(array('st' => 1, 'msg' => 'К сожалению Ваша ссылка некорректна!<br />Рекомендуем Вам повторить процедуру восстановление пароля!')));
			}
			elseif ($data_row['live_time'] - $now_time < 0)
			{	//время вышло
				$this->user_model->delete_old_hashs($now_time);

				$this->output
			    	->set_content_type('application/json')
			    	->set_output(json_encode(array('st' => 2, 'msg' => 'К сожалению Ваша ссылка устарела!<br />Рекомендуем Вам повторить процедуру восстановление пароля!')));
			}
			else
			{	//Если хеш найден и время жизни не вышло, выполняем код
				$new_password = $this->input->post('new_password');

				$this->load->library('myencrypt'); //Подгружаем нашу библиотеку шифрования
				$pswd = $this->myencrypt->password_encrypt($new_password);

				$upd_pswd = $this->user_model->update_new_pswd_user($data_row['user_email'], $pswd);

				if ($upd_pswd == TRUE) {
					$this->output
			    		->set_content_type('application/json')
			    		->set_output(json_encode(array('st' => 3, 'msg' => 'Ваш пароль успешно сохранен!')));
				}
				else
				{
					$this->output
			    		->set_content_type('application/json')
			    		->set_output(json_encode(array('st' => 4, 'msg' => 'К сожалению нам не удалось изменить Ваш пароль!<br/>Попробуйте еще раз!')));
				}
			}//else
		}//else
	}//function update_pswd()

	//загружаем страницу - О системе
	public function about_system()
	{
		$data['title'] = "Система изнутри";
		$this->load->view("template_pages/header_view", $data);
		$this->load->view("public_pages/about_system_view");
		$this->load->view("template_pages/footer_view");
	}
	
	//загружаем страницу пользовательского соглашения
	public function user_agreement()
	{
		$data['title'] = "Пользовательское соглашение";
		$this->load->view("template_pages/header_view", $data);
		$this->load->view("public_pages/user_agreement_view");
		$this->load->view("template_pages/footer_view");
	}

	public function page_not_found()
		{
			$this->output->set_status_header('404');
			$data['title'] = "Страница не найдена";
			$this->load->view("template_pages/header_view", $data);
			$this->load->view('404_view');
			$this->load->view("template_pages/footer_view");
		}
}