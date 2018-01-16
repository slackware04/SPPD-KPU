<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suratperjalanandinas extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_surat($data)
	{
		return $this->db->insert('tbl_suratperjalanandinas', $data);
	}
	
	function delete_surat($id)
	{
		$this->db->where('Nomor_Surat_SPD', $id);
		return $this->db->delete('tbl_suratperjalanandinas');
		
	}

	function get_all_surat()
	{
		/*
		$this->db->select('tbl_suratperjalanandinas.Nomor_Surat_SPD, tbl_pegawai.Nama_Lengkap, tbl_suratperjalanandinas.Tanggal_Surat_SPD, tbl_suratperjalanandinas.Nomor_Surat_Tugas, tbl_suratperjalanandinas.Akun, GROUP_CONCAT(tbl_persetujuan.Pejabat_yang_Menandatangani SEPARATOR "<br/>") AS Persetujuan');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_pegawai', 'tbl_suratperjalanandinas.Nama_Pelaksana_SPD = tbl_pegawai.NIP');
		$this->db->join('tbl_persetujuan', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_persetujuan.Nomor_Surat');
		*/
		$this->db->select('*');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_pegawai', 'tbl_suratperjalanandinas.Nama_Pelaksana_SPD = tbl_pegawai.NIP');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_specific_surat($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_pegawai', 'tbl_suratperjalanandinas.Nama_Pelaksana_SPD = tbl_pegawai.NIP');
		$this->db->join('tbl_surattugas', 'tbl_suratperjalanandinas.Nomor_Surat_Tugas = tbl_surattugas.Nomor_Surat_Tugas');
		$this->db->where('Nomor_Surat_SPD', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_keluarga($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_suratperjalanandinas_detail');
		$this->db->where('Nomor_Surat_SPD', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function add_pegawai($data)
	{
		return $this->db->insert('tbl_suratperjalanandinas_detail', $data);
	}
	
	function delete_pegawai($id)
	{
		$this->db->where('Nomor_Surat_SPD', $id);
		return $this->db->delete('tbl_suratperjalanandinas_detail');
	}
	
	function count_pegawai($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_suratperjalanandinas_detail');
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}