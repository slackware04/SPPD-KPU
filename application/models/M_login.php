<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function check_login_data($username, $password)
	{
		$this->db->select('Username', 'Password');
		$this->db->from('tbl_user');
		$this->db->where('Username', $username);
		$this->db->where('Password', $password);
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
	
	function get_login_data($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('Username', $username);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
}