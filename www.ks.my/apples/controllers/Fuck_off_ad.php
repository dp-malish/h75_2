<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fuck_off_ad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//подгружаем хэлпер преобразования BB-кодов в html
		//грузим именно здесь, т.к. он нам нужен для уведомлялок на всех страницах
		$this->load->helper('bbcode_replace');
	}

    public function index()
    {
    	if (isset($_SESSION['admin_id']))
		{
			redirect(base_url() . 'Fuck_off_ad/start', 'location', 301);//делаем редирект
		}

    	//страница авторизации в админке - шапки нет, т.к. вшита в саму страницу
    	$this->load->view('admin/admin_login_view');
    	$this->load->view('template_admin/footer_view');
    }

    public function login()
	{
		$this->load->library('form_validation');//загружаем библиотеку валидации формы
		$this->form_validation->set_rules('admin_login_mail', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('admin_password', 'Пароль', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{	//Если у нас есть ошибки - передаем их через AJAX обратно
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array('st' => 0, 'message' => array(
			    							'admin_login_mail' => form_error('admin_login_mail'),
			    							'admin_password' => form_error('admin_password')
			    							))));
		}//if
		else
		{	//иначе мы принимаем данные из формы и выполняем следующий код
			$login_mail = $this->input->post('admin_login_mail');
			$login_pswd = $this->input->post('admin_password');

			//ищем юзера по email'у в базе данных
			$login = $this->fuck_off_ad_model->find_admin_by_email($login_mail);
			
			if ($login)
			{	//если нашли такой email в базе
				
				$this->load->library('myencrypt');//Подгружаем нашу библиотеку шифрования

				//проверяем хэши паролей
				$hash_pass = $this->myencrypt->password_check($login_pswd, $login['admin_pass']);

				if ($hash_pass == TRUE)
				{					
					//запихиваем данные админа в сессию, добавляем еще роль админа, чтобы понимать какие разделы
					//показывать, а какие нет!
					$_SESSION['admin_id'] = $login['id'];
					$_SESSION['admin_role'] = $login['admin_role'];

					$this->output
					    ->set_content_type('application/json')
					    ->set_output(json_encode(array('st' => 2, 'msg' => 'Успешная авторизация!<br />Сейчас Вы будете перенаправлены в админ-панель!')));
				}
				else
				{
					// если пароли не совпадают
					$this->output
					    ->set_content_type('application/json')
					    ->set_output(json_encode(array('st' => 1, 'msg' => 'Email или пароль не подходят!')));
				}
			}//if ($login)
			else
			{	//если email не найден, выводим что типа логин или пароль не совпадают
				//Это чтобы не дать хакерам понять есть такой email или нет
				$this->output
				    ->set_content_type('application/json')
				    ->set_output(json_encode(array('st' => 1, 'msg' => 'Email или пароль не подходят!2')));
			}

		}//else
	}

	public function logout()
	{
		$_SESSION = array();//задаем пустой массив сессии, чтобы удалить все данные
		if (isset($_COOKIE[session_name()]))//проверяем - есть ли кука относящаяся к этой сессии в браузере
		{
			setcookie(session_name(), '', time() - 42000, '/'); //удаляем куку с именем сессии
		}
		session_destroy();//рвем сессию
		
		redirect(base_url() . 'Fuck_off_ad', 'location', 301);//делаем редирект
	}

	//главная страница админки
	public function start()
	{	
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['admin_id']))
		{
			redirect(base_url() . 'Fuck_off_ad', 'location', 301);//делаем редирект
		}

		//вытаскиваем данные админа
		$data['admin_data'] = $this->fuck_off_ad_model->get_admin_data($_SESSION['admin_id']);

		//Считаем общее количество юзеров в системе и еще сколько активных
		$data['count_all_partners'] = $this->fuck_off_ad_model->count_all_partners();

		//получаем список отзывов о системе, которые есть в БД
		$this->load->library('pagination'); //Подключаем пагинацию, чтобы чел мог листать список приложений
		
		$config['base_url'] = base_url() . 'Fuck_off_ad/start';
		$config['total_rows'] = $this->fuck_off_ad_model->count_testimonials();
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

		
		$data['testimonials'] = $this->fuck_off_ad_model->get_all_testimonials($config['per_page'], $this->uri->segment(3));

		$data['title'] = "Главная";
		$this->load->view('template_admin/header_view', $data);
		$this->load->view('admin/index_admin_view');
    	$this->load->view('template_admin/footer_view');		
	}

	function edit_status_otziva()
	{
		$status_otziva = $this->input->post('status_otziva');
		$update_status_otziva = $this->fuck_off_ad_model->edit_status_otziva($_GET['id'], $status_otziva);
		if ($update_status_otziva == TRUE)
		{
			$_SESSION['message'] = "Статус отзыва успешно обновлен!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/start', 'location', 301);
		}
		else
		{
			$_SESSION['message'] = "К сожалению изменить статус отзыва не удалось!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/start', 'location', 301);
		}
	}

	function seve_comment_modera()
	{
		$comment_modera = $this->input->post('comment_modera');
		$seve_comment = $this->fuck_off_ad_model->edit_comment_modera($_GET['id'], $comment_modera);
		if ($seve_comment == TRUE)
		{
			$_SESSION['message'] = "Ваш комментарий к отзыву успешно сохранен!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/start', 'location', 301);
		}
		else
		{
			$_SESSION['message'] = "К сожалению сохранить комментарий не удалось!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/start', 'location', 301);
		}
	}

	public function notifications()
	{
		//Сначала делаем проверку, есть ли в сессии данные
		if (!isset($_SESSION['admin_id']))
		{
			redirect(base_url() . 'Fuck_off_ad', 'location', 301);//делаем редирект
		}

		//вытаскиваем данные админа
		$data['admin_data'] = $this->fuck_off_ad_model->get_admin_data($_SESSION['admin_id']);

		//получаем список системных уведомлений, которые есть в БД
		$this->load->library('pagination'); //Подключаем пагинацию, чтобы чел мог листать список приложений
		
		$config['base_url'] = base_url() . 'Fuck_off_ad/notifications';
		$config['total_rows'] = $this->fuck_off_ad_model->count_notifications();
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

		
		$data['system_notifications'] = $this->fuck_off_ad_model->get_all_notifications($config['per_page'], $this->uri->segment(3));
			

		$data['title'] = "Системные уведомления";
		$this->load->view('template_admin/header_view', $data);
		$this->load->view('admin/notifications_admin_view');
    	$this->load->view('template_admin/footer_view');
	}

	//изменяем статус уведомления
	function edit_status_notification()
	{
		$message_status = $this->input->post('message_status');
		$update_status = $this->fuck_off_ad_model->edit_status_notification($_GET['id'], $message_status);
		if ($update_status == TRUE)
		{
			$_SESSION['message'] = "Статус уведомления успешно обновлен!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/notifications', 'location', 301);
		}
		else
		{
			$_SESSION['message'] = "К сожалению изменить статус уведомления не удалось!";//передаем сообщение в сессии и обображаем в вьюхе
			redirect(base_url() . 'fuck_off_ad/notifications', 'location', 301);
		}
	}

}