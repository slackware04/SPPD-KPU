<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporanspd extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function check_status()
	{
		$this->db->select('tbl_suratperjalanandinas.Nomor_Surat_SPD AS Nomor_Surat, tbl_laporanspd.Nomor_Surat_SPD AS Check, tbl_laporanspd.Tanggal_Laporan, tbl_laporanspd.Instansi_yang_Dikunjungi, tbl_laporanspd.Hasil');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_laporanspd', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_laporanspd.Nomor_Surat_SPD', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_laporan_detail($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_laporanspd');
		$this->db->join('tbl_suratperjalanandinas', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_laporanspd.Nomor_Surat_SPD');
		$this->db->join('tbl_surattugas', 'tbl_suratperjalanandinas.Nomor_Surat_Tugas = tbl_surattugas.Nomor_Surat_Tugas');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.NIP = tbl_suratperjalanandinas.Nama_Pelaksana_SPD');
		$this->db->where('tbl_laporanspd.Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function insert_laporan($data)
	{
		return $this->db->insert('tbl_laporanspd', $data);
	}
	
	public function delete($no_surat)
	{
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		return $this->db->delete('tbl_laporanspd');
	}
	
}