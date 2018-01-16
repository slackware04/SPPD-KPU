<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_daftarriil extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_laporan($data)
	{
		return $this->db->insert('tbl_daftarriil', $data);
	}
	
	function delete_laporan($id)
	{
		$this->db->where('Nomor_Surat_SPD', $id);
		return $this->db->delete('tbl_daftarriil');
		
	}

	function check_status()
	{
		$this->db->select('tbl_suratperjalanandinas.Nomor_Surat_SPD AS Nomor_Surat, tbl_daftarriil.Nomor_Surat_SPD AS Check, tbl_daftarriil.Tanggal_Laporan, sum(Jumlah_Biaya) as Total_Biaya');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_daftarriil', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_daftarriil.Nomor_Surat_SPD', 'left');
		$this->db->join('tbl_daftarriil_detail', 'tbl_daftarriil.Nomor_Surat_SPD = tbl_daftarriil.Nomor_Surat_SPD', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_specific_laporan($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftarriil');
		$this->db->join('tbl_suratperjalanandinas', 'tbl_daftarriil.Nomor_Surat_SPD = tbl_suratperjalanandinas.Nomor_Surat_SPD');
		$this->db->join('tbl_pegawai', 'tbl_suratperjalanandinas.Nama_Pelaksana_SPD = tbl_pegawai.NIP');
		$this->db->where('tbl_daftarriil.Nomor_Surat_SPD', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_biaya($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftarriil_detail');
		$this->db->where('Nomor_Surat_SPD', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function add_biaya($data)
	{
		return $this->db->insert('tbl_daftarriil_detail', $data);
	}
	
	function delete_biaya($id)
	{
		$this->db->where('Nomor_Surat_SPD', $id);
		return $this->db->delete('tbl_daftarriil_detail');
	}
	
	function count_pegawai($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftarriil_detail');
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}