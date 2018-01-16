<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kwitansi extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function check_status()
	{
		$this->db->select('tbl_suratperjalanandinas.Nomor_Surat_SPD AS Nomor_Surat, tbl_kwitansi.Nomor_Surat_SPD AS Check, tbl_kwitansi.Nomor_Kwitansi, tbl_kwitansi.Tanggal_Kwitansi, tbl_kwitansi.Pejabat');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_kwitansi', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_kwitansi.Nomor_Surat_SPD', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_kwitansi_detail($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_kwitansi');
		$this->db->join('tbl_suratperjalanandinas', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_kwitansi.Nomor_Surat_SPD');
		$this->db->join('tbl_pejabat', 'tbl_pejabat.Kode_Nama_Jabatan = tbl_kwitansi.Pejabat');
		$this->db->join('tbl_rincianbiaya', 'tbl_kwitansi.Nomor_Surat_SPD = tbl_rincianbiaya.Nomor_Surat_SPD');
		$this->db->join('tbl_anggaran', 'tbl_anggaran.MAK = tbl_rincianbiaya.Akun');
		$this->db->where('tbl_kwitansi.Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function insert_kwitansi($data)
	{
		return $this->db->insert('tbl_kwitansi', $data);
	}
	
	public function delete($no_surat)
	{
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		return $this->db->delete('tbl_kwitansi');
	}
	
}