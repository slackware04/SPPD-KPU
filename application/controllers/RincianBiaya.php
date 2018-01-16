<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RincianBiaya extends CI_Controller
{
	public function index()
	{	
		//$this->load->model('M_suratperjalanandinas');
		$this->load->model('M_rincianbiaya');
		$daftar_spd = $this->M_rincianbiaya->check_status();
		$data['daftar_spd'] = $daftar_spd;
		$data['title'] = 'Rincian Biaya';
		$data['content'] = 'contents/rincianbiaya/V_rincianbiaya';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form($no_surat)
	{
		$this->load->model('M_suratperjalanandinas');
		$surat_spd = $this->M_suratperjalanandinas->get_specific_surat($no_surat);
		$data['surat_spd'] = $surat_spd;
		$this->load->model('M_pejabat');
		$daftar_pejabat = $this->M_pejabat->get_all_pejabat();
		$data['daftar_pejabat'] = $daftar_pejabat;
		
		$this->load->model('M_anggaran');
		$daftar_mak = $this->M_anggaran->get_all_anggaran();
		$data['daftar_mak'] = $daftar_mak;
		
		$this->load->model('M_rincianbiaya');
		$tanggal = $this->M_rincianbiaya->get_date_SPD($no_surat);
		$data['tanggal'] = $tanggal;
		$data['title'] = 'Rincian Biaya';
		$data['content'] = 'contents/rincianbiaya/V_insertrincianbiaya';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		$data['Nomor_Surat_SPD'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Tanggal_Rincian_Biaya'] = $this->input->post('param2');
		$data['Pejabat'] = $this->input->post('param3');
		$data['Akun'] = $this->input->post('param4');
		
		//1
		$data['Harga_Satuan_1'] = $this->input->post('param5');
		$data['Satuan_1'] = $this->input->post('param6');		
		$data['Keterangan_1'] = $this->input->post('param7');		
		
		//2
		$data['Harga_Satuan_2'] = $this->input->post('param8');
		$data['Satuan_2'] = $this->input->post('param9');		
		$data['Keterangan_2'] = $this->input->post('param10');
		
		//3
		$data['Harga_Satuan_3'] = $this->input->post('param11');
		$data['Satuan_3'] = $this->input->post('param12');		
		$data['Keterangan_3'] = $this->input->post('param13');
		
		//4
		$data['Harga_Satuan_4'] = $this->input->post('param14');
		$data['Satuan_4'] = $this->input->post('param15');		
		$data['Keterangan_4'] = $this->input->post('param16');
		
		//5
		$data['Harga_Satuan_5'] = $this->input->post('param17');
		$data['Satuan_5'] = $this->input->post('param18');		
		$data['Keterangan_5'] = $this->input->post('param19');
		
		//6
		$data['Harga_Satuan_6'] = $this->input->post('param20');
		$data['Satuan_6'] = $this->input->post('param21');		
		$data['Keterangan_6'] = $this->input->post('param22');
		
		//7
		$data['Harga_Satuan_7'] = $this->input->post('param23');
		$data['Satuan_7'] = $this->input->post('param24');		
		$data['Keterangan_7'] = $this->input->post('param25');
		
		//8
		$data['Harga_Satuan_8'] = $this->input->post('param26');
		$data['Satuan_8'] = $this->input->post('param27');		
		$data['Keterangan_8'] = $this->input->post('param28');
		
		$this->load->model('M_rincianbiaya');
		$this->M_rincianbiaya->insert($data);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('RincianBiaya'));
	}
	
	public function details($no_surat)
	{
		$this->load->model('M_rincianbiaya');
		$detail_biaya = $this->M_rincianbiaya->get_details($no_surat);
		$data['detail_biaya'] = $detail_biaya;
		$data['title'] = 'Rincian Biaya';
		$data['content'] = 'contents/rincianbiaya/V_detailrincianbiaya';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function delete($no_surat)
	{
		
		$this->load->model('M_rincianbiaya');
		$this->M_rincianbiaya->delete($no_surat);
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('RincianBiaya'));
	}


	
}