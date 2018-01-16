<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_anggaran extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function add_anggaran($data)
	{
		return $this->db->insert('tbl_anggaran', $data);
		
	}
	
	function delete_anggaran($id)
	{
		$this->db->where('MAK', $id);
		return $this->db->delete('tbl_anggaran');
	}

	function get_all_anggaran()
	{
		$this->db->select('*');
		$this->db->from('tbl_anggaran');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function count_realisasi()
	{
		$this->db->select('sum(tbl_rincianbiaya.Harga_Satuan_1*tbl_rincianbiaya.Satuan_1) as total1, sum(tbl_rincianbiaya.Harga_Satuan_2*tbl_rincianbiaya.Satuan_2) as total2, sum(tbl_rincianbiaya.Harga_Satuan_3*tbl_rincianbiaya.Satuan_3) as total3, sum(tbl_rincianbiaya.Harga_Satuan_4*tbl_rincianbiaya.Satuan_4) as total4, sum(tbl_rincianbiaya.Harga_Satuan_5*tbl_rincianbiaya.Satuan_5) as total5, sum(tbl_rincianbiaya.Harga_Satuan_6*tbl_rincianbiaya.Satuan_6) as total6, sum(tbl_rincianbiaya.Harga_Satuan_7*tbl_rincianbiaya.Satuan_7) as total7, sum(tbl_rincianbiaya.Harga_Satuan_8*tbl_rincianbiaya.Satuan_8) as total8, tbl_anggaran.MAK, tbl_anggaran.Jumlah_Anggaran, tbl_anggaran.Jenis_Kegiatan, tbl_anggaran.Nama_Kegiatan');
		$this->db->from('tbl_anggaran');
		$this->db->join('tbl_rincianbiaya', 'tbl_rincianbiaya.Akun = tbl_anggaran.MAK');
		$query = $this->db->get();
		return $query->result_array();
	}
	
}