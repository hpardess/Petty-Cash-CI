<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class Role extends CI_Controller {
 
	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata('isLoggedIn')) {
			redirect('login');
		}

		$this->load->model('role_model');

	}

	public function index()
	{
		$view_data['roles']=$this->role_model->get_all_with_permissions();

		$data['css'] = $this->load->view('role/index_css', '', true);;
		$data['js'] = $this->load->view('role/index_js', '', true);;
		$data['breadcrumbs'] = $this->load->view('role/index_breadcrumb', '', true);
		$data['content'] = $this->load->view('role/index', $view_data, true);
		$this->load->view('default_layout', $data);
	}

	public function add()
	{
		$data = array(
				'name' => $this->input->post('name')
			);
		$insert = $this->role_model->add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function edit_ajax($id)
	{
		$data = $this->role_model->get_by_id($id);

		echo json_encode($data);
	}
 
	public function update()
	{
		$data = array(
				'name' => $this->input->post('name')
			);
		$this->role_model->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
 
	public function delete($id)
	{
		$this->role_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}