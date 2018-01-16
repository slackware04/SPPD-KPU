<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_rincianbiaya extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function check_status()
	{
		$this->db->select('tbl_suratperjalanandinas.Nomor_Surat_SPD AS Nomor_Surat, tbl_rincianbiaya.Nomor_Surat_SPD AS Check');
		$this->db->from('tbl_rincianbiaya');
		$this->db->join('tbl_suratperjalanandinas', 'tbl_suratperjalanandinas.Nomor_Surat_SPD = tbl_rincianbiaya.Nomor_Surat_SPD', 'right');
		$this->db->group_by('tbl_suratperjalanandinas.Nomor_Surat_SPD');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_details($no_surat)
	{
		$this->db->select('*');
		$this->db->from('tbl_rincianbiaya');
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_date_SPD($no_surat)
	{
		$this->db->select('tbl_surattugas.Tanggal_Berangkat, tbl_surattugas.Tanggal_Kembali');
		$this->db->from('tbl_suratperjalanandinas');
		$this->db->join('tbl_surattugas', 'tbl_suratperjalanandinas.Nomor_Surat_Tugas = tbl_surattugas.Nomor_Surat_Tugas');
		$this->db->where('tbl_suratperjalanandinas.Nomor_Surat_SPD', $no_surat);
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	function insert($data)
	{
		return $this->db->insert('tbl_rincianbiaya', $data);
	}
	
	function delete($no_surat)
	{
		$this->db->where('Nomor_Surat_SPD', $no_surat);
		return $this->db->delete('tbl_rincianbiaya');
	}
	
	
}