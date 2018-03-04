<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class User_model extends CI_model{

	public $table = 'user';

	public function register_user($user){
		$this->db->insert('user', $user);
	}

	public function login_user($email,$pass){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}
	public function email_check($email){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query=$this->db->get();

		if($query->num_rows()>0){
			return false;
		}else{
			return true;
		}

	}


// ============================================

	public function get_all()
	{
		$this->db->from($this->table);
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
 
	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}