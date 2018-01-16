<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pejabat extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_pejabat($data)
	{
		return $this->db->insert('tbl_pejabat', $data);
		
	}
	
	function add_user($data_user)
	{
		return $this->db->insert('tbl_user', $data_user);
	}
	
	function delete_pejabat($id)
	{
		$this->db->where('NIP', $id);
		return $this->db->delete('tbl_pejabat');
	}
	
	function delete_user($id)
	{
		$this->db->where('Username', $id);
		return $this->db->delete('tbl_user');
	}
	
	function check_pejabat()
	{
		$this->db->select('*');
		$this->db->from('tbl_pejabat');
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
	
	function get_all_pejabat()
	{
		$this->db->select('tbl_pejabat.Kode_Nama_Jabatan, tbl_pejabat.Nama_Jabatan, tbl_pejabat.NIP, tbl_pegawai.Nama_Lengkap');
		$this->db->from('tbl_pejabat');
		$this->db->join('tbl_pegawai', 'tbl_pejabat.NIP = tbl_pegawai.NIP');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_all_pejabat_pagination($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('tbl_pejabat.Kode_Nama_Jabatan, tbl_pejabat.Nama_Jabatan, tbl_pejabat.NIP, tbl_pegawai.Nama_Lengkap');
		$this->db->from('tbl_pejabat');
		$this->db->join('tbl_pegawai', 'tbl_pejabat.NIP = tbl_pegawai.NIP');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function count_pejabat()
	{
		$this->db->select('tbl_pejabat.Kode_Nama_Jabatan, tbl_pejabat.Nama_Jabatan, tbl_pejabat.NIP, tbl_pegawai.Nama_Lengkap');
		$this->db->from('tbl_pejabat');
		$this->db->join('tbl_pegawai', 'tbl_pejabat.NIP = tbl_pegawai.NIP');
		$query = $this->db->get();
		return $query->num_rows();
	}
}