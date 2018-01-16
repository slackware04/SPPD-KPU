<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSPD extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_laporanspd');
		$list_laporan = $this->M_laporanspd->check_status();
		$data['list_laporan'] = $list_laporan;
		$data['title'] = 'Daftar Laporan SPD';
		$data['content'] = 'contents/laporanspd/V_laporanspd';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form($no_surat)
	{
		$data['no_surat'] = $no_surat;
		$data['title'] = 'Daftar Laporan SPD';
		$data['content'] = 'contents/laporanspd/V_insertlaporanspd';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		$data['Nomor_Surat_SPD'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Tanggal_Laporan'] = $this->input->post('param2');
		$data['Instansi_yang_Dikunjungi'] = $this->input->post('param3');
		$data['Hasil'] = $this->input->post('param4');
		
		$this->load->model('M_laporanspd');
		$this->M_laporanspd->insert_laporan($data);
		
		$message = '<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah dimasukkan!.
					</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('LaporanSPD'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_laporanspd');
		$this->M_laporanspd->delete($id);
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('LaporanSPD'));
	}
	
	public function exportPDF($no_surat)
	{
		$this->load->model('M_laporanspd');
		$laporan = $this->M_laporanspd->get_laporan_detail($no_surat);
		$data['laporan'] = $laporan;
		
		$this->load->helper('pdf_helper');
		$data['title'] = 'PDF';
		$this->load->view('contents/laporanspd/v_exportpdflaporanspd', $data);
	}
}