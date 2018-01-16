<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_persetujuan extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function list_acc($role)
	{
		$this->db->select('*');
		$this->db->from('tbl_persetujuan');
		$this->db->where('Pejabat_yang_Menandatangani', $role);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function list_specific_acc($id, $jenis_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_persetujuan');
		$this->db->join('tbl_pejabat', 'tbl_persetujuan.Pejabat_yang_Menandatangani = tbl_pejabat.Kode_Nama_Jabatan');
		$this->db->join('tbl_pegawai', 'tbl_pejabat.NIP = tbl_pegawai.NIP');
		$this->db->where('tbl_persetujuan.Nomor_Surat', $id);
		$this->db->where('tbl_persetujuan.Jenis_Surat', $jenis_surat);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function add_acc($data_acc)
	{
		return $this->db->insert('tbl_persetujuan', $data_acc);
	}
	
	function give_acc($id)
	{
		$this->db->set('Status', 'acc');
		$this->db->where('Nomor_Surat', $id);
		return $this->db->update('tbl_persetujuan');
	}
	
	function remove_acc($id, $jenis_surat)
	{
		$this->db->where('Nomor_Surat', $id);
		$this->db->where('Jenis_Surat', $jenis_surat);
		return $this->db->delete('tbl_persetujuan');
	}
	
}