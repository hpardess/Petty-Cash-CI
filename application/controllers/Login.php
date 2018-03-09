<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class Login extends CI_Controller {
 
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('isLoggedIn')) {
			redirect('home');
		} else {
			log_message('debug', 'before validation');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_auth_check');
			
			if($this->form_validation->run() == FALSE) {
				log_message('debug', 'form validation failed.');
				$this->load->view('login_page');
			} else {
				log_message('debug', 'form validation success.');
				redirect(base_url('home'), 'refresh');
			}
		}		
	}

	function auth_check($password) {
		log_message('debug', 'login>validate_auth entry ' . $password);
		$this->load->model('user_model');
		$user_login=array(
			'email'=>$this->input->post('email'),
			'password'=>md5($password)
		);

		log_message('debug', 'validating auth');
		$data=$this->user_model->login_user($user_login['email'],$user_login['password']);
		if($data)
		{
			$this->session->set_userdata('id',$data['id']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('full_name',$data['full_name']);
			$this->session->set_userdata('date_of_birth',$data['date_of_birth']);
			$this->session->set_userdata('phone_number',$data['phone_number']);
			$this->session->set_userdata('isLoggedIn', 1);

        	$roles = $this->permission->get_user_roles($data['id']);
        	$permissions = $this->permission->get_roles_permissions($roles);
			$this->session->set_userdata('permissions', $permissions);

			//redirect('home', 'refresh');
			return TRUE;

		}
		else{
			$this->form_validation->set_message('auth_check', 'Invalid  {field}');
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			// $this->load->view("login_page.php");
			return FALSE;
		}
	}

	public function login(){

		$this->load->view("login_page.php");

	}

	// public function register(){
	// 	$this->load->view("register_page.php");
	// }

	public function register(){
		
		if($this->input->method() == 'post') {
			$this->load->model('user_model');

			$user=array(
				'full_name'=>$this->input->post('full_name'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'date_of_birth'=>$this->input->post('date_of_birth'),
				'phone_number'=>$this->input->post('phone_number')
			);
			//print_r($user);

			$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE) {
				$email_check=$this->user_model->email_check($user['email']);

				if($email_check){
					$this->user_model->register_user($user);
					$this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
					redirect('login');

				}
				else{
					$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
					$this->load->view("register_page");
				}
			} else {
				log_message('debug', 'form validation success.');
				$this->load->view("register_page");
			}
		} else {
			$this->load->view("register_page");
		}

	}

	// function login_user(){
	// 	$user_login=array(
	// 		'email'=>$this->input->post('email'),
	// 		'password'=>md5($this->input->post('password'))
	// 	);

	// 	$data=$this->user_model->login_user($user_login['email'],$user_login['password']);
	// 	if($data)
	// 	{
	// 		$this->session->set_userdata('id',$data['id']);
	// 		$this->session->set_userdata('email',$data['email']);
	// 		$this->session->set_userdata('full_name',$data['full_name']);
	// 		$this->session->set_userdata('date_of_birth',$data['date_of_birth']);
	// 		$this->session->set_userdata('phone_number',$data['phone_number']);
	// 		$this->session->set_userdata('isLoggedIn', 1);

	// 		redirect('welcome', 'refresh');
	// 		//$this->load->view('welcome_message.php');

	// 	}
	// 	else{
	// 		$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
	// 		$this->load->view("user/login_page.php");

	// 	}


	// }

	public function logout(){

		$this->session->sess_destroy();
		$this->index();
	}

}