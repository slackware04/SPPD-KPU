<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_surattugas extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_surat($data)
	{
		return $this->db->insert('tbl_surattugas', $data);
	}
	
	function delete_surat($id)
	{
		$this->db->where('Nomor_Surat_Tugas', $id);
		return $this->db->delete('tbl_surattugas');
		
	}

	function get_all_surat()
	{
		$this->db->select('*');
		$this->db->from('tbl_surattugas');
		$this->db->join('tbl_persetujuan', 'tbl_surattugas.Nomor_Surat_Tugas = tbl_persetujuan.Nomor_Surat');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_specific_surat($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_surattugas');
		$this->db->where('Nomor_Surat_Tugas', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_pegawai_bertugas($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_surattugas_detail');
		$this->db->join('tbl_pegawai', 'tbl_surattugas_detail.NIP = tbl_pegawai.NIP');
		$this->db->where('Nomor_Surat_Tugas', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function add_pegawai($data)
	{
		return $this->db->insert('tbl_surattugas_detail', $data);
	}
	
	function delete_pegawai($id)
	{
		$this->db->where('Nomor_Surat_Tugas', $id);
		return $this->db->delete('tbl_surattugas_detail');
	}
	
	function count_pegawai($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_surattugas_detail');
		$this->db->where('Nomor_Surat_Tugas', $no_surat);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	function check_pegawai_conflict()
	{
		
	}
	
}