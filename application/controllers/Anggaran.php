<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_anggaran');
		$data_anggaran = $this->M_anggaran->get_all_anggaran();
		$data['data_anggaran'] = $data_anggaran;
		$data['title'] = 'Data Anggaran';
		$data['content'] = 'contents/anggaran/V_anggaran';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		$data['title'] = 'Data Anggaran';
		$data['content'] = 'contents/anggaran/V_insertanggaran';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		$data['MAK'] = $this->input->post('param1');
		$data['Nama_Kegiatan'] = $this->input->post('param2');
		$data['Jumlah_Anggaran'] = $this->input->post('param3');
		$data['Jenis_Kegiatan'] = $this->input->post('param4');
		
		$this->load->model('M_anggaran');
		$this->M_anggaran->add_anggaran($data);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Anggaran'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_anggaran');
		$this->M_anggaran->delete_anggaran($id);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully deleted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Anggaran'));
	}
	
	public function realisasi()
	{
		$this->load->model('M_anggaran');
		$data_anggaran = $this->M_anggaran->count_realisasi();
		$data['data_anggaran'] = $data_anggaran;
		$data['title'] = 'Data Anggaran';
		$data['content'] = 'contents/anggaran/V_realisasi';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
}