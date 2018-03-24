<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class Request extends CI_Controller {
 
	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata('isLoggedIn')) {
			redirect('login');
		}

		$this->load->model('request_model');
		$this->load->model('drafted_request_model');
		$this->load->model('request_transition_model');
	}

	public function index()
	{
		$view_data['requests']=$this->request_model->get_all();

		$data['css'] = $this->load->view('request/index_css', '', true);;
		$data['js'] = $this->load->view('request/index_js', '', true);;
		$data['breadcrumbs'] = $this->load->view('request/index_breadcrumb', '', true);
		$data['content'] = $this->load->view('request/index', $view_data, true);
		$this->load->view('default_layout', $data);
	}

	public function list($type)
	{
		$view_data = array();

		if ($type == 'unsubmitted') {
			$view_data['requests']=$this->drafted_request_model->get_by_user($this->session->userdata('user_id'));
		} else if ($type == 'my_requests') {
			$view_data['requests']=$this->request_model->get_by_user($this->session->userdata('user_id'));
		} else if ($type == 'submitted') {
			$view_data['requests']=$this->request_model->get_by_status($type);
		} else if ($type == 'rejected') {
			$view_data['requests']=$this->request_model->get_by_status($type);
		}  else if ($type == 'approved') {
			$view_data['requests']=$this->request_model->get_by_status($type);
		} else {
			$view_data['requests']=$this->request_model->get_all();
		}

		$data['css'] = $this->load->view('request/index_css', '', true);;
		$data['js'] = $this->load->view('request/index_js', '', true);;
		$data['breadcrumbs'] = $this->load->view('request/index_breadcrumb', '', true);
		$data['content'] = $this->load->view('request/index', $view_data, true);
		$this->load->view('default_layout', $data);
	}

	public function new()
	{
		$view_data['drafted_requests']=$this->drafted_request_model->get_by_user($this->session->userdata('user_id'));

		$data['css'] = $this->load->view('request/index_css', '', true);;
		$data['js'] = $this->load->view('request/index_js', '', true);;
		$data['breadcrumbs'] = $this->load->view('request/index_breadcrumb', '', true);
		$data['content'] = $this->load->view('request/new_view', $view_data, true);
		$this->load->view('default_layout', $data);
	}

	public function create()
	{
		$data = array(
				'request_date' => $this->input->post('request_date'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'quantity' => $this->input->post('quantity'),
				'cost_per_unit' => $this->input->post('cost_per_unit'),
				'total_cost' => (double)$this->input->post('quantity') * (double)$this->input->post('cost_per_unit'),
				'user_id' => $this->session->userdata('user_id')
			);

		//save it as draft
		$insert = $this->drafted_request_model->create($data);
		echo json_encode(array("status" => TRUE));
	}

	// submit the request from draft to be processed by next authority
	public function submit($request_id)
	{
		$draft_request = $this->drafted_request_model->get_by_id($request_id);
		$data = array(
				'request_date' => $draft_request->request_date,
				'title' => $draft_request->title,
				'details' => $draft_request->details,
				'quantity' => $draft_request->quantity,
				'cost_per_unit' => $draft_request->cost_per_unit,
				'total_cost' => $draft_request->cost_per_unit,
				'workflow_status' => 'Submitted',
				'user_id' => $draft_request->user_id
			);

		$this->drafted_request_model->delete_by_id($request_id);

		//save it as actual request
		$insert = $this->request_model->create($data);
		echo json_encode(array("status" => TRUE));
	}

	public function view_ajax($request_id)
	{
		$data['request'] = $this->request_model->get_by_id($request_id);
		
		echo $this->load->view('request/view_ajax_view', $data, true);
	}

	public function edit_unsubmitted_ajax($request_id)
	{
		$data['request'] = $this->drafted_request_model->get_by_id($request_id);
		
		echo $this->load->view('request/edit_ajax_view', $data, true);
	}

	// edit the request aftr submission
	public function edit_ajax($request_id)
	{
		$data['request'] = $this->request_model->get_by_id($request_id);
		
		echo $this->load->view('request/edit_ajax_view', $data, true);
	}

	public function delete($request_id)
	{
		$this->request_model->delete_by_id($request_id);
		echo json_encode(array("status" => TRUE));
	}

	public function transition_ajax($request_id)
	{
		$data['current_status'] = $this->request_model->get_by_id($request_id)->workflow_status;
		$data['transitions'] = $this->request_transition_model->get_by_request($request_id);
		echo $this->load->view('request/transition_ajax_view', $data, true);
	}







 
	public function update()
	{
		$roleID = $this->input->post('id');
		$data = array(
				'name' => $this->input->post('name')
			);

		$this->permission->add_permissions_to_role($roleID, $this->input->post('permission'));
		$this->request_model->update(array('id' => $roleID), $data);
		echo json_encode(array("status" => TRUE));
	}
 
	

}