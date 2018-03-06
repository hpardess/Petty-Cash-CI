<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Hameedullah Pardess <hameedullah.pardess@gmail.com>
*
*/

class Language_model extends CI_model{

	public $table = 'language';
	
	public function get_all()
	{
		$this->db->from($this->table);
		$query=$this->db->get();
		log_message('DEBUG', 'Language_model>get_all(): ' . $this->db->last_query());
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
 		log_message('DEBUG', 'Language_model>get_by_id(): ' . $this->db->last_query());
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		$result = $this->db->insert_id();
		log_message('DEBUG', 'Language_model>add(): ' . $this->db->last_query());
		return $result;
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		$result = $this->db->affected_rows();
		log_message('DEBUG', 'Language_model>update(): ' . $this->db->last_query());
		return $result;
	}
 
	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		log_message('DEBUG', 'Language_model>delete_by_id(): ' . $this->db->last_query());
	}

}