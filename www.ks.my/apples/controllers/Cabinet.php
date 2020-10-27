<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//подгружаем хэлпер преобразования BB-кодов в html
		//грузим именно здесь, т.к. он нам нужен для уведомлялок на всех страницах
		$this->load->helper('bbcode_replace');
	}

	public function index()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}
		
		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//Вытаскиваем данные спонсора и засовываем в сессию, т.к. они не изменны
		$_SESSION['sponsor_data'] = $this->user_model->find_sponsor_data($data['user']['parent_id'] );

		//Считаем общую сумму выплат партнеру за последние 24 часа
		$data['summa_all_partner_payments'] = $this->payments_model->summa_all_partner_payments($_SESSION['user_id']);

		//Получаем общее количество выплат партнеру
		$data['all_count_partner_payments'] = $this->payments_model->count_all_last_24_hour_output_payments($_SESSION['user_id']);

		//Вытаскиваем 5 последних выплат за последние 24 часа
		$data['last_24_hour_output_payments'] = $this->payments_model->find_all_last_24_hour_output_payments($_SESSION['user_id'], 5);//передаем id юзера

		//вытаскиваем общее количество партнеров у юзера - используем ограничение в 7 уровней
		//плюсуем 7 уровней к исходному уровню самого партнера
		$data['count_partners_in_structure'] = $this->user_model->count_all_users_in_command($data['user']['left_key'], $data['user']['right_key'], $data['user']['level'] + 7);

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}
		
		$data['title'] = "Личный кабинет";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/index_view');
		$this->load->view('template_cabinet/footer_view');
	}

	//метод оплаты - первый шаг - формируем цифровую подпись и подставляем сумму платежа
	function pay()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект если данных в сессии нет
		}

		//сумма для оказания помощи - 2000р.
		//если будете здесь менять сумму, ниже по коду меняйте также суммы распределения по уровням!
		$help_summ = 2000;

		//Вытаскиваем данные пользователя
		$user_data = $this->user_model->get_user_data($_SESSION['user_id']);

		//ищем неоказанную помощь юзера, чтобы не создавать в момент оказания помощи новую запись в БД
		$find_not_payment_helps = $this->payments_model->find_not_payment_helps($_SESSION['user_id'], $help_summ, 0);

		//если вернулись данные, то апдейтим время оказания помощи и засовываем в переменные данные из таблицы
		//и затем передаем их в вид в форму оказания помощи
		if ($find_not_payment_helps != FALSE)
		{
			$this->payments_model->update_time_help($find_not_payment_helps['id'], time());

			$Inv_id = $find_not_payment_helps['id'];
		}
		else
		{	//иначе просто делаем новую запись в БД и передаем данные в вид в форму оказания помощи
			$data_insert = array(
						'user_id' => $_SESSION['user_id'],
						'summa' => $help_summ,
						'payment_date' => time(),						
						'status' => 0
						);
			//здесь мы пишем данные в БД и также возвращаем в переменную Inv_id id последней записи
			$Inv_id = $this->payments_model->payment_step_1($data_insert);
		}

		//формируем цифровую подпись
		$word_sec = "3B1nUpQ0h8ficus";//этот пароль указан в настройках SCI магазина
		//email в системе, на который оформлен магазин
		$ac_account_name = "maksduvisabina@gmail.com";
		//название SCI магазина в аккаунте
		$ac_sci_name = "ficus_home";

		//алгоритм формирования записи
		//ac_account_name:ac_sci_name:ac_amount:ac_currency:secret_password:ac_order_id
		$hash = hash("sha256", $ac_account_name . ":" . $ac_sci_name . ":" . $help_summ . ":RUB:" . $word_sec . ":" . $Inv_id);
		
		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$system_messages = "close";
		}
		else
		{
			$system_messages = $system_messages;
		}

		//формируем массив данных, который передаем в вьюху
		$data = array(
			'title' => "Оказание помощи",
			'user' => $user_data,
			'system_notifications' => $system_messages,
			'ac_account_name' => $ac_account_name,
			'ac_sci_name' => $ac_sci_name,
			'help_summ' => $help_summ,
			'help_id' => $Inv_id,
			'ac_sign' => $hash
			);

		//здесь собственная шапка, т.к. автоматическая отправка формы происходит
		$this->load->view('cabinet_pages/pay_view', $data);
		$this->load->view('template_cabinet/footer_view');
	}
	
	//страница result - на нее платежка передает данные фоново - status_heratus()
	function status_heratus()
	{
		//Платежный пароль, который используется при содании хэша
		$password_sec = "3B1nUpQ0h8ficus";//этот пароль указан в настройках SCI магазина

		//Кошельки участвующие в распределении
		$raspred = "R461101544411";//главный кошель, он распределяет средства - запись в виде R000000000000
		$lk_wallet = "";//кошелек основателя системы - в виде R000000000000

		$site_name = $_SERVER['HTTP_HOST'];

		//подгружаем нашу либу ADVCash
		$this->load->library('send_partner_helps');

		//принимаем данные от ADVCash
		$ac_transfer = $this->input->post('ac_transfer');
		$ac_start_date = $this->input->post('ac_start_date');
		$ac_sci_name = $this->input->post('ac_sci_name');
		$ac_src_wallet = $this->input->post('ac_src_wallet');
		$ac_dest_wallet = $this->input->post('ac_dest_wallet');
		$ac_order_id = $this->input->post('ac_order_id');
		$ac_amount = $this->input->post('ac_amount');
		$ac_merchant_currency = $this->input->post('ac_merchant_currency');
		$ac_hash = $this->input->post('ac_hash');

		if (!isset($ac_transfer) || !isset($ac_start_date))
		{	//если параметров нет, то делаем редирект - для защиты от набора из адресной строки
			redirect(base_url() . 'cabinet', 'location', 301);			
		}
		else
		{
			//делаем хэш для сравнения с тем хэшем, что пришел из формы
			//ac_transfer:ac_start_date:ac_sci_name:ac_src_wallet:ac_dest_wallet:ac_order_id:ac_amount:ac_merchant_currency:SCI password.
			$hash = hash("sha256", $ac_transfer . ":" . $ac_start_date . ":" . $ac_sci_name . ":" . $ac_src_wallet . ":" . $ac_dest_wallet . ":" . $ac_order_id . ":" . $ac_amount . ":" . $ac_merchant_currency . ":" . $password_sec);
			
			//если у нас хэши совпадают, то выполняем код
			if ($hash == $ac_hash)
			{
				//1.обновляем время оказания помощи и статус
				//2.Вытаскиваем id юзера
				//3.Обновляем статус активации года, а также время активации года у юзера
					//и еще сбрасываем годовой заработок на ноль
				//4.Вытаскиваем все данные юзера и засовываем в переменную
				$user_data = $this->payments_model->payment_step_2($ac_order_id);
				
				if ($user_data != FALSE)
				{	//если данные юзера оказывающего помощь успешно обновлены, выполняем код
					//загружаем библиотеку от Advanced Cash

					//Вытаскиваем данные вышестоящего партнера, который пригласил юзера, который сейчас делает оплату
					$data_partner_700 = $this->payments_model->output_payment_step_1($user_data['parent_id']);//сюда мы передаем parent_id, т.е. id того партнера, который пригласил юзера в систему
					
					if ($data_partner_700['activate_year'] == 0 || $data_partner_700['zabanen'] == 1 || $data_partner_700['partner_id'] == "FAsd8652RsTG")
					{	//если у партнера не активен год, либо он забанен, либо у него вообще партнерский id равен главному
						//мы выполняем выплату оргу системы
						$summa = 700;
						
						//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над неактивным партнером
						$data_partner_150 = $this->payments_model->output_payment_step_2_raspredelenie($data_partner_700['parent_id'], $summa, $user_data['name'], $user_data['last_name']);
						
						$this->send_partner_helps->payment_active_partner($raspred, $lk_wallet, $summa, $user_data['name'], $user_data['last_name'], $site_name);
						
					}
					else
					{	//Если партнер активен и не забанен, мы выплачиваем ему материальную помощь от юзера
						$summa = 700;
						//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над этим партнером
						$data_partner_150 = $this->payments_model->output_payment_step_2($data_partner_700['id'], $data_partner_700['parent_id'], $summa, $user_data['name'], $user_data['last_name']);

						$user_koshelek = strtoupper(str_replace(" ", "", $data_partner_700['advcash_ru']));//чтобы не пладить файлы, размещаем кошелек в переменную
						
						$this->send_partner_helps->payment_active_partner($raspred, $user_koshelek, $summa, $user_data['name'], $user_data['last_name'], $site_name);			

					}


					//запускаем цикл и выплачиваем партнерам с 2-го по 6-й уровень по 150р.
					//в цикле проверяем активность партнера
					
					for ($i = 0; $i < 5; $i++)
					{	//Сюда уже приходит переменная $data_partner_150 с данными
						//проверяем активность партнера
						
						if ($data_partner_150['activate_year'] == 0 || $data_partner_150['zabanen'] == 1 || $data_partner_150['partner_id'] == "FAsd8652RsTG")
						{
							$summa = 150;

							//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над неактивным партнером
							$data_partner_150 = $this->payments_model->output_payment_step_2_raspredelenie($data_partner_150['parent_id'], $summa, $user_data['name'], $user_data['last_name']);
							
							$this->send_partner_helps->payment_active_partner($raspred, $lk_wallet, $summa, $user_data['name'], $user_data['last_name'], $site_name);
							
						}
						else
						{
							$summa = 150;
							
							$user_koshelek = strtoupper(str_replace(" ", "", $data_partner_150['advcash_ru']));//чтобы не пладить файлы, размещаем кошелек в переменную

							//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над этим партнером
							$data_partner_150 = $this->payments_model->output_payment_step_2($data_partner_150['id'], $data_partner_150['parent_id'], $summa, $user_data['name'], $user_data['last_name']);
							
							$this->send_partner_helps->payment_active_partner($raspred, $user_koshelek, $summa, $user_data['name'], $user_data['last_name'], $site_name);

						}
					}//for

					//Выплачиваем 250р. человеку на 7-м уровне
					if ($data_partner_150['activate_year'] == 0 || $data_partner_150['zabanen'] == 1 || $data_partner_150['partner_id'] == "FAsd8652RsTG")
					{
						$summa = 250;
						//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над неактивным партнером
						$data_partner_250 = $this->payments_model->output_payment_step_2_raspredelenie($data_partner_150['parent_id'], $summa, $user_data['name'], $user_data['last_name']);
						
						$this->send_partner_helps->payment_active_partner($raspred, $lk_wallet, $summa, $user_data['name'], $user_data['last_name'], $site_name);
						
					}
					else
					{
						$summa = 250;
											
						$user_koshelek = strtoupper(str_replace(" ", "", $data_partner_150['advcash_ru']));//чтобы не пладить файлы, размещаем кошелек в переменную

						//дергаем функцию начисления средств в нашей системе и нам возвращаются данные вышестоящего партнера над этим партнером
						$data_partner_250 = $this->payments_model->output_payment_step_2($data_partner_150['id'], $data_partner_150['parent_id'], $summa, $user_data['name'], $user_data['last_name']);

						$this->send_partner_helps->payment_active_partner($raspred, $user_koshelek, $summa, $user_data['name'], $user_data['last_name'], $site_name);
					}

					//Наконец-то выплачиваем 300р.
					$summa = 300;
					$this->payments_model->output_payment_step_2_raspredelenie_300($summa, $user_data['name'], $user_data['last_name']);
					
					$this->send_partner_helps->payment_active_partner($raspred, $lk_wallet, $summa, $user_data['name'], $user_data['last_name'], $site_name);

				}
				else
				{	//если не удалось обновить данные пользователя, оказывающего помощь
					$this->load->library('my_send_mail'); //Подгружаем нашу библиотеку отправки писем

					$body = "Не смогли выполнить обновление данных у юзера с id - " . $user_data['id'] . "<br />";
					$body .= "А так же не выполнили начисление вышестоящим партнерам!<br />";
					$body .= "У пригласившего данного юзера партнерский ID - " . $user_data['parent_id'];

					$this->my_send_mail->send("makaduxisabina@gmail.com", 'Обновление данных юзера не выполнено', $body);
				}

			}
			else
			{	//иначе, если хэши не совпадают, отправляем уведомление на почту!
				$data = array(
					'transaction_number' => $ac_transfer,
					'advcash_ru' => $ac_src_wallet,
					'payment_date' => time(),
					'type_transacrion' => "income",//приходящая транзакция(т.е. оказание помощи - по другому - оплата)
					'good_or_bad_transaction' => "bad"
					);
				$this->payments_model->transactions($data);


				$this->load->library('my_send_mail'); //Подгружаем нашу библиотеку отправки писем

				$body = "Номер транзакции в платежке - " . $ac_transfer . "<br />";
				$body .= "ID операции в системе - " . $ac_order_id . "<br />";
				$body .= "Дата операции - " . $ac_start_date . "<br />";
				$body .= "Номер кошелька кто оказал помощь - " . $ac_src_wallet . "<br />";

				$this->my_send_mail->send("makaduxisabina@gmail.com", 'Юзер не смог оказать помощь - хэши не совпали', $body);
			}

		}

	}

	//Страница успешной оплаты
	function success()
	{	
		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//засовываем принимаемые данные в переменные
		$data['ac_src_wallet'] = $this->input->post('ac_src_wallet');//с какого кошелька оплатили
		$data['ac_buyer_amount_without_commission'] = $this->input->post('ac_buyer_amount_without_commission');//сколько покупатель заплатил
		$data['ac_order_id'] = $this->input->post('ac_order_id');//номер оказанной помощи в системе

		//делаем проверку есть ли у нас в массиве пост данные, если нет, то редиректим
		if (!isset($data['ac_src_wallet']) || !isset($data['ac_buyer_amount_without_commission']) || !isset($data['ac_order_id']))
		{
			redirect(base_url() . 'cabinet', 'location', 301);
		}

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Успешное оказание помощи";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/success_view');
		$this->load->view('template_cabinet/footer_view');

	}

	//страница, что транзакция провалилась
	function fail()
	{
		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//засовываем принимаемые данные в переменные
		$data['ac_order_id'] = $this->input->post('ac_order_id');//номер оказанной помощи в системе

		//делаем проверку есть ли у нас в массиве пост данные, если нет, то редиректим
		if (!isset($data['ac_order_id']))
		{
			redirect(base_url() . 'cabinet', 'location', 301);
		}

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Оказать помощь не удалось";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/fail_view');
		$this->load->view('template_cabinet/footer_view');
	}

	function i_helped()
	{	//Страница - Оказанная помощь

		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		$this->load->library('pagination'); //Подключаем пагинацию

		$config['base_url'] = base_url() . 'cabinet/i_helped';
		$config['total_rows'] = $this->payments_model->count_all_i_helped($_SESSION['user_id']); //передаем id юзера
		$config['per_page'] = 10;
		$config['num_links'] = 5;

		$config['full_tag_open'] = "<div class=\"show_elements navigation_projects\">";
		$config['full_tag_close'] = "</div>";

		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;

		$config['first_link'] = "<i class=\"fa fa-arrow-left\"></i> начало";
		$config['first_tag_open'] = "<div class=\"first_link\">";
		$config['first_tag_close'] = "</div>";

		$config['last_link'] = "конец <i class=\"fa fa-arrow-right\"></i>";
		$config['last_tag_open'] = "<div class=\"last_link\">";
		$config['last_tag_close'] = "</div>";

		$config['cur_tag_open'] = "<div class=\"cur_link\">";
		$config['cur_tag_close'] = "</div>";

		$this->pagination->initialize($config);

		//сюда мы должны передавать id юзера, чтобы понять какие платежки вытаскивать
		$data['i_helped'] = $this->payments_model->find_all_i_helped($_SESSION['user_id'], $config['per_page'], $this->uri->segment(3));//передаем id юзера

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Оказанная помощь";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/i_helped_view');
		$this->load->view('template_cabinet/footer_view');
	}

	function profile()
	{	
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		if (isset($_POST["upload_avatar"]))
		{
			$old_avatar_user = $this->user_model->find_old_avatar_user($_SESSION['user_id']);

			//формируем конфигурацию для принятия файла
			$config['upload_path'] = './users_avatars/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '300';
			$config['max_width'] = '600';
			$config['max_height'] = '600';
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);//подгружаем библиотеку загрузки файла

			if ($this->upload->do_upload())
			{	//если все загружено, то пишем данные в бд, удаляем старый файл и отдаем положительное сообщение

				//возвращаем данные загруженного файла
				$new_avatar_data = $this->upload->data();

				$this->user_model->update_user_avatar($_SESSION['user_id'], $new_avatar_data['file_name']);

				if ($old_avatar_user != "blago_system_avatar.jpg")
				{	//если название аватарки не равно значению по умолчанию, т.е. avatar.jpg
					//то мы удаляем старую аватарку из папки, иначе ничего не делаем
					$filename = "./users_avatars/" . $old_avatar_user;
					if (file_exists($filename)) {unlink("./users_avatars/" . $old_avatar_user);}
				}

				$_SESSION['message'] = "Файл успешно загружен!";
				redirect(base_url() . "cabinet/profile", 'location', 301);//делаем редирект
			}
			else
			{	//иначе, если не смогли загрузить файл, просто отдаем сообщение о неудаче
				$_SESSION['message'] = "К сожадению загрузить файл не удалось!";
				redirect(base_url() . "cabinet/profile", 'location', 301);//делаем редирект
			}
		}
		else
		{
			//вытаскиваем данные системных уведомлений
			$system_messages = $this->user_model->find_system_notifications();
			if ($system_messages == FALSE)
			{	//если системных уведомлений нет
				$data['system_notifications']['status_message'] = "close";
			}
			else
			{
				$data['system_notifications'] = $system_messages;
			}

			$data['title'] = "Мой профиль";
			$this->load->view('template_cabinet/header_view', $data);
			$this->load->view('cabinet_pages/profile_view');
			$this->load->view('template_cabinet/footer_view');
		}
	}



	/*function promo()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Промо материалы";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/promo_view');
		$this->load->view('template_cabinet/footer_view');
	}

	function rules()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		$data['title'] = "Правила";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/rules_view');
		$this->load->view('template_cabinet/footer_view');
	}*/

	function faq()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Часто задаваемые вопросы";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/faq_view');
		$this->load->view('template_cabinet/footer_view');
	}

	function otziv()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['user_id']))
		{
			redirect(base_url(), 'location', 301);//делаем редирект
		}

		//Вытаскиваем данные пользователя
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		$data_otziv = $this->user_model->find_user_otziv($_SESSION['user_id']);

		if ($data_otziv == FALSE)
		{	//если отзыва не существует, выводим форму
			$data['otziv'] = "none";
		}
		else
		{	//иначе передаем данные в вьюху
			$data['otziv'] = $data_otziv;
		}

		//вытаскиваем данные системных уведомлений
		$system_messages = $this->user_model->find_system_notifications();
		if ($system_messages == FALSE)
		{	//если системных уведомлений нет
			$data['system_notifications']['status_message'] = "close";
		}
		else
		{
			$data['system_notifications'] = $system_messages;
		}

		$data['title'] = "Новый отзыв о системе";
		$this->load->view('template_cabinet/header_view', $data);
		$this->load->view('cabinet_pages/otziv_view');
		$this->load->view('template_cabinet/footer_view');
	}


	function logout()
	{ //метод выхода
		$_SESSION = array();//задаем пустой массив сессии, чтобы удалить все данные
		if (isset($_COOKIE[session_name()]))//проверяем - есть ли кука относящаяся к этой сессии в браузере
		{
			setcookie(session_name(), '', time() - 42000, '/'); //удаляем куку с именем сессии
		}
		session_destroy();//рвем сессию
		
		redirect(base_url(), 'location', 301);//делаем редирект
	}

	//Метод используется в AJAX запросе, в таблице - Полученная помощь за последние 24 часа
	//дергаем этот метод, когда человек выбирает сколько строк в таблице показывать
	function add_new_last_payments()
	{
		//Получаем из селекта количество выводимых элементов на странице
		$count_per_page = $this->input->post('count_per_page');

		//защищаем систему от прямого запроса из адресной строки
		if ($count_per_page == FALSE)
		{
			echo show_404('page');
		}
		
		//вытаскиваем необходимые нам данные - передавая количество, которое выбрал пользователь
		$data['last_24_hour_output_payments'] = $this->payments_model->find_all_last_24_hour_output_payments($_SESSION['user_id'], $count_per_page);//передаем id юзера

		//Определяем переменную как массив, в нее будем добавлять данные
		$array_itog = array();
		foreach ($data['last_24_hour_output_payments'] as $value)
		{	//прогоняем цикл, чтобы вытащить данные, а потом их запихнуть обратно в массив
			//но уже с преобразованной датой!
			$array = array(
		    	'id' => $value['id'],
		    	'partner_id' => $value['partner_id'],
		    	'summa' => $value['summa'],
		    	'date_payment' => date('H:i d.m.Yг.', $value['date_payment']),
		    	'kto_okazal_pomosh_name' => $value['kto_okazal_pomosh_name'],
		    	'kto_okazal_pomosh_last_name' => $value['kto_okazal_pomosh_last_name']
		    	);
			//добавляем в конец массива данные
		    array_push($array_itog, $array);
		}

		//отдаем все вытащинные даннные
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($array_itog));
	}

	//метод используется при AJAX запросе, когда юзер нажимает отобразить список юзеров на уровне
	//В таблице - Структура Вашей команды
	function add_new_elements_in_level()
	{
		//вытаскиваем данные пользователя, чтобы могли сделать ограничения в запросе
		$data['user'] = $this->user_model->get_user_data($_SESSION['user_id']);

		//принимаем данные пришедшие в post из ajax запроса
		$level = $this->input->post('level');
		
		//защищаем систему от прямого запроса из адресной строки
		if ($level == FALSE)
		{
			echo show_404('page');
		}

		//производим поиск всех пользователей на уровне
		$data['find_users_in_level'] = $this->user_model->find_child_in_structure($data['user']['left_key'], $data['user']['right_key'], $data['user']['level'] + $level);
		
		if ($data['find_users_in_level'] == FALSE)
		{	//если у юзера нет пользователей на этом уровне, то возвращаем массив в котором пишем уровень,
			//есть ли пользователи или нет, если нет юзеров, то 0
			$array_itog = array(
						'level' => $level,
						'have_user' => 0,
						'structure' => "<tr><td colspan=\"4\" style=\"border-bottom: none;\">К сожалению, до данного уровня Ваша структура пока что не развилась.</td></tr>"
						);

			$this->output
					->set_content_type('application/json')
					->set_output(json_encode($array_itog));

		}
		else
		{
			//Определяем переменную как массив, в нее будем добавлять данные
			$array_itog = array();
			foreach ($data['find_users_in_level'] as $value)
			{	//прогоняем цикл, чтобы вытащить данные, а потом их запихнуть обратно в массив
				//чтобы отдать только те данные, которые требуются!
				if ($value['activate_year'] == 0)
				{	//если у человека не активен год, то мы его выделяем красным
					$structure = "<tr style=\"color: red;\">";
				}
				else
				{
					$structure = "<tr>";
				}				
			    $structure .= "<td>";
			    $structure .= $value['name'] . " " . $value['last_name'];
			    $structure .= "</td>";
			    $structure .= "<td>";
			    $structure .= $value['email'];
			    $structure .= "</td>";
			    $structure .= "<td>";
			    $structure .= $value['phone_number'];
			    $structure .= "</td>";
			    $structure .= "<td>";
			    if ($value['skype'] == "none")
			    {
			    	$structure .= "Не указан";
			    }
			    else
			    {
			    	$structure .= $value['skype'];
			    }			    
			    $structure .= "</td>";
			    $structure .= "</tr>";

				$array = array(
			    	'level' => $level,
			    	'have_user' => 1,
					'structure' => $structure
			    	);
				//добавляем в конец массива данные
			    array_push($array_itog, $array);
			}

			//отдаем все вытащинные даннные
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($array_itog));
		}

	}

}