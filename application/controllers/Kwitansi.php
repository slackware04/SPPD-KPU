<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller
{
	public function index()
	{	
		//$this->load->model('M_suratperjalanandinas');
		$this->load->model('M_kwitansi');
		$daftar_kwitansi = $this->M_kwitansi->check_status();
		$data['daftar_kwitansi'] = $daftar_kwitansi;
		$data['title'] = 'Kwitansi';
		$data['content'] = 'contents/kwitansi/V_kwitansi';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form($no_surat)
	{
		$this->load->model('M_pejabat');
		$daftar_pejabat = $this->M_pejabat->get_all_pejabat();
		$data['daftar_pejabat'] = $daftar_pejabat;
		$data['no_surat'] = $no_surat;
		$data['title'] = 'Rincian Biaya';
		$data['content'] = 'contents/kwitansi/V_insertkwitansi';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		$data['Nomor_Surat_SPD'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Nomor_Kwitansi'] = $this->input->post('param2');
		$data['Tanggal_Kwitansi'] = $this->input->post('param3');
		$data['Pejabat'] = $this->input->post('param4');
		
		$this->load->model('M_kwitansi');
		$this->M_kwitansi->insert_kwitansi($data);
		
		$data_acc['Nomor_Surat'] = str_replace("/", "-", $this->input->post('param1'));
		$data_acc['Jenis_Surat'] = 'Kwitansi';
		$data_acc['Pejabat_yang_Menandatangani'] = $this->input->post('param4');
		$data_acc['Kewenangan'] = 'all';
		$data_acc['Status'] = 'belum acc';
		$this->load->model('M_persetujuan');
		$this->M_persetujuan->add_acc($data_acc);
		
		$message = '<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah dimasukkan!.
					</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Kwitansi'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_kwitansi');
		$this->M_kwitansi->delete($id);
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Kwitansi'));
	}
	
	public function exportpdf($id)
	{
		$this->load->model('M_kwitansi');
		$detail_kw = $this->M_kwitansi->get_kwitansi_detail($id);
		$data['detail_kw'] = $detail_kw;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Kwitansi');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
		
		$this->load->helper('pdf_helper');
		$data['title'] = 'PDF';
		$this->load->view('contents/kwitansi/v_exportpdfkwitansi', $data);
	}
}
	