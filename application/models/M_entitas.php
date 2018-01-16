<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_entitas extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_entitas($data)
	{
		return $this->db->insert('tbl_entitas', $data);
	}
	
	function delete_entitas()
	{
		return $this->db->empty_table('tbl_entitas');
	}
	
	function check_entitas()
	{
		$this->db->select('*');
		$this->db->from('tbl_entitas');
		$query = $this->db->get();
		//return $query->num_rows();
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_entitas()
	{
		$this->db->select('*');
		$this->db->from('tbl_entitas');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
}