<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class User extends CI_Controller {
 
	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata('isLoggedIn')) {
			redirect('login');
		}

		$this->load->model('user_model');

	}

	public function index()
	{
		$this->load->view("user/index.php");
	}

	// public function register_user(){

	// 	$user=array(
	// 		'full_name'=>$this->input->post('full_name'),
	// 		'email'=>$this->input->post('email'),
	// 		'password'=>md5($this->input->post('password')),
	// 		'date_of_birth'=>$this->input->post('date_of_birth'),
	// 		'mobile_number'=>$this->input->post('mobile_number')
	// 	);
	// 	//print_r($user);

	// 	$email_check=$this->user_model->email_check($user['email']);

	// 	if($email_check){
	// 		$this->user_model->register_user($user);
	// 		$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
	// 		redirect('user/login');

	// 	}
	// 	else{

	// 		$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
	// 		redirect('user');


	// 	}

	// }

	// public function login(){

	// 	$this->load->view("user/login.php");

	// }

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
	// 		$this->session->set_userdata('mobile_number',$data['mobile_number']);
	// 		$this->session->set_userdata('isLoggedIn', 1);

	// 		redirect('welcome', 'refresh');
	// 		//$this->load->view('welcome_message.php');

	// 	}
	// 	else{
	// 		$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
	// 		$this->load->view("user/login.php");

	// 	}


	// }

	function user_profile(){

		$this->load->view('user/user_profile.php');

	}

	public function user_logout(){

		$this->session->sess_destroy();
		redirect('user/login', 'refresh');
	}


}