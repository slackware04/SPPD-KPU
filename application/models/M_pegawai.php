<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_pegawai($data)
	{
		return $this->db->insert('tbl_pegawai', $data);
		
	}
	
	function add_user($data_user)
	{
		return $this->db->insert('tbl_user', $data_user);
	}
	
	function delete_pegawai($id)
	{
		$this->db->where('NIP', $id);
		return $this->db->delete('tbl_pegawai');
	}
	
	function delete_user($id)
	{
		$this->db->where('Username', $id);
		return $this->db->delete('tbl_user');
	}
	
	function check_pegawai()
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_all_pegawai_pagination($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_all_pegawai()
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_specific_pegawai($id)
	{
		$this->db->select('Nama_Lengkap');
		$this->db->from('tbl_pegawai');
		$this->db->where('NIP', $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	function count_pegawai()
	{
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	
}